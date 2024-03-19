<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use App\Models\Patient;
use Illuminate\Http\Request;

class InjuryController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $user = auth()->user()->name;
        if(auth()->user()->role !== 'medic-admin') {
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
    if(auth()->user()->role !== 'doctor') {

        return view(
            'injury.index',
            with([
                'archives' => Injury::onlyTrashed(),
                'patients' => Patient::latest()->get(),
                'injuries' => Injury::latest()->where("attending_doctor",  $user)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
        }
    }

    public function archive()
    {
        if (auth()->user()->role !== 'doctor') {
            abort(403, 'Unauthorized Action');
        }

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
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
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
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'date_accident_death' => 'required',
            'time_accident_death' => 'required',
            'location_accident' => 'required',
            'description_accident' => 'required',
            'treatment' => 'required',
            'severity' => 'required',
            'death_cause' => 'nullable',
            'health_status' => 'nullable',
            'days_absent' => 'nullable',
            'disability' => 'nullable',
            'cost_total' => 'required',
            'patient_id' => 'required',
        ]);
        $formFields['attending_doctor'] = auth()->user()->name;

        Injury::create($formFields);

        return redirect('/injuries')->with(
            'message',
            'New Injury Recorded successfully!'
        );
    }

    public function update(Request $request, Injury $injury)
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'date_accident_death' => 'required',
            'time_accident_death' => 'required',
            'location_accident' => 'required',
            'description_accident' => 'required',
            'treatment' => 'required',
            'severity' => 'required',
            'death_cause' => 'nullable',
            'days_absent' => 'nullable',
            'health_status' => 'nullable',
            'disability' => 'nullable',
            'cost_total' => 'required',
            'patient_id' => 'required',
        ]);
        $formFields['patient_id'] = $injury->patient_id;

        $injury->update($formFields);

        return redirect('/injuries')->with(
            'message',
            'New Injury Updated successfully!'
        );
    }


    public function insurance(Request $request, Injury $injury)
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }


        return view("injury.insurance", [
            'injury' => $injury
        ]);

    }

    public function insurance_update(Request $request, Injury $injury)
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'insurance_doctor' => 'required',
            'insurance_date' => 'required',
        ]);

        $injury->update($formFields);

        return back()->with(
            'message',
            'New Injury Updated successfully!'
        );
    }

    public function destroy(Injury $injury)
    {
       if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }

        if($injury->trashed()){
             $injury->forceDelete();
        }
        $injury->delete();
        return back()->with('message', 'Injury deleted');
    }

    public function restore(Injury $injury)
    {
        if (auth()->user()->role !== 'doctor' && auth()->user()->role !== 'medic-admin') {
            abort(403, 'Unauthorized Action');
        }
        
        $injury->restore();
        return back()->with('message', 'Injury Restored');
    }
}
