<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\Patient;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view('leaves.index', [
            'leaves' => Leaves::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('leaves.create', [
            'patients' => Patient::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'patient_id' => 'required',
            'no_of_days' => 'required',
            'comment' => 'required',
        ]);

        Leaves::create($formFields);

        return redirect('/leaves')->with(
            'message',
            'Sick Leaves created successfully!'
        );
    }

    // Show Edit Form
    public function edit(Leaves $leave)
    {
        return view('leaves.edit', ['leave' => $leave]);
    }

    //Delete LEave
    public function destroy(Leaves $leave)
    {
        $leave->delete();
        return redirect('/leaves')->with(
            'message',
            'Medical Leave deleted successfully'
        );
    }
}
