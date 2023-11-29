<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Notifications\NewProductNotification;

class InventoryController extends Controller
{
    public function index()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        $notifications = auth()->user()->unreadNotifications;

        // dd($notifications);

        return view(
            'inventory.index',
            with([
                'notifications' => $notifications,
                'archives' => Inventory::onlyTrashed(),
                'inventories' => Inventory::latest()
                    ->where('location', "=", auth()->user()->locality) // Compare as strings
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }

    public function archive()
    {
        return view(
            'inventory.archive',
            with([
                'inventories' => Inventory::onlyTrashed()
                    ->filter(request(['search']))
                    ->paginate(45),
            ])
        );
    }


    public function stock_low()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
        // dd(Inventory::latest()
        // ->where('unit_deficit', ">", "unit_deficit") // Compare as strings
        // ->where('location', "=", auth()->user()->locality) // Compare as strings
        // ->filter(request(['search']))
        // ->paginate(45));
        return view('inventory.stock_low', with([
            'inventories' => Inventory::latest()
                ->where('no_of_units', ">=", "unit_deficit") // Compare as strings
                ->where('location', "=", auth()->user()->locality) // Compare as strings
                ->filter(request(['search']))
                ->paginate(45),
        ]));



    }

    public function create()
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('inventory.create',  with([
            'groups' => Group::latest()->get()
        ]));
    }

    public function store(Request $request)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('inventories', 'name')],
            'no_of_units' => 'required',
            // 'location' => 'required',
            'type' => 'required',
            'packaging' => 'required',
            'unit_deficit' => 'nullable',
        ]);


        $formFields['location'] = auth()->user()->locality;


        $inventory = Inventory::create($formFields);
        $inventoryName = $inventory->name;

    }

    // Show Edit Form
    public function edit(Inventory $inventory)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        return view('inventory.edit', ['inventory' => $inventory]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('inventories')->ignore($inventory)],
            'no_of_units' => 'required',
            'unit_deficit' => 'required',
            'location' => 'required',
            'type' => 'required',
            'packaging' => 'required',
        ]);
        $inventory->update($formFields);



        return redirect('/inventory')->with(
            'message',
            'Inventory Updated successfully!'
        );
    }

    public function destroy(Inventory $inventory)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }
        if($inventory->trashed()){
            $inventory->forceDelete();
            return redirect('/inventory')->with(
                'message',
                'Inventory Permanently deleted successfully'
            );
        }
        $inventory->delete();
        return redirect('/inventory')->with(
            'message',
            'Inventory deleted successfully'
        );
    }

    public function restore(Inventory $inventory, Request $request)
    {
        $inventory->restore();
        return back()->with('message', 'Item Restored');

    }

    public function increment($id)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        $inventory = Inventory::find($id);

        $inventory->no_of_units = $inventory->no_of_units + 1;

        $inventory->save();
        return redirect('/inventory')->with(
            'message',
            'Inventory Unit Added'
        );
    }

    public function reduce($id)
    {
        // if (auth()->user()->role !== 'pharmacy') {
        //     abort(403, 'Unauthorized Action');
        // }

        $inventory = Inventory::find($id);

        $inventory->no_of_units = $inventory->no_of_units - 1;


        return redirect('/inventory')->with(
            'message',
            'Inventory Unit Removed'
        );
    }



}
