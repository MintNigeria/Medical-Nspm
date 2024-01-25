<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Record;
use App\Models\Allergy;
class AllergyController extends Controller
{
    public function index(){

    }

    public function create($patientId){
        $patient = Patient::where('id', $patientId)->first();
        return view("allergies.create", [
            ''
        ]);
    }

    public function store(Request $request, $patientId)
    {
        $formFields = $request->validate([
            'allergies' => 'required',
        ]);

        $formFields['patient_id'] = $patientId;

        Allergy::create($formFields);

        return back()->with(
            'message',
            'Allergy Added successfully!'
        );
    }


    public function view($patientId){
        $patient = Patient::where('id', $patientId)->first();
        return view("allergies.view",
        ['patient' => $patient,
         'allergys' => Allergy::where("patient_id", $patientId)->paginate(15)
        ]);
    }

}
