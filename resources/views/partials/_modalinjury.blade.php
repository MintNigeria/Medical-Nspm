<!-- Modal -->
<div class="modal fade text-uppercase" id="injuryModal{{$injury->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">{{$injury->patient->staff_id}} : Injury</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/injuries/{{ $injury->id }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="modal-body">
                  {{-- Staff ID  --}}
                    <div class="form-group">
                      <label>Staff ID</label>
                      <br>
                      <select class="form-control" searchable="Search Here .." data-filter="true" name="patient_id">
                          <option value="">Choose ...</option>
                          @unless (count($patients) === 0)
                              @foreach ($patients as $patient)
                                  <option value="{{ $patient->id }}" @if($injury->patient_id === $patient->id) selected @endif>{{ $patient->staff_id }}</option>
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
                          placeholder="Example: Broke Her Leg" value="{{ $injury->date_accident_death}}"
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
                          placeholder="Example: Broke Her Leg" value="{{$injury->time_accident_death}}"
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
                          placeholder="Example: FACTORY " value=""
                          id=""
                        >{{$injury->location_accident}}</textarea>
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
                          placeholder="Example: BROKE HER LEG " value=""
                          id=""
                        >{{$injury->description_accident}}</textarea>
                        @error('description_accident')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                    <hr  class="text-black"/>
                       <div class="form-group">
                          <label class="mt-3">Severity of Accident: </label>
                          <select class="form-control" name="severity">
                            <option value=""> Choose ...</option>
                            <option value="mild" @if($injury->severity === "mild")selected @endif> Mild</option>
                            <option value="severe" @if($injury->severity === "severe")selected @endif> Severe</option>
                            <option value="fatal" @if($injury->severity === "fatal")selected @endif>Fatal</option>
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
                          placeholder="Example: Poor " value=""
                          id=""
                        >{{$injury->treatment}}</textarea>
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
                          placeholder="" value=""
                          id=""
                        >{{$injury->death_cause}}</textarea>
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
                          placeholder="Example: Poor " value=""
                          id=""
                        >{{$injury->health_status }}</textarea>
                        @error('health_status')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Days Absent from Work</label>
                        <input class="form-control"  name="days_absent" type="number" value="{{ $injury->days_absent }}" />
                        @error('days_absent')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                       <div class="form-group">
                        <label class="mt-3">Disability</label>
                        <textarea class="form-control"  name="disability" type="text" value="">{{ $injury->disability }}</textarea>
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
                          placeholder="" value="{{$injury->cost_total}}"
                          id=""
                        />
                        @error('cost_total')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="modal-footer">
                          <button  class="mt-5 btn btn-success">
                          Update INJURY 
                        </button>
                    </div>

                      

                      </div>
                    </div>
                  </div>
            </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade text-uppercase" id="eyeinjuryModal{{$injury->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">{{$injury->patient->staff_id}} : Injury</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-3">Injury [Type] </label>
                            <h4>{{$injury->injury}}
                            </h4>

                        </div>
                        <div class="form-group">
                            <label class="mt-3">Treatment</label>
                            <h4>{{ $injury->treatment }}</h4>
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Medication</label>
                                <h4>{{ $injury->medications }}</h4>
                            </div>

                            <div class="form-group">
                                <label class="mt-3">Cost Total</label>
                                <h4>{{$injury->cost_total}}</h4>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    </div>
        </form>
            </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade text-uppercase" id="injuryInsuranceModal{{$injury->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">INSURANCE ASSESMENT DOCTOR</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/injuries/{{ $injury->id }}/insurance" method="POST">
                @csrf
                @method('PUT')
                    <div class="modal-body">
                  {{-- Staff ID  --}}
                    <div class="form-group">
                      <label>INSURANCE ASSESMENT DOCTOR</label>
                      <input class="form-control" value="{{ $injury->insurance_doctor }}" type="text" name="insurance_doctor" placeholder="Enter Insurance Doctor" />
                       @error('insurance_doctor')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div> 

                    <div class="form-group mt-4">
                      <label>INSURANCE ASSESMENT DATE</label>
                      <input class="form-control" value="{{ $injury->insurance_date }}" type="date" name="insurance_date" placeholder="Enter Insurance Doctor" />
                       @error('insurance_date')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div> 
                      <div class="modal-footer">
                          <button  class="mt-5 btn btn-success">
                           INCLUDE IN INJURY
                        </button>
                    </div>

                      

                      </div>
                    </div>
                  </div>
            </div>
    </div>
  </div>