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
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('patients.index', [
            'archives' => Patient::onlyTrashed(),
            'patients' => Patient::latest()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    public function activate(Patient $patient)
    {
        $patient->activate = !$patient->activate;
        $patient->save();
        if($patient->activate){
         return back()->with('message','Patient Activated');
        }
        return back()->with('message','Patient Deactivated');
    }
    public function archive()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('patients.archive', [
            'patients' => Patient::onlyTrashed()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    //Show A Patient
    public function show(Patient $patient)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return view('patient.show', [
            'patient' => $patient,
        ]);
    }

    // Show Create Form
    public function create()
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return view('patients.create');
    }

    // Store Listing Data
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'staff_id' => ['required', Rule::unique('patients', 'staff_id')],
            'address' => 'required',
            'email' => 'required',
            'department' => 'required',
            'height' => 'required',
            'contact' => 'required',
            'dependencies' => 'nullable',
            'birth_date' => 'required',
            'prefix' => 'required',
            'location' => 'required',
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
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        return view('patients.edit', ['patient' => $patient]);
    }

    // Update Listing Data
    public function update(Request $request, Patient $patient)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' =>  ['required', Rule::unique('patients')->ignore($patient)],
            'staff_id' =>  ['required', Rule::unique('patients')->ignore($patient)],
            'address' => 'required',
            'email' => 'required',
            'department' => 'required',
            'height' => 'required',
            'dependencies' => 'nullable',
            'contact' => 'required',
            "location" => 'required',
            'prefix' => 'required'
        ]);

        $formFields['birth_date'] = $patient->birth_date;

        $patient->update($formFields);
        return redirect('/patient')->with(
            'message',
            'Patient'.$patient->staff_id.' Updated successfully!'
        );
    }

    public function update_dob(Request $request, Patient $patient)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'birth_date' => 'required',
        ]);
        $patient->update($formFields);

        return redirect('/patient')->with(
            'message',
            'Patient Birth Date Updated successfully!'
        );
    }
    // Delete Listing
    public function destroy(Patient $patient)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        if($patient->trashed()){
            $patient->forceDelete();
            return redirect('/patient')->with(
                'message',
                'Patient deleted permanently'
            );
        }
        $patient->delete();
        return redirect('/patient')->with(
            'message',
            'Patient deleted successfully'
        );
    }

    public function restore(Patient $patient)
    {
        if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $patient->restore();
        return redirect('/patient')->with(
            'message',
            'Patient Restored successfully'
        );
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx', // Ensure the file has .xlsx extension
        ]);
        
        $file = $request->file("excel_file");
        Excel::import(new PatientExport, $file);
        return redirect()->back()->with("message", "Import Data Successful!");
    }

    public function export()
    {
         if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return Excel::download(new PatientExport(), 'patients.xlsx');
    }
}
