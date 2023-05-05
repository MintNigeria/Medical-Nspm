<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InventoryController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        return view('inventory.index', [
            'inventories' => Inventory::latest()->get(),
        ]);
    }

    public function create()
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        return view('inventory.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => ['required', Rule::unique('inventories', 'name')],
            'no_of_units' => 'required',
            'location' => 'required',
            'type' => 'required',
            'packaging' => 'required',
            'unit_deficit' => 'nullable',
        ]);

        Inventory::create($formFields);

        return redirect('/inventory')->with(
            'message',
            'Inventory created successfully!'
        );
    }

    // Show Edit Form
    public function edit(Inventory $inventory)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        return view('inventory.edit', ['inventory' => $inventory]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => ['required'],
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
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        $inventory->delete();
        return redirect('/inventory')->with(
            'message',
            'Inventory deleted successfully'
        );
    }

    public function increment($id)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        $inventory = Inventory::find($id);

        $inventory->no_of_units = $inventory->no_of_units + 1;

        $inventory->save();
        return redirect('/inventory')->with(
            'message',
            'Inventory Unit Removed'
        );
    }

    public function reduce($id)
    {
        if (auth()->user()->role !== 'pharmacy') {
            abort(403, 'Unauthorized Action');
        }

        $inventory = Inventory::find($id);

        $inventory->no_of_units = $inventory->no_of_units - 1;

        $inventory->save();
        return redirect('/inventory')->with(
            'message',
            'Inventory Unit Removed'
        );
    }
}