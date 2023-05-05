@extends('layout')

@section('content')
<body>

<div class="dashboard">
    @include('partials._sidebar')
    <div class="content px-5 py-5">
        <div class="container-record">
            <div class="centered-div">
              <div class="card">
                <div class="card-header header_inverse">
                  CREATE NEW RECORD
                </div>
                <div class="card-body">
            <form method="POST" action="/record">
                @csrf
            <div>

                  <div class="form-group">
                    <label>Staff ID</label> <br />
                    <select  class=" js-example-basic-single text-uppercase form-control" searchable="Search here.." name="patient_id">
                        <option value="">Choose ...</option>

                        @unless (count($patients) === 0)
                        {{-- <input type="search" name="" id=""> --}}

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
                    <label class="mt-3">Blood Temperature</label>
                    <input
                      type="temp"
                      class="form-control text-uppercase"
                      name="temp"
                      placeholder="Measured in (Celcius)" value="{{old('temp')}}"
                      id=""
                    />
                    @error('temp')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-3">Blood Pressure </label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="blood_pressure"
                      placeholder="Measured in (mmHg)" value="{{old('blood_pressure')}}"
                      id=""
                    />
                    @error('blood_pressure')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label class="mt-3">Pulse Rate</label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="pulse_rate"
                      placeholder="Measured in (BPM)" value="{{old('pulse_rate')}}"
                      id=""
                    />
                    @error('pulse_rate')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-3">Weight</label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="weight"
                      placeholder="Measured in (Kg)" value="{{old('weight')}}"
                      id=""
                    />
                    @error('weight')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-4">Nurse Note</label>
                    <textarea
                      type="text"
                      class="form-control text-uppercase"
                      name="nurse_note"
                      id=""
                      placeholder="Please Fill in Patient's Observations(if Any)"
                    ></textarea>
                    @error('nurse_note')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                    <button  class="mt-5 btn btn-gold header">
                      CREATE NEW RECORD
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

<!-- Initialize the mdb-select component -->


</body>


@endsection


