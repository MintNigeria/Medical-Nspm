@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        {{-- <div style="float:right;">
            <a class="btn header m-2" href="/injuries">View All Injuries</a>
          </div> --}}
        <div class="content p-4">
            <div class="" id="content__overflow">
                <div class="">
                  <div class="card">
                    <div class="card-header bg-color ">
                      RECORD INJURY CASES
                    </div>
                    <div class="card-body">
                <form method="POST" action="/injuries">
                    @csrf
                <div>
                  {{-- Staff ID  --}}
                    <div class="form-group">
                      <label>Staff ID</label>
                      <br>
                      <select class="js-example-basic-single form-control" id="mySelect" searchable="Search Here .." data-filter="true" name="patient_id">
                          <option value="">Choose ...</option>
                          @unless (count($patients) === 0)
                              @foreach ($patients as $patient)
                                  <option value="{{ $patient->id }}">{{ $patient->staff_id }}</option>
                              @endforeach
                          @endunless
                      </select>
                      @error('patient_id')
                      <p class="text-danger text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
                    {{--Accident Information  --}}
                      <div class="form-group">
                        <label class="mt-3">Date of Accident / Death: </label>
                        <input
                          type="date"
                          class="form-control text-uppercase"
                          name="date_accident_death"
                          placeholder="Example: Broke Her Leg" value="{{old('date_accident_death')}}"
                          id=""
                        />
                        @error('date_accident_death')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label class="mt-3">Time of Accident / Death: </label>
                        <input
                          type="time"
                          class="form-control text-uppercase"
                          name="time_accident_death"
                          placeholder="Example: Broke Her Leg" value="{{old('time_accident_death')}}"
                          id=""
                        />
                        @error('time_accident_death')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Location of Accident: </label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="location_accident"
                          placeholder="Example: FACTORY " value="{{old('location_accident')}}"
                          id=""
                        ></textarea>
                        @error('location_accident')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      
                      <div class="form-group">
                        <label class="mt-3">Description of Accident: </label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="description_accident"
                          placeholder="Example: BROKE HER LEG " value="{{old('description_accident')}}"
                          id=""
                        ></textarea>
                        @error('description_accident')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                    <hr  class="text-black"/>
                       <div class="form-group">
                          <label class="mt-3">Severity of Accident: </label>
                          <select class="form-control" id="mySelect" name="severity">
                            <option value=""> Choose ...</option>
                            <option value="mild"> Mild</option>
                            <option value="severe"> Severe</option>
                            <option value="fatal">Fatal</option>
                          </select>
                          @error('severity')
                          <p class="text-danger text-xs mt-1">{{$message}}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Treatment : Seperate the List with a comma</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="treatment"
                          placeholder="Example: Poor " value="{{old('treatment')}}"
                          id=""
                        ></textarea>
                        @error('treatment')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Cause of Death</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="death_cause"
                          placeholder="" value="{{old('death_cause')}}"
                          id=""
                        ></textarea>
                        @error('death_cause')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                       <div class="form-group">
                        <label class="mt-3">Premorbid Health Status</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="health_status"
                          placeholder="Example: Poor " value="{{old('health_status')}}"
                          id=""
                        ></textarea>
                        @error('health_status')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Days Absent from Work</label>
                        <input class="form-control"  name="days_absent" type="number" value="{{ old("days_absent") }}" />
                        @error('days_absent')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                       <div class="form-group">
                        <label class="mt-3">Disability</label>
                        <textarea class="form-control"  name="disability" type="text" value="{{ old("disability") }}"></textarea>
                        @error('disability')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                          
                      <div class="form-group">
                        <label class="mt-3">Cost Total</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="cost_total"
                          placeholder="" value="{{old('cost_total')}}"
                          id=""
                        />
                        @error('cost_total')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                        <button  class="mt-5 btn btn-success">
                          CREATE INJURY RECORD
                        </button>

                      </div>
                    </div>
                  </div>
                </form>

                      <div class="card-footer"></div>

                  </div>


                </div>



              </div>




            </div>
    </div>
</body>

@endsection
