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
            'location' => 'required',
        ]);

        switch ($formFields['department']) {
            case "Intaglio Print":
                $formFields['prefix'] = 'INT';
                break;
            case 'New Line':
                $formFields['prefix'] = 'NWL';
                break;
            case 'Quality Control':
                if ($formFields['location'] == 'abj') {
                    $formFields['prefix'] = 'QC';
                } elseif ($formFields['location'] == 'lag') {
                    $formFields['prefix'] = 'SHE';
                }
                break;
            case 'Bank Note Finishing':
                if($formFields['location'] === "abj"){
                    $formFields['prefix'] = 'BF';
                }elseif($formFields['location'] === 'lag'){
                    $formFields['prefix'] = 'SFD';
                }
                break;
            case "Numbering":
                $formFields['prefix'] = 'NOG';
            break;
            case "BankNote Design":
                $formFields['prefix'] = 'BDE';
            break;
            case "Engineering Services":
                $formFields['prefix'] = 'ENG';
            break;
            case "Health Safety & Enviroment":
                $formFields['prefix'] = "HSE";
            break;
            case "Security":
                $formFields['prefix'] = "SC";
            break;
            case "Litho":
                $formFields['prefix'] = "LT";
            break;
            case "Spy Police":
                $formFields["prefix"] = "SPY";
            break;
            case "Commisioners":
                $formFields['prefix'] = "COMM";
            break;
            case "SDD Core Press":
                $formFields['prefix'] = "SPD";
            break;
            case "SDD Finishing":
                $formFields['prefix'] = "SPF";
            break;
            case "SDD Design":
                $formFields['prefix'] = 'SDE';
            case "Cheque Finishing":
                $formFields['prefix'] = "CHQ";
            break;
            case "Exam Type Setting": 
                $formFields['prefix'] = "ETS";
            break;
            default:
                $formFields['prefix'] = "OB";
            break;
        }

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
            "location" => 'required'
        ]);

        $formFields['birth_date'] = $patient->birth_date;

        switch ($formFields['department']) {
            case "Intaglio Print":
                $formFields['prefix'] = 'INT';
                break;
            case 'New Line':
                $formFields['prefix'] = 'NWL';
                break;
            case 'Quality Control':
                if ($formFields['location'] == 'abj') {
                    $formFields['prefix'] = 'QC';
                } elseif ($formFields['location'] == 'lag') {
                    $formFields['prefix'] = 'SHE';
                }
                break;
            case 'Bank Note Finishing':
                if($formFields['location'] === "abj"){
                    $formFields['prefix'] = 'BF';
                }elseif($formFields['location'] === 'lag'){
                    $formFields['prefix'] = 'SFD';
                }
                break;
            case "Numbering":
                $formFields['prefix'] = 'NOG';
            break;
            case "BankNote Design":
                $formFields['prefix'] = 'BDE';
            break;
            case "Engineering Services":
                $formFields['prefix'] = 'ENG';
            break;
            case "Health Safety & Enviroment":
                $formFields['prefix'] = "HSE";
            break;
            case "Security":
                $formFields['prefix'] = "SC";
            break;
            case "Litho":
                $formFields['prefix'] = "LT";
            break;
            case "Spy Police":
                $formFields["prefix"] = "SPY";
            break;
            case "Commisioners":
                $formFields['prefix'] = "COMM";
            break;
            case "SDD Core Press":
                $formFields['prefix'] = "SPD";
            break;
            case "SDD Finishing":
                $formFields['prefix'] = "SPF";
            break;
            case "SDD Design":
                $formFields['prefix'] = 'SDE';
            break;
            case "Cheque Finishing":
                $formFields['prefix'] = "CHQ";
            break;
            case "Exam Type Setting": 
                $formFields['prefix'] = "ETS";
            break;
            default:
                $formFields['prefix'] = "OB";
            break;
        }

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


    public function export()
    {
         if (auth()->user()->role !== 'him' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        return Excel::download(new PatientExport(), 'patients.xlsx');
    }
}
