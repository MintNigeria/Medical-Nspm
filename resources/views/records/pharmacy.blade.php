@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content p-5">

            <h3>Pending Request[s]</h3>
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
                        <div><b>Flag</b> : <span>{{ $record->patient->name }} </span></div>
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

                      <div class="d-flex justify-between">
                        <form method="POST" action="/records/{{$record->id}}/flag_prescription">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-secondary" onclick="return confirm('Are you sure you want to check this as done? ')">
                                <i class="fas fa-plus text-secondary"></i>
                            </button>
                        </form>
                        <form method="POST" action="/records/{{$record->id}}/flag_prescription_fail">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to check this as not done? ')">
                                <i class="fas fa-plus text-danger"></i>
                            </button>
                        </form>

                     </div>
                    </div>
                  </div>
                @endforeach
            </div>

        @else
            <div class="alert-primary mt-5 p-3" style="width: 100%;border-radius: 20px;">
                <h5 class="text-danger font-weight-bold">No Requests Pending</h5>
            </div>
        @endunless
        </div>
    </div>
</body>


@endsection



