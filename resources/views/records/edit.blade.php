@extends('layout')
@section('content')

<script>
    $(document).ready(function () {
        $('#myModal').modal('show');

        // Handle the close button click event
        $('#closeModalButton').click(function () {
            $('#myModal').modal('hide');
        });
    });
</script>

<?php
// Assuming $record->patient->birth_date is in the format 'Y-m-d'

$birthDate = new DateTime($record->patient->birth_date);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

?>

<div class="dashboard">
@include('partials._sidebar')
<div class="content p-2 mt-2" >
<div id="content__overflow">

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
    <div class="card-header text-success bg-color">
        <div style="display:flex;align-items:center;justify-content:space-between">
            <p>RECORD [ {{ $record->patient->name }} / {{ $record->patient->staff_id }} ]</p>

            <p>
                Process Initiated BY : {{$record->processing_by }}
            </p>
        </div>

    </div>
    <div class="card-body z-10">
        <div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                <div>
                <h4 class="text-secondary text-capitalize">BioData</h4>

                <p><b> <span>Staff Name </span> : {{ $record->patient->name }}</b></p>
                <p><b> <span>Staff ID </span> : {{ $record->patient->staff_id }}</b></p>
                <p><b> <span>Height </span> : {{ $record->patient->height }} (m <span>^2</span>)</b></p>
                <p><b> <span>AGE </span> : {{ $age }} years old</b></p>
                @if ($record->bmi)
                <p><b><span>Current Weight</span>: {{ $record->weight}} Kg</b></b></p>
                <p><b><span>Current BMI</span>: {{ round($record->bmi, 6 )}} Kg/m2</b></b></p>
                @endif
                <h4 class="text-secondary text-capitalize">Vitals</h4>
                <p><b><span>Body Temperature</span>: {{ $record->temp }} (℃)</b></b></p>
                @if($record->blood_pressure_systolic > 140 || $record->blood_pressure_diastolic > 100)
                <p class="blood_danger"><b><span class="blood_danger">Blood Pressure : {{ $record->blood_pressure_systolic }}/ {{ $record->blood_pressure_diastolic }} (mmHg)</span></b></b></p>
                @else
                <p><b><span>Blood Pressure</span>: {{ $record->blood_pressure_systolic }}/ {{ $record->blood_pressure_diastolic }} (mmHg)</b></b></p>

                @endif
                <p><b><span>Body Pulse Rate</span>: {{ $record->pulse_rate }} (bpm)</b></b></p>

                <p><b> <span></i> Nurse Remarks: </span>
                    @if ($record->nurse_note)
                            {{ $record->nurse_note }}</b></p>
                    @endif
                </div>
                <p>
                    <a href="/feedbacks/{{ $record->patient->id }}/index" class="btn btn-dark text-success h-15">Feedback(s)</a>
                    <a href="/allergies/{{ $record->patient->id }}/view" class="btn btn-secondary h-15">Allergy</a>
                </p>

                </div>
        <hr>

        <div class="alert-success p-4 text-success" style="border-radius:10px;font-weight:bold;">
            <a href="/records/{{ $record->patient->id }}/view" class="text-success">
                VIEW PAST RECORDS
            </a>
        </div>

        <hr>
        <b class="text-success">
            MEDICAL INPUT
        </b>

{{-- Import Doctor Analysis --}}

    @include('partials._doctorecords')

    </div>

</div>
</div>
</div>
</div>
</div>

@include('partials._show')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Allergy listing(s)</h5>
                <button type="button" class="close" data-dismiss="modal" id="closeModalButton" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="alert alert-primary">
                        THIS PATIENT HAS <b class="text-danger font-bold text-2xl" style="font-size: 20px;"> ({{ $allergies->count() }})</b> allergies Recorded.

                        </div>
                <br />
                @unless (count($allergies) === 0)
                @foreach ($allergies as $allergy)
                    <p class="text-black alert-primary my-2 ">{{ Str::limit($allergy->allergies, 10, '...') }}</p>
                @endforeach
            @endunless

            @if($record->flag_prescription === "positive")
            <div class="alert alert-primary">
                PRESCRIPTION POSITIVE
            </div>
            @endif

            @if($record->flag_prescription === "negative")
            <div class="alert alert-danger">
                PRESCRIPTION NEGATIVE
            </div>
            @endif

            @if($record->flag_nurse === "positive")
            <div class="alert alert-primary">
                NURSE MANAGEMENT POSITIVE
            </div>
            @endif

            @if($record->flag_nurse === "negative")
            <div class="alert alert-danger">
                NURSE MANAGEMENT NEGATIVE
            </div>
            @endif
            </div>

        </div>
    </div>
</div>



@endsection
