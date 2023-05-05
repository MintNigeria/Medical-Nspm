@extends('layout')

@section('content')

<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-2 mt-2" >
        @if ($record->flag === 'success')
            <div class="alert-primary my-1 p-3">
            FLAGGED AS : SERVICE RENDERED ADVISED TO CLOSE STATUS
        </div>
        @elseif ($record->flag === 'not_in_stock')
        <div class="alert-primary my-1 p-3">
            FLAGGED AS : NOT IN STOCK @ {{ $record->designate }} MAY NEED TO DESIGNATE OUTDOORS
        </div>
        @else

        @endif

        <div class="card" style="overflow-y: auto">
            <div class="card-header header_inverse">
                <div style="display:flex;align-items:center;justify-content:space-between">
                    <p>RECORD [ {{ $record->patient->name }} / {{ $record->patient->staff_id }} ]</p>
                    {{-- <a class="btn btn-gold" href="/records/{{ $record->patient->id }}/view">
                        VIEW PAST RECORDS
                    </a> --}}
                    <p>
                        Process Initiated BY : {{$record->processing_by }}
                    </p>
                </div>

            </div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <p><b> <span>Staff Name </span> : {{ $record->patient->name }}</b></p>
                        <p><b> <span>Staff ID </span> : {{ $record->patient->staff_id }}</b></p>
                        <p><b> <span>Height </span> : {{ $record->patient->height }} (m <span>^2</span>)</b></p>
                        <p><b> <span></i>Aforementioned Allergies </span> : {{ $record->patient->allergy }}</b></p>
                    <hr>
                        <p><b><span>Body Temperature</span>: {{ $record->temp }} (℃)</b></b></p>
                        <p><b><span>Blood Pressure</span>: {{ $record->blood_pressure }} (mmHg)</b></b></p>
                        <p><b><span>Body Pulse Rate</span>: {{ $record->pulse_rate }} (bpm)</b></b></p>
                        @if ($record->bmi)
                        <p><b><span>Current Weight</span>: {{ $record->weight}} Kg</b></b></p>
                        <p><b><span>Current BMI</span>: {{ round($record->bmi, 6 )}} Kg/m2</b></b></p>
                        @endif
                        <p><b> <span></i> Nurse Observations: </span>
                            @if ($record->nurse_note)
                                <b>Null</b>
                            @endif
                            {{ $record->nurse_notes }}</b></p>
                <hr>

                <div class="alert-primary p-4 text-danger" style="border-radius:25px;font-weight:bold; ">
                    <a href="/records/{{ $record->patient->id }}/view" class="text-danger">
                        VIEW PAST RECORDS
                    </a>
                </div>

                <hr>
                <b class="text-primary">
                    DOCTOR'S ACTIONS
                </b>



            @include('partials._doctorecords')

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

@include('partials._show')

@endsection
