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

        $startDate = request('start_date');
        $endDate = request('end_date');


        return view('receipts.index', [
            'receipts' => Receipt::latest() ->when($startDate, function ($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('created_at', '<=', $endDate);
            })->paginate(45),
            'records' => Record::latest()->get(),
        ]);
    }
    public function create($id)
    {
        if (auth()->user()->role !== 'him') {
            abort(403, 'Unauthorized Action');
        }

        // dd($id);
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
            'record_id' => 'required',
            'cost' => 'required',
            'is_dependent' => 'required',
        ]);

        Receipt::create($formFields);

        return back()->with([
            'records' => Record::latest()->get(),
            'success',
            'Receipt Saved',
        ]);
    }

    public function destroy(Receipt $receipt)
    {
        $receipt->delete();
        return back()->with('success', " Receipt Deleted");
    }

}
