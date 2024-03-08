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
            @include('partials._message')


            @unless (count($records) === 0)
                <div class="preview__grid">
                    @foreach ($records as $record)
                    <div class="card" style="position: relative">
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
                          @if($record->processing_by)
                            <div style="display: flex; flex-direction:column;position: absolute; top:6px; right:5px; align-items:center;">
                         

                            <a type="button" class="text-black" data-mdb-toggle="modal" data-mdb-target="#recordModal{{ $record->id }}">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="/records/{{ $record->id}}/feedbacks" class="text-black">
                              <i class="fas fa-flask"></i>
                          </a>

                            <a href="/management/{{$record->slug }}/" class="text-black">
                              <i class="fas fa-info-circle"></i>
                          </a>
                              

                              <a  type="button" class="text-black" data-mdb-toggle="modal" data-mdb-target="#changeDoctorModal{{ $record->id }}">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                          
                            @include('partials._infomodal')
                            @include('partials._defactomodal')
                            </div>
                          

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

