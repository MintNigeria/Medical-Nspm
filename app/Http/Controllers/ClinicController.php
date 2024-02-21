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
        return view('retainers.index', [
            'archives' =>Clinic::onlyTrashed(),
            'clinics' => Clinic::latest()
                ->filter(request(['search']))
                ->paginate(100),
        ]);
    }

    public function activate(Clinic $clinic)
    {
        $clinic->activate = !$clinic->activate;
        $clinic->save();
        if($clinic->activate){
         return back()->with('message','Clinic Activated');
        }
        return back()->with('message','Clinic Deactivated');
    }

    public function archive()
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('retainers.archive', [
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
        return view('retainers.create');
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'lab_retainer' => 'required',
        ]);

        Clinic::create($formFields);

        return redirect('/retainers')->with(
            'message',
            'created successfully!'
        );
    }
    public function update (Request $request, Clinic $clinic)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'lab_retainer' => 'required',
        ]);

        $clinic->update($formFields);

        return redirect('/retainers')->with(
            'message',
            'Updated successfully!'
        );
    }
    public function destroy(Clinic $clinic)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }
        if($clinic->trashed()){
            $clinic->forceDelete();
            return redirect('/retainers')->with(
                'message',
                'Retainer deleted Permanently'
            );
        }
        $clinic->delete();
        return redirect('/retainers')->with(
            'message',
            'Retainer deleted successfully'
        );
    }

    public function restore(Clinic $clinic)
    {
        // if (auth()->user()->role !== 'him') {
        //     abort(403, 'Unauthorized Action');
        // }

        $clinic->restore();
        return redirect('/retainers')->with(
            'message',
            'Retainer deleted successfully'
        );
    }
}
