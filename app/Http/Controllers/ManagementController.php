<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Inventory;
use App\Models\Management;
use App\Models\Record;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    //
    public function index()
    {
        return view("management.index", [
            'management' => Management::latest()->paginate(9),
        ]);
    }

    public function create(Record $record)
    {
        return view('management.create', [
            'record' => $record,
            'management' => Management::latest()->where('record_id', $record->id)->paginate(9),
            'retainers' => Clinic::latest()->where("lab_retainer", "retainer")->get(),
            'labs' => Clinic::latest()->where('lab_retainer', 'laboratory')->get(),
             'inventories' => Inventory::latest()
                    ->where('location', "=", auth()->user()->locality) // Compare as strings
                    ->filter(request(['search']))
                    ->paginate(35),
        ]);
    }

    public function nurse_response(Request $request, Management $management)
    {
        $formFields = $request->validate([
            'flag_nurse'=> ['nullable'],
            'nurse_notes'=> ['nullable'],
        ]);
        $management->update($formFields);
        return back()->with('message','Feedback Sent' );

    }


    public function pharmacy_response(Request $request, Management $management)
    {
        $formFields = $request->validate([
            'flag_prescription'=> ['nullable'],
            'pharmacy_notes'=> ['nullable'],
        ]);
        $management->update($formFields);
        return back()->with('message','Feedback Sent' );

    }

    public function store(Request $request, Record $record)
    {
        $formFields = $request->validate([
            'doctor_act' => ['array', 'nullable'],
            'tests' => 'array',
            'nurse_mgmt' => 'nullable',
            'prescription' => 'nullable',
            'labtest' => 'nullable',
            'clinic' => 'nullable',
        ]);

        $formFields['doctor_act'] = $formFields['doctor_act'] ?? [];
        $formFields['tests'] = $formFields['tests'] ?? [];

        $formFields['doctor_act'] = json_encode($formFields['doctor_act']);
        $formFields['tests'] = json_encode($formFields['tests']);

        $formFields['record_id'] = $record->id;
        $formFields['processing_by'] = auth()->user()->name;

        Management::create($formFields);

        return back()->with("message", "" .$record->patient->name."Mangement Initated");
    }
}
