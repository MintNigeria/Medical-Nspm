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
            <h4 class="header-title text-capitalize">Listings {{ $management->count() }}</h4>
            @include('partials._previewdate')

            @unless (count($records) === 0)
                <div class="preview__grid">
                    @foreach ($management as $management)
                    <div class="card mt-4">
                        <div class="card-body">
                          <p class="card-text preview__text ">
                            <div><b>Patient Name</b> : <span>{{ $management->record->patient->name }} </span></div>
                            <div><b>Patient StaffId</b> : <span>{{ $management->record->patient->staff_id }} </span></div>
                            <div><b>Blood Pressure</b> :
                                @if($management->record->blood_pressure_systolic > 140 || $management->record->blood_pressure_diastolic > 100)
                                <span class="blood_danger"> {{ $management->record->blood_pressure_systolic }}/ {{ $management->record->blood_pressure_diastolic }} (mmHg)</span>
                                @else
                                <span>: {{ $management->record->blood_pressure_systolic }}/ {{ $management->record->blood_pressure_diastolic }} (mmHg)</span>

                                @endif

                            </div>
                            <div><b>Pulse Rate</b> : <span>{{ $management->record->pulse_rate }} (bpm) </span></div>
                            <div><b>Assesment</b> : <span>{{ Str::limit($management->record->assessment, 8, '...')}} </span></div>
                            @if ($management->record->bmi)
                            <p><b>Current Weight</b>: <span> {{ $management->record->weight}} Kg </span><p>
                            <p><b>Current BMI</b>: <span> {{ $management->record->doctor_act}} Kg/m2</p>
                            @endif
                            <div><b>Test count </b> : <span>
                                @php
                                $tests = json_decode($management->tests);
                                $numberOfTests = is_array($tests) ? count($tests) : 0;
                                echo $numberOfTests;
                                 @endphp
                            </span></div>
                            <div><b>Processed By</b> : <span>{{ $management->record->processing_by }} </span></div>
                            <div><b>Last Updated</b>: <span>
                                {{ $management->record->updated_at->format('F j, Y, g:i a') }}
                            </span></div>

                          </p>
                          @if($management->record->processing_by)
                          <a href="/records/{{ $management->id }}/preview" class="btn btn-success" data-mdb-ripple-init>Preview</a>
                        
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

