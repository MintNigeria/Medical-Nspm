<?php

namespace App\Http\Controllers;

use App\Models\Leaves;
use App\Models\Patient;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        return view(
             'leaves.index',
        with([
            'archives' =>Leaves::onlyTrashed(),
            'patients' => Patient::latest()->get(),
            'leaves' => Leaves::latest()
                // ->where('id', '!=', auth()->user()->id)
                ->filter(request(['search']))
                ->paginate(45),
        ])
    );

    }

    public function archive()
    {
        return view(
             'leaves.archive',
        with([
            'patients' => Patient::latest()->get(),
            'leaves' => Leaves::onlyTrashed()
                // ->where('id', '!=', auth()->user()->id)
                ->filter(request(['search']))
                ->paginate(45),
        ])
    );

    }

    public function create()
    {
        return view('leaves.create', [
            'patients' => Patient::latest()->get(),
        ]);
    }

    public function receipt(Request $request, Leaves  $leave)
    {
        return view('leaves.receipt', [
            'leave' => $leave,
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

    public function update(Request $request, Leaves  $leave)
    {
        $formFields = $request->validate([
            // 'patient_id' => 'required',
            'no_of_days' => 'required',
            'comment' => 'required',
        ]);

        $formFields['patient_id'] = $leave->patient_id;

        $leave->update($formFields);

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
        if($leave->trashed()){
            $leave->forceDelete();
            return redirect('/leaves')->with(
                'message',
                'Medical Leave deleted permanently'
            );
        }
        $leave->delete();
        return redirect('/leaves')->with(
            'message',
            'Medical Leave deleted successfully'
        );
    }

    public function restore(Leaves $leave)
    {
        $leave->restore();
        return redirect('/leaves')->with(
            'message',
            'Medical Leave restored successfully'
        );
    }
}
