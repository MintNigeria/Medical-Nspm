<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Record;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }
        return view('receipts.index', [
            'receipts' => Receipt::latest()
                // ->filter()
                ->get(),
        ]);
    }
    public function create($id)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }

        $record = Record::find($id);

        return view('receipts.create', [
            'record' => $record,
        ]);
    }

    public function store(Request $request, Record $record)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'prescription' => 'required',
            'cost' => 'required',
            'is_dependent' => 'required',
        ]);

        $formFields['record_id'] = $record->id;

        Receipt::create($formFields);

        return back()->with([
            'records' => Record::latest()->get(),
            'success',
            'Receipt Saved',
        ]);
    }
}