<?php

namespace App\Http\Controllers;

use App\Exports\PatientExport;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
    //Index
    public function index()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('patients.index', [
            'patients' => Patient::latest()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    //Show A Patient
    public function show(Patient $patient)
    {
        return view('patient.show', [
            'patient' => $patient,
        ]);
    }

    // Show Create Form
    public function create()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('patients.create');
    }

    // Store Listing Data
    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'name' => 'required',
            'staff_id' => ['required', Rule::unique('patients', 'staff_id')],
            'address' => 'required',
            'height' => 'required',
            'contact' => 'required',
            'dependencies' => 'nullable',
            'birth_date' => 'required',
        ]);

        Patient::create($formFields);

        return redirect('/patient')->with(
            'message',
            'Patient Created successfully!'
        );
    }

    // Show Edit Form
    public function edit(Patient $patient)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('patients.edit', ['patient' => $patient]);
    }

    // Update Listing Data
    public function update(Request $request, Patient $patient)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'name' =>  ['required', Rule::unique('patients')->ignore($patient)],
            'staff_id' =>  ['required', Rule::unique('patients')->ignore($patient)],
            'address' => 'required',
            'dependencies' => 'nullable',
            'contact' => 'required',
            'birth_date' => 'required',
        ]);
        $patient->update($formFields);

        return redirect('/patient')->with(
            'message',
            'Patient Updated successfully!'
        );
    }

    // Delete Listing
    public function destroy(Patient $patient)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        $patient->delete();
        return redirect('/patient')->with(
            'message',
            'Patient deleted successfully'
        );
    }

    public function export()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return Excel::download(new PatientExport(), 'patients.xlsx');
    }
}
