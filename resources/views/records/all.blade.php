@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 mb-4" id="content__overflow">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin:10px 0;
              "
            >
            <h4 class="header-title">Records {{ $records->count() }}</h4>
            @include('partials._datereports')
            </div>



            @unless (count($records) === 0)
                <div class="preview__grid">
                    @foreach ($records as $record)
                    <div class="card">
                        <div class="card-body">
                          <p class="card-text preview__text">
                            <div><b>Patient Name</b> : <span>{{ $record->patient->name }} </span></div>
                            <div><b>Patient StaffId</b> : <span>{{ $record->patient->staff_id }} </span></div>
                            <div><b>Blood Pressure</b> :
                                @if($record->blood_pressure_systolic > 140 || $record->blood_pressure_diastolic > 100)
                                <span class="blood_danger"> {{ $record->blood_pressure_systolic }}/ {{ $record->blood_pressure_diastolic }} (mmHg)</span>
                                @else
                                <span>: {{ $record->blood_pressure_systolic }}/ {{ $record->blood_pressure_diastolic }} (mmHg)</span>

                                @endif

                            </div>
                            <div><b>Pulse Rate</b> : <span>{{ $record->pulse_rate }} (bpm) </span></div>
                            <div><b>Nurse Note</b> : <span>{{ Str::limit($record->nurse_note, 19, '...')}} </span></div>
                            @if ($record->bmi)
                            <p><span>Current Weight</span>: <span> {{ $record->weight}} Kg </span><p>
                            <p><span>Current BMI</span>: <span> {{ round($record->bmi, 6 )}} Kg/m2</p>
                            @endif

                            <div><b>Processed By</b> : <span>{{ $record->processing_by }} </span></div>


                          </p>
                          @if($record->processing_by){
                            <a href="/records/{{ $record->id}}/feedbacks" class="btn btn-primary">
                                <i class="fas fa-hourglass"></i>
                            </a>

                            <a type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#recordDataModal{{ $record->id }}">
                                <i class="fas fa-eye"></i>
                            </a>
                              @include('partials._infomodal')
                          }

                          @else

                          <div class="alert alert-danger">
                            Not Yet Initiated
                          </div>

                          @endif


                        </div>
                      </div>
                    @endforeach
                </div>



            @endunless
            <div class="mt-5">
                {{ $records->links() }}
            </div>

    </div>
    </body>
@endsection

