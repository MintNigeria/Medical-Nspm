<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use App\Models\Patient;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'injury.index',
            with([
                'archives' => Injury::onlyTrashed(),
                'patients' => Patient::latest()->get(),
                'injuries' => Injury::latest()
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function archive()
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'injury.archive',
            with([
                'patients' => Patient::latest()->get(),
                'injuries' => Injury::onlyTrashed()
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function create()
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view(
            'injury.create',
            with([
                'patients' => Patient::latest()->get(),
            ])
        );
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'nurse') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'injury' => 'nullable',
            'treatment' => 'nullable',
            'medications' => 'nullable',
            'cost_total' => 'nullable',
            'patient_id' => 'required',
        ]);

        Injury::create($formFields);

        return redirect('/injuries')->with(
            'message',
            'New Injury Recorded successfully!'
        );
    }

    public function update(Request $request, Injury $injury)
    {
        $formFields = $request->validate([
            'injury' => 'nullable',
            'treatment' => 'nullable',
            'medications' => 'nullable',
            'cost_total' => 'nullable',
            // 'patient_id' => 'required',
        ]);


        $formFields['patient_id'] = $injury->patient_id;

        $injury->update($formFields);

        return redirect('/injuries')->with(
            'message',
            'New Injury Updated successfully!'
        );
    }

    public function destroy(Injury $injury)
    {
        if($injury->trashed()){
             $injury->forceDelete();
        }
        $injury->delete();
        return back()->with('message', 'Injury deleted');
    }

    public function restore(Injury $injury)
    {
        $injury->restore();
        return back()->with('message', 'Injury Restored');
    }
}
