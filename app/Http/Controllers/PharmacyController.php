<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PharmacyController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }
        return view('pharmacy.index', [
            'pharmacies' => Pharmacy::latest()->get(),
        ]);
    }

    public function create()
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }
        return view('pharmacy.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('pharmacies', 'name')],
            'no_of_units' => 'required',
            'type' => 'required',
            'packaging' => 'required',
            'deficit_target' => 'required',
        ]);

        $formFields['location'] = auth()->user()->locality;

        Pharmacy::create($formFields);

        return redirect('/pharmacy')->with(
            'message',
            'Pharmaceutical created successfully!'
        );
    }
}