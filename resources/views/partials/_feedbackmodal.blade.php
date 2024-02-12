

    <!-- Modal -->
    <div class="modal fade text-uppercase" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-black-50" id="exampleModalLabel" >NEW ALLERGY {{ $patient->name }}</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/feedbacks">
                    @csrf
                <div>
                      <div class="form-group">
                        <label class="my-3">Feedback Type</label>
                        <select  class="js-example-basic-single text-uppercase form-control" searchable="Search here.." name="patient_id">
                            <option value="">Choose ...</option>
                            <option value="">Lab Results</option>
                            <option value="">Doctor(s) Observation</option>
                        </select>
                        @error('feedback_type')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>SELECT CLINIC</label><br />
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
                        <label><h4 class="text-secondary text-capitalize">Observation</h4></label>
                        <textarea type="text" name="observation" value="{{ old('observation') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->observation}}
                        </textarea>
                        @error('observation')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label><h4 class="text-secondary text-capitalize">Detected Illness</h4></label>
                        <textarea type="text" name="detected_illness" value="{{ old('detected_illness') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->detected_illness}}
                        </textarea>
                        @error('detected_illness')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label><h4 class="text-secondary text-capitalize">Consultation</h4></label>
                        <textarea type="text" name="consultation" value="{{ old('consultation') }}"  class="form-control text-uppercase mt-2" id="">
                            {{$record->consultation}}
                        </textarea>
                        @error('consultation')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <label><h4 class="text-secondary text-capitalize">Next Steps</h4></label>
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
          </div>
        </div>
