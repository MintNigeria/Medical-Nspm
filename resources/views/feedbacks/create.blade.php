@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="">
                <div class="" id="content__overflow">
                  <div class="card">
                    <div class="card-header bg-color ">
                         Feedbacks
                    </div>
             <div class="card-body">
                <form method="POST" action="/feedbacks/{{ $record->id }}">
                    @csrf
                <div>
                      <div class="form-group">
                        <label class="my-3">Feedback Type</label>
                        <select  class="js-example-basic-single text-uppercase form-control" searchable="Search here.." name="feedback_type">
                            <option value="">Choose ...</option>
                            <option value="Lab_Result">Lab Results</option>
                            <option value="Doctor Observation">Doctor(s) Observation</option>
                        </select>
                        @error('feedback_type')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group mt-4">
                        <label>SELECT CLINIC LOCATION</label><br />
                        <select  class=" js-example-basic-single text-uppercase form-control" searchable="Search here.." name="clinic_location">
                            <option value="">Choose ...</option>
                            @unless (count($clinics) === 0)
                                @foreach ($clinics as $clinic)
                                    <option value="{{ $clinic->name }}" class="text-success" @if ($clinic->name == $record->clinic_location) selected @endif>{{ $clinic->name }}</option>
                                @endforeach
                            @endunless
                        </select>
                        @error('clinic_location')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>


                      <div class="form-group mt-4">
                        <label>SELECT CLINIC DOCTOR</label><br />
                        <input value="{{ old('clinic_doctor') }}" type="text" name="clinic_doctor" class="form-control text-uppercase mt-2" />
                        @error('clinic_doctor')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>



                      <div class="form-group mt-4">
                        <label>Observation</label>
                        <textarea type="text" name="observation" value="{{ old('observation') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->observation}}
                        </textarea>
                        @error('observation')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label>Detected Illness</label>
                        <textarea type="text" name="detected_illness" value="{{ old('detected_illness') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->detected_illness}}
                        </textarea>
                        @error('detected_illness')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label>Consultation</label>
                        <textarea type="text" name="consultation" value="{{ old('consultation') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->consultation}}
                        </textarea>
                        @error('consultation')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label>Next Steps</label>
                        <textarea type="text" name="next_action" value="{{ old('next_action') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->next_action}}
                        </textarea>
                        @error('next_action')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                        <button  class="mt-5 btn btn-success">
                          Save
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
