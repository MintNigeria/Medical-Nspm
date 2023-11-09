<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('clinics.index', [
            'archives' =>Clinic::onlyTrashed(),
            'clinics' => Clinic::latest()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    public function archive()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('clinics.archive', [
            'clinics' => Clinic::onlyTrashed()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    public function create()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('clinics.create');
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
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
    public function update (Request $request, Clinic $clinic)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $clinic->update($formFields);

        return redirect('/clinics')->with(
            'message',
            ' Clinic Updated successfully!'
        );
    }
    public function destroy(Clinic $clinic)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        if($clinic->trashed()){
            $clinic->forceDelete();
            return redirect('/clinics')->with(
                'message',
                'Clinic deleted Permanently'
            );
        }
        $clinic->delete();
        return redirect('/clinics')->with(
            'message',
            'Clinic deleted successfully'
        );
    }

    public function restore(Clinic $clinic)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        $clinic->restore();
        return redirect('/clinics')->with(
            'message',
            'Clinic deleted successfully'
        );
    }
}
