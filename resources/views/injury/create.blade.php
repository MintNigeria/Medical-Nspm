@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="container-record">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header header_inverse ">
                      RECORD INJURY CASES
                    </div>
                    <div class="card-body">
                <form method="POST" action="/injuries">
                    @csrf
                <div>
                      <div class="form-group">
                        <label>Staff ID</label>
                        <br>
                        <select class="js-example-basic-single form-control" searchable="Search Here .." data-filter="true" name="patient_id">
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


                      <div class="form-group">
                        <label class="mt-3">Injury [Type] </label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="injury"
                          placeholder="Example: Broke Her Leg" value="{{old('injury')}}"
                          id=""
                        ></textarea>
                        @error('injury')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">Treatment</label>
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
                        <label class="mt-3">Medication</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="medications"
                          placeholder="" value="{{old('medications')}}"
                          id=""
                        ></textarea>
                        @error('medications')
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

                        <button  class="mt-5 btn btn-gold header">
                          CREATE INJURY RECORD
                        </button>

                      </div>
                    </div>
                  </div>
                </form>

                      <div class="card-footer"></div>

                  </div>


                </div>

                <div  style="position: absolute;right:0;">
                <a class="btn header m-2" href="/injuries">View All Injuries</a>
              </div>

              </div>




            </div>
    </div>
</body>

@endsection
