<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Leaves;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Clinic;
use App\Models\Allergy;
use App\Models\Injury;
use App\Models\Management;
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
        if ( auth()->user()->role !== 'nurse' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.index', [
            'record' => Record::latest()->get(),
            'patients' => Patient::latest()->where("activate", 1)->get(),
        ]);
    }

    public function queue()
    {
        if (auth()->user()->role !== 'nurse' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.queue', [
            'records' => Record::latest()->where("status", 'open')->paginate(30),
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
            // 'history_complaint' => 'required',
            // 'compliant' => '',
            'pulse_rate' => 'required',
            'assessment' => 'nullable',
            'prescription' => 'nullable',
            'nurse_note' => 'required',
            'weight' => 'nullable',
            'patient_id' => 'required',
        ]);

        $uniqueIdentifier = Str::uuid();

        $encryptedSlug = Crypt::encrypt($uniqueIdentifier);
        $limitedEncryptedSlug = substr($encryptedSlug, 0, 21);
        $formFields['slug'] = $limitedEncryptedSlug;

        $formFields['locality'] = auth()->user()->locality;

        if ($formFields['weight']) {
            $patient = Patient::find($formFields['patient_id']);

            $height_meters = $patient['height'] / 100;
            // Calculate BMI
            $formFields['bmi'] = $formFields['weight'] / ($height_meters * $height_meters);
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
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        $slug = $record = Record::where('slug', $slug)->first();

        return view('records.edit', [
            'record' => $record,
            'clinics' => Clinic::latest()->get(),
            'allergies' => Allergy::where("patient_id", $record->patient->id)->get(),
            'management' => Management::latest()->get(),
            // 'pharmacies' => Pharmacy::paginate(20),
            'inventories' => Inventory::latest()
                    ->where('location', "=", auth()->user()->locality) // Compare as strings
                    ->filter(request(['search']))
                    ->paginate(15),
        ]);
        // dd($allergies->count());
    }

    // Update Listing Data
    public function update(Request $request, Record $record)
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'complaint' => 'nullable',
            'history_complaint' => 'required',
            'physicalexam' => 'nullable',
            'systemic_exam' => 'nullable',
            'assessment' => 'nullable',
            'prescription' => 'nullable',
            'status' => 'required',
            'designate' => 'nullable',
            'management' => 'nullable',
            'flag' => 'nullable',
            'clinic_location' => 'nullable',
            'doctor_act' => ['array', 'nullable'],
            'tests' => 'array'
        ]);

        // $formFields['doctor_act'] = $formFields['doctor_act'] ?? [];


        $record->update($formFields);

        return redirect('/records/manage')->with(
            'message',
            'Record updated successfully!'
        );
    }

    public function updateStatusAndRedirect($slug)
    {
        if (auth()->user()->role !== 'doctor') {
            abort(403, 'Unauthorized Action');
        }

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
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        $records = Record::where('patient_id', $patientId)->get();
        // dd($records);

        return view('records.view', [
            'records' => $records,
             'allergy'=> Allergy::latest()->get()
            ]);
    }

    //View Pharmacy Records
    public function pharmacy()
    {
        if (auth()->user()->role !== 'pharmacy' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return view('records.pharmacy', [
            "management" => Management::whereNotNull("prescription")->whereNull("flag_prescription")->latest()->paginate(30),
            'records' =>  Record::where('locality', auth()->user()->locality)
                            ->where(function ($query) {
                                $query->whereJsonContains('doctor_act', 'prescription');
                            })
                        ->where('status', '!=', 'closed')
                        ->latest()
        ->paginate(30)
        ]);
    }

    public function preview()
    {
         if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $startDate = request('start_date');
        $endDate = request('end_date');

        return view('records.preview', [
            "management" => Management::whereNotNull("tests")->latest()
            ->whereHas('record', function ($query) {
                $query->where('status', 'open');
            })
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })->paginate(30),

            'records' => Record::latest()
                    ->when($startDate, function ($query) use ($startDate) {
                        return $query->where('created_at', '>=', $startDate);
                    })
                    ->when($endDate, function ($query) use ($endDate) {
                        return $query->where('created_at', '<=', $endDate);
                    })
                     ->where('status', 'open')
                     ->paginate(35)
        ]);
    }

    public function preview_report(Management $management)
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.preview_report', [
            'management' => $management
        ]);
    }

    public function referral_doc(Management $management)
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.referraldoc', [
            'management' => $management
        ]);
    }

    public function reports(Request $request)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }


        $startDate = request('start_date');
        $endDate = request('end_date');

        return view("records.reports", [
            "leaves" => Leaves::latest()
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })->paginate(45),
            "records" => Record::latest()
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })->paginate(45),
            "injuries" => Injury::latest()
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })->paginate(45),
        ]);
    }


    public function nurse_mgmt()
    {
        return view('records.nurse_mgmt', [
            "management" => Management::whereNotNull("nurse_mgmt")->whereNull("flag_nurse")->latest()->paginate(30)
        ]);
    }

    public function flag_nurse(Record $record){
        $record->flag_nurse = "positive";
        $record->save();
        return back()->with('message', 'Record Status Updated');
    }

    public function flag_nurse_fail($id){
        $record = Record::find($id);
        $record->flag_nurse = "negative";
        $record->save();
        return back()->with('message', 'Record Status Updated');
    }


    public function flag_prescription($id){
        $record = Record::find($id);
        $record->flag_prescription = "positive";
        $record->save();
        return back()->with('message', 'Pharmacy Status Updated');
    }

    public function flag_prescription_fail($id){
        $record = Record::find($id);
        $record->flag_prescription = "negative";
        $record->save();
        return back()->with('message', 'Pharmacy Status Updated');
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
        // $hideUser = 1;
        return view('records.manage', [
            'record' => Record::where('status', 'open')
                ->latest()
                ->where("locality", auth()->user()->locality)
                ->filter(request(['search']))
                ->get(),
            // 'users' => User::all(),
            'patients' => Patient::latest()->get(),
        ]);
    }

    public function get_dependent(Patient $patient)
    {
        return view('patients.dependent', ['patient' => $patient]);
    }

    public function receipts()
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }

        return view('records.receipt', [
            'patients' => Patient::latest()->get(),
            'records' => Record::where('status', 'open')->latest()
                    ->get(),
        ]);
    }

    public function all()
    {
        if (auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }


        $startDate = request('start_date');
        $endDate = request('end_date');

        return view('records.all', [
            'patients' => Patient::latest()->get(),
            'users' => User::latest()->where("role", "doctor")->get(),
            'records' => Record::latest()
                                ->when($startDate, function ($query) use ($startDate) {
                                    return $query->where('created_at', '>=', $startDate);
                                })
                                ->when($endDate, function ($query) use ($endDate) {
                                    return $query->where('created_at', '<=', $endDate);
                                })
                            ->paginate(30),
        ]);
    }

    public function add_defacto(Request $request, Record $record)
    {
        $formFields = $request->validate([
            'processed_defacto' => ['required']
        ]);

        $record->update($formFields);

        return redirect('/records/all')->with(
            'message',
            'Defacto:'. $record->add_defacto.'added for this record'
        );


    }

    
}
