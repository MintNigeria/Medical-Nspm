<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class PharmacyController extends Controller
{
    public function index()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
        $notifcations = auth()->user()->unreadNotifications();
        return view(
            'pharmacy.index',
            with([
                'pharmacies' => Pharmacy::latest()
                    // ->where('id', '!=', auth()->user()->id)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }


    public function archive()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view(
            'pharmacy.archive',
            with([
                'pharmacies' => Pharmacy::onlyTrashed()
                    // ->where('id', '!=', auth()->user()->id)
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function create()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
        return view('pharmacy.create',  with([
            'groups' => Group::latest()->get()
        ]));
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
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
            'Pharmaceutical Created successfully!'
        );
    }

    public function update(Request $request, Pharmacy $pharmacy){
        $formFields = $request->validate([
            'name' => ['required', Rule::unique('pharmacies')->ignore($pharmacy)],
            'no_of_units' => 'required',
            'type' => 'required',
            'packaging' => 'required',
            'deficit_target' => 'required',
        ]);

        $formFields['location'] = auth()->user()->locality;

        $pharmacy->update($formFields);

        return redirect('/pharmacy')->with(
            'message',
            'Pharmaceutical Updated successfully!'
        );
    }

    public function destroy(Pharmacy $pharmacy)
    {
        if($pharmacy->trashed()){
            $pharmacy->forceDelete();
            return back()->with('message', 'Item Permanently Deleted');
        }
        $pharmacy->delete();
        return back()->with('message', 'Product deleted');
    }

    public function restore(Pharmacy $pharmacy, Request $request)
    {
        $pharmacy->restore();
        return back()->with('message', 'Item Restored');

    }
}
