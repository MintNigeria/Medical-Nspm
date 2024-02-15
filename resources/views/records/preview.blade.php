@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 py-5" id="content__overflow">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
            </div>
            <h4 class="header-title">Records {{ $records->count() }}</h4>
            @include('partials._previewdate')


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
                            <div><b>Assesment</b> : <span>{{ Str::limit($record->assessment, 8, '...')}} </span></div>
                            @if ($record->bmi)
                            <p><span>Current Weight</span>: <span> {{ $record->weight}} Kg </span><p>
                            <p><span>Current BMI</span>: <span> {{ round($record->bmi, 6 )}} Kg/m2</p>
                            @endif
                            <div><b>Test count </b> : <span>
                                @php
                                $tests = json_decode($record->tests);
                                $numberOfTests = is_array($tests) ? count($tests) : 0;
                                echo $numberOfTests;
                                 @endphp
                            </span></div>
                            <div><b>Processed By</b> : <span>{{ $record->processing_by }} </span></div>
                            <div><b>Last Updated</b>: <span>
                                {{ $record->updated_at->format('F j, Y, g:i a') }}
                            </span></div>

                          </p>

                          @if($record->processing_by){
                          <a href="/records/{{ $record->id }}/preview" class="btn btn-success" data-mdb-ripple-init>Preview</a>
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

    </div>
@endsection

