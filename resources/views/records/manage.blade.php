@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div id="content__overflow">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4 class="header-title"> OPEN RECORDS</h4>
        @include('partials._searchoprecord')
        </div>

        <div style="display:grid; grid-template-columns: auto auto auto auto; color:red;" >
            @unless (count($record) === 0)
            @foreach ($record as $record)
                  <div class="card p-4 mt-5 mx-3 font-weight-bold" style="color: teal;padding:10px;
                  ">
                  <a type="button" data-mdb-toggle="modal" data-mdb-target="#recordModal{{ $record->id }}">
                        <i class="fas fa-info bg-success text-white"
                             style="font-size:10px;padding:10px; border-radius:5px;
                                    position: absolute;right:0; cursor: pointer;margin-right: 10px;">
                        </i>
                  </a>
                  @include('partials._infomodal')

                  <p> STAFF ID : {{$record->patient->staff_id  }} {{ $record->id }}</p>
                  <p> STAFF ID : {{$record->patient->staff_id  }}</p>

                    @if ($record->blood_pressure_systolic > 141 || $record->blood_pressure_diastolic > 100)
                    <p class="text-danger font-weight-bold text-2xl blood_danger">
                        RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                    </p>

                    @else
                    <p>
                        RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                    </p>
                    @endif

                  <p> RECORDED PULSE RATE : {{$record->pulse_rate }}</p>
                  <p> RECORDED BMI: {{ round($record->bmi, 6 )}} Kg/m2</p>
                  <p> NURSE NOTE: {{Str::limit($record->nurse_note, 10, '...')  }}</p>


              @if ($record->processing && $record->processing_by !== auth()->user()->name && $record->processed_defacto !== auth()->user()->name)
                    <button class="btn header " disabled>
                        Currently Being Processed
                    </button>

                @elseif ($record->processing && $record->processing_by === auth()->user()->name || $record->processed_defacto == auth()->user()->name)
                    <a href="/records/{{ $record->slug }}/edit" class="btn btn-success">
                        Revisit Record
                    </a>
              
                @else
                <form action="{{ route('records.updateStatusAndRedirect', ['slug' => $record->slug]) }}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit"> Begin Process</button>
                </form>
                  @endif



                </div>
            @endforeach

            @endunless





        <div class="mt-1 p-1">
        </div>
        </div>
    </div>
</div>

@endsection
