@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content p-4">
            <div style="display:flex">
                <div class="col-6">

                       <div class="card">
                            <div class="card-header header">
                              CREATE NEW RECORD
                            </div>
                            <div class="card-body">
                        <form method="POST" action="/dependent/{{ $patient->id }}">
                            @csrf
                        <div>
                            <div class="form-group">
                                <x-patient-dependency :dependentCsv="$patient->dependencies" />
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
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                              </div>


                              <div class="form-group">
                                <label class="mt-3">Pulse Rate</label>
                                <input
                                  type="number"
                                  class="form-control text-uppercase"
                                  name="bpm"
                                  placeholder="Measured in (BPM)" value="{{old('bpm')}}"
                                  id=""
                                />
                                @error('bpm')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label class="mt-3">Temperature </label>
                                <input
                                  type="number"
                                  class="form-control text-uppercase"
                                  name="temperature"
                                  placeholder="Measured in (temperature)" value="{{old('temperature')}}"
                                  id=""
                                />
                                @error('temperature')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
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
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                              </div>

                              @if (auth()->user()->roles === 'nurse')
                            <button  class="mt-5 btn btn-gold header">
                                                            CREATE NEW RECORD 4 DEPENDENT
                                                            </button>
                              @endif



                              </div>
                            </div>
                          </form>
                          </div>
                </div>

                <div class="col-6 p-2">
                    <h5 class="mx-2">Dependent's Records</h5>
                    @unless (count($dependents) === 0)
                    @foreach ($dependents as $dependent)
                    <div class="card my-1 {{ $dependent->status !== 'closed' ? 'bg-primary' : 'bg-success' }}">
                      <div class="my-1 p-2" style="display: flex;align-items:center; justify-content:space-between;">
                        <div class="text-white font-weight-bold">{{ $dependent->name }}</div>
                        @if (auth()->user()->roles === 'doctor')
                             <div>
                            <a href="/dependents/{{ $dependent->id }}/edit" class="btn btn-outline-" >
                            <i class="fas fa-eye"></i>
                        </a>
                        </div>
                        @endif


                    </div>
                    </div>

                    @endforeach
                    @else
                    <div class="alert-danger my-1 p-2">
                        No Records Found
                    </div>
                    @endunless

                </div>
            </div>
        </div>
    </div>
</body>

@endsection
