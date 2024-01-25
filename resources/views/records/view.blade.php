@extends('layout')

@section('content')

<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-5">
        <div style="display:flex; align-items:center;justify-content:space-between; margin-bottom:40px;">
            <p></p>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    Patient's Profile
                </button>
                <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    View Allergies
                </button>
            </div>



        </div>
        @unless (count($records) === 0)

        @foreach ($records as $record)
            <div class="card p-4 mt-2">
                <div style="color:#37474f;font-weight:bold">
                    <p>PULSE RATE:       <span style="color: #07cb73">{{ $record->pulse_rate }}</span></p>
                    <p>BLOOD PRESSURE: <span style="color: #07cb73">{{ $record->blood_pressure }}</span></p>
                    <p>DOCTOR's ASSESMENT:  <span style="color: #07cb73">{{ $record->assessment }}</span></p>
                    <p>CURRENT STATUS:   <span style="color: #07cb73">{{ $record->status }}</span></p>
                    <p>CURRENT STAFF-ID:   <span style="color: #07cb73">{{ $record->patient->staff_id }}</span></p>
                </div>
            </div>
        @endforeach

        @else
        <p>No Records</p>

        @endunless
    </div>
    @include('partials._modal')
</div>

@endsection
