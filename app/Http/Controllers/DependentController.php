<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Patient;
use Illuminate\Http\Request;

class DependentController extends Controller
{
    public function index(Patient $patient)
    {
        return view('dependents.dependent', [
            'dependents' => Dependent::latest()->filter(request(['search']))->paginate(1),
            'patient' => $patient,
        ]);
    }

    public function store(Request $request, Patient $patient)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'blood_pressure' => 'required',
            'bpm' => 'required',
            'temperature' => 'required',
            'nurse_note' => 'nullable',
        ]);

        $formFields['patient_id'] = $patient->id;

        Dependent::create($formFields);

        return back()->with('success', 'Record Saved');
    }

    public function edit(Dependent $dependent)
    {
        return view('dependents.edit', ['dependent' => $dependent]);
    }

    public function update(Request $request, Dependent $dependent)
    {
        $formFields = $request->validate([
            'doctor_comment' => 'required',
            'prescription' => 'required',
            'status' => 'required',
            'designate' => 'required',
            'flag' => 'nullable',
        ]);

        $dependent->update($formFields);

        return redirect('/patient')->with([
            'patients' => Patient::latest()->get(),
            'message',
            'Record updated successfully!',
        ]);
    }

    public function manage()
    {
        $dependents = Dependent::where('status', 'open')
            ->latest()
            ->get();
        return view('dependents.manage', ['dependents' => $dependents]);
    }

    public function flag_success($id)
    {
        $dependent = Dependent::find($id);

        $dependent->flag = 'success';

        $dependent->save();

        return back()->with('message', 'Dependency Flagged');
    }

    public function flag_nt_stock($id)
    {
        $dependent = Dependent::find($id);

        $dependent->flag = 'not_stocked';

        $dependent->save();

        return back()->with('message', 'Dependency Flagged');
    }
}
