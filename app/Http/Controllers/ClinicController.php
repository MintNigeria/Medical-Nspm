<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }
        return view('clinics.index', [
            'clinics' => Clinic::latest()->get(),
        ]);
    }

    public function create()
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }
        return view('clinics.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        Clinic::create($formFields);

        return redirect('/clinics')->with(
            'message',
            'New Clinic created successfully!'
        );
    }
    public function destroy(Clinic $clinic)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }
        $clinic->delete();
        return redirect('/clinics')->with(
            'message',
            'Clinic deleted successfully'
        );
    }
}