<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Clinic;
use App\Models\Allergy;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Notifications\AbujaNurseDesignateNotification;
use App\Notifications\LagosNurseDesignateNotification;


class RecordController extends Controller
{
    //Index
    public function index()
    {
        if (auth()->user()->role !== 'nurse') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.index', [
            'record' => Record::latest()->get(),
            'patients' => Patient::latest()->get(),
        ]);
    }

    //Show A Patient
    public function show(Record $record)
    {
        return view('record.show', [
            'record' => $record,
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('record.create');
    }

    // Store Listing Data
    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'slug' => "nullable",
            'blood_pressure_systolic' => 'required',
            'blood_pressure_diastolic' => 'required',
            'temp' => 'required',
            'pulse_rate' => 'required',
            'assessment' => 'nullable',
            'prescription' => 'nullable',
            'nurse_note' => 'required',
            'weight' => 'nullable',
            'patient_id' => 'required',
        ]);

        $uniqueIdentifier = Str::uuid();

        $encryptedSlug = Crypt::encrypt($uniqueIdentifier);
        $limitedEncryptedSlug = substr($encryptedSlug, 0, 11);
        $formFields['slug'] = $limitedEncryptedSlug;

        // $formFields["slug"] =

        $formFields['locality'] = auth()->user()->locality;

        if ($formFields['weight']) {
            $patient = Patient::find($formFields['patient_id']);

            $formFields['bmi'] = $formFields['weight'] / $patient['height'];
        }

        Record::create($formFields);

        return redirect('/records')->with(
            'message',
            'Record created successfully!'
        );
    }

    // Show Edit Form
    public function edit($slug)
    {
        $slug = $record = Record::where('slug', $slug)->first();

        return view('records.edit', [
            'record' => $record,
            'clinics' => Clinic::latest()->get(),
            'allergies' => Allergy::where("patient_id", $record->patient->id),
            'pharmacies' => Pharmacy::paginate(20),
        ]);
        // dd($allergies->count());
    }

    // Update Listing Data
    public function update(Request $request, Record $record)
    {
        $formFields = $request->validate([
            'assessment' => 'nullable',
            'prescription' => 'nullable',
            'status' => 'required',
            'service_type' => 'required',
            'designate' => 'nullable',
            'management' => 'nullable',
            'flag' => 'nullable',
            'clinic_location' => 'nullable',
        ]);

        if ($formFields['service_type'] === 'management') {
            $formFields['prescription'] = null;
            $formFields['designate'] = 'nurse';
        } else {
            $formFields['management'] = null;
            // $formFields[']
        }

        $record->update($formFields);
        // if($record->designate === "nurse" && auth()->user()->locality === "abj"){
        //     $mailUsers = User::where("role", "pharmacy")->get();
        //     foreach ($mailUsers as $user) {
        //         $user->notify(new AbujaNurseDesignateNotification(['locality' => 'abj'],$record->processing_by));
        //     }
        // }

        // if($record->designate === "nurse" && auth()->user()->locality === "lag"){
        //     $mailUsers = User::where("role", "pharmacy")->get();
        //     foreach ($mailUsers as $user) {
        //         $user->notify(new LagosNurseDesignateNotification(['locality' => 'lag'] ,$record->processing_by));
        //     }
        // }
        return redirect('/records/manage')->with(
            'message',
            'Record updated successfully!'
        );
    }

    public function updateStatusAndRedirect($slug)
    {

  // $id  = Crypt::decrypt($id);
        // $record = Record::find($id);
        $record = Record::where('slug', $slug)->first();
        $record->update([
            'processing' => true,
            'processing_by' => auth()->user()->name,
        ]);
        return redirect()->route('records.edit', ['slug' => $record->slug]);
    }

    public function view_patient($patientId)
    {
        $records = Record::where('patient_id', $patientId)->first();
        return view('records.view', [
            'records' => $records,
             'allergy'=> Allergy::latest()->get()
            ]);
    }

    //View Pharmacy Records
    public function pharmacy()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('records.pharmacy', [
            'records' => Record::where('designate', 'pharmacy')
                 ->where('locality', auth()->user()->role)
                ->whereNull('flag')
                ->latest()
                ->get(),
        ]);
    }

    public function nurse_mgmt()
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }
        // $notificationsabj = auth()->user()->unreadNotifications()->where('data->locality', 'abj') // Adjust based on how 'locality' is stored
        // ->get();

        // $notificationslag = auth()->user()->unreadNotifications()->where('data->locality', 'lag') // Adjust based on how 'locality' is stored
        // ->get();

        return view('records.nurse_mgmt', [
            // 'notificationsabj' => $notificationsabj,
            // "notificationslag" => $notificationslag,
            'records' => Record::where('designate', 'nurse')
                    ->where('locality', auth()->user()->locality)
                ->whereNull('flag')
                ->latest()
                ->get(),
        ]);
    }

    public function flag_success($id)
    {
        $record = Record::find($id);

        $record->flag = 'success';

        $record->save();
        return back()->with('message', 'Pharmacy Status Updated');
    }

    public function flag_nt_stock($id)
    {
        $record = Record::find($id);

        $record->flag = 'not_stocked';

        $record->save();
        return redirect('/records/pharmacy')->with(
            'message',
            'Pharmacy Removed'
        );
    }

    // Delete Listing
    public function destroy(Record $record)
    {
        $record->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    /** Open Records */
    public function open(Record $record)
    {
        return view('records.manage', [
            'record' => Record::where('status', 'open')
                ->where("locality", auth()->user()->locality)
                ->filter(request(['search']))
                ->get(),

            'patients' => Patient::latest()->get(),
        ]);
    }

    public function get_dependent(Patient $patient)
    {
        return view('patients.dependent', ['patient' => $patient]);
    }

    public function receipts()
    {
        return view('records.receipt', [
            'patients' => Patient::latest()->get(),
            'records' => Record::where('designate', 'outsource')
                ->latest()
                ->get(),
        ]);
    }
}
