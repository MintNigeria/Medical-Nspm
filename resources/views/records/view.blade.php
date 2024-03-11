@extends('layout')

@section('content')

<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-5">
        <div style="display:flex; align-items:center;justify-content:space-between; margin-bottom:40px;">
            <a href="javascript:history.go(-1);" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i>
            </a>
            <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    Patient's Profile
                </button>

            </div>



        </div>
        @unless (count($records) === 0)
                <div class="preview__grid">
                    @foreach ($records as $record)
                    <div class="card" style="position: relative">
                        <div class="card-body">
                          <p class="card-text preview__text">

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
                            <hr>
                            <div><b>Flag</b> : <span>{{ $record->patient->name }} </span></div>
                            <hr>
                            <div>
                                <b>Test count </b> : <span>
                                @php
                                $tests = json_decode($record->tests);
                                $numberOfTests = is_array($tests) ? count($tests) : 0;
                                echo $numberOfTests;
                                 @endphp
                            </span>
                        </div>
                            <hr>
                            <div><b>Processed By</b> : <span>{{ $record->processing_by }} </span></div>
                            <div><b>Last Updated</b>: <span>
                                {{ $record->updated_at->format('F j, Y, g:i a') }}
                            </span></div>
                          </p>
                        </div>


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
                          
    
                      
                      
                        @include('partials._infomodal')
                        </div>
                      
    
                      @else
    
                      <div class="alert alert-danger">
                        Not Yet Initiated
                      </div>
    
                      @endif
                    </div>

                      </div>
                    
  
                    @endforeach
                  


            @endunless
    </div>
    @include('partials._modal')
</div>

@endsection
