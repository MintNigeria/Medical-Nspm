<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use App\Models\Patient;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'nurse') {
            abort(403, 'Unauthorized Action');
        }

        return view(
            'injury.index',
            with([
                'patients' => Patient::latest()->get(),
                'injuries' => Injury::latest()
                    ->filter(request(['search']))
                    ->paginate(100),
            ])
        );
    }

    public function create()
    {
        if (auth()->user()->role !== 'nurse') {
            abort(403, 'Unauthorized Action');
        }

        return view(
            'injury.create',
            with([
                'patients' => Patient::latest()->get(),
            ])
        );
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'nurse') {
            abort(403, 'Unauthorized Action');
        }

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
}