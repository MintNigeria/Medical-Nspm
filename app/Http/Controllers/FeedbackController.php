<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Feedbacks;
use App\Models\Clinic;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index($recordId){
        if (auth()->user()->role !== 'doctor') {
            abort(403, 'Unauthorized Action');
        }

        $record = Record::where('id', $recordId)->first();
        return view("feedbacks.index",
        [
        'record' => $record,
        'clinics' => Clinic::latest()->get(),
         'feedbacks' => Feedbacks::where("record_id", $recordId)->paginate(15)
        ]);
    }

    public function create($recordId){
        if (auth()->user()->role !== 'doctor') {
            abort(403, 'Unauthorized Action');
        }

        $record = Record::where('id', $recordId)->first();
        return view("feedbacks.create",
        [
        'record' => $record,
        'clinics' => Clinic::latest()->get(),
        'patient' => $record->patient,
         'feedbacks' => Feedbacks::where("record_id", $recordId)->paginate(15)
        ]);
    }

    public function store(Request $request, $recordId)
    {
        if (auth()->user()->role !== 'doctor') {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'feedback_type' => 'required',
            'clinic_type' => 'nullable',
            'clinic_doctor' => 'nullable',
            'clinic_location' => 'nullable',
            'observation' => 'nullable',
            'detected_illness' => 'nullable',
            'consultation' => 'nullable',
            'next_action' => 'nullable',
        ]);

        $formFields['record_id'] = $recordId;

        Feedbacks::create($formFields);

        return redirect()->route('feedbacks.index', ['recordId' => $recordId])->with(
            'message',
            'FollowUp added successfully!'
        );
    }

    public function feedbacks($recordId)
    {
        if (auth()->user()->role == 'nurse' || auth()->user()->role == 'him' || auth()->user()->role == "pharmacy"
            || auth()->user()->role == "pharmacy-admin"
        ) {
            abort(403, 'Unauthorized Action');
        }

        return view('records.feedbacks', [
            'record' => Record::where('id', $recordId)->first(),
            'feedbacks' => Feedbacks::where("record_id", $recordId)->paginate(40)
        ]);
    }

    public function destroy(Feedbacks $feedback)
    {
        $feedback->delete();
        return back()->with('message', 'FollowUp deleted');
    }
}
