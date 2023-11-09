<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Patient;
use App\Models\Pharmacy;
use App\Models\Clinic;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecordController extends Controller
{
    //Index
    public function index()
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

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
            'blood_pressure' => 'required',
            'temp' => 'required',
            'pulse_rate' => 'required',
            'assessment' => 'nullable',
            'prescription' => 'nullable',
            'nurse_note' => 'required',
            'weight' => 'nullable',
            'patient_id' => 'required',
        ]);

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
    public function edit(Record $record)
    {
        return view('records.edit', [
            'record' => $record,
            'clinics' => Clinic::latest()->get(),
            'pharmacies' => Pharmacy::paginate(20),
        ]);
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
        return redirect('/records/manage')->with(
            'message',
            'Record updated successfully!'
        );
    }

    public function updateStatusAndRedirect($id)
    {
        $record = Record::find($id);

        $record->update([
            'processing' => true,
            'processing_by' => auth()->user()->name,
        ]);
        return redirect()->route('records.edit', ['record' => $record]);
    }

    public function view_patient($patientId)
    {
        $records = Record::where('patient_id', $patientId)->get();
        return view('records.view', ['records' => $records]);
    }

    //View Pharmacy Records
    public function pharmacy()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('records.pharmacy', [
            'records' => Record::where('designate', 'pharmacy')
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

        return view('records.nurse_mgmt', [
            'records' => Record::where('designate', 'nurse')
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
