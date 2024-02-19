<!-- Modal -->
<div class="modal fade text-uppercase" id="patientModal{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Product Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/patient/{{ $patient->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                @csrf
                <div>
                      <div class="form-group">
                        <label>Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Example: John Doe" value="{{$patient->name}}"
                          id=""
                        />
                        @error('name')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">STAFF ID </label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="staff_id"
                          placeholder="Example: OB/1010" value="{{$patient->staff_id }}"
                          id=""
                        />
                        @error('staff_id')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Contact [Phone No]</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="contact"
                          placeholder="Example: 090 000 32 732" value="{{$patient->contact}}"
                          id=""
                        />
                        @error('contact')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Email Address</label>
                        <input
                          type="email"
                          class="form-control text-uppercase"
                          name="email"
                          placeholder="" value="{{$patient->email}}"
                          id=""
                        />
                        @error('email')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group mt-4">
                        <label>Department</label><br />
                        <select class="text-uppercase form-control" searchable="Search here.." name="department">
                            <option value="" @if(empty($patient->department)) selected @endif>Choose ...</option>
                            <option value="ICT" @if($patient->department == 'ICT') selected @endif>ICT</option>
                            <option value="HUMAN RESOURCES" @if($patient->department == 'HUMAN RESOURCES') selected @endif>HUMAN RESOURCES</option>
                            <option value="FINANCE" @if($patient->department == 'FINANCE') selected @endif>FINANCE</option>
                            <option value="AUDIT" @if($patient->department == 'AUDIT') selected @endif>AUDIT</option>
                            <option value="RISK" @if($patient->department == 'RISK') selected @endif>RISK</option>
                            <option value="STRATEGY" @if($patient->department == 'STRATEGY') selected @endif>STRATEGY</option>
                            <option value="SALES & MARKETING" @if($patient->department == 'SALES & MARKETING') selected @endif>SALES & MARKETING.</option>
                            <option value="PROCUREMENT" @if($patient->department == 'PROCUREMENT') selected @endif>PROCUREMENT</option>
                            <option value="SECURITY" @if($patient->department == 'SECURITY') selected @endif>SECURITY</option>
                            <option value="COPORATE COMMUNICATIONS" @if($patient->department == 'COPORATE COMMUNICATIONS') selected @endif>COPORATE COMMUNICATIONS</option>
                            <option value="INSPECTORATE" @if($patient->department == 'INSPECTORATE') selected @endif>INSPECTORATE</option>
                            <option value="MEDICAL" @if($patient->department == 'MEDICAL') selected @endif>MEDICAL</option>
                            <option value="EPMO" @if($patient->department == 'EPMO') selected @endif>EPMO</option>
                            <option value="PRODUCTION" @if($patient->department == 'PRODUCTION') selected @endif>PRODUCTION</option>
                            <option value="MANUFACTURING" @if($patient->department == 'MANUFACTURING') selected @endif>MANUFACTURING</option>
                            <option value="ADMIN" @if($patient->department == 'ADMIN') selected @endif>ADMIN</option>
                            <option value="LEGAL" @if($patient->department == 'LEGAL') selected @endif>LEGAL</option>
                            <option value="SD" @if($patient->department == 'SD') selected @endif>SD</option>
                        </select>
                        @error('department')
                        <p class="text-danger text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                      <div class="form-group">
                        <label class="mt-4">Home Address</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="address"
                          id=""

                        >{{$patient->address}}</textarea>
                        @error('address')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">Enter Dependencies (If Any) </label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="dependencies"
                          value="{{old('dependencies')}}"
                          id=""
                          placeholder="Seperate Dependencies wit a comma Example: SARAH LYNN, JAMES DOE, TREY PARKER,"
                        >{{$patient->dependencies}}</textarea>
                        @error('dependencies')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>



                      <div class="form-group">
                        <label class="mt-4"> Height</label>
                        <input type="number" placeholder="Recorded in m2" class="form-control" name="height" value="{{$patient->height}}" id="">
                        @error('height')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      {{-- <div class="form-group">
                         <label class="mt-3">Birth Date </label>
                        <input
                          type="date"
                          class="form-control text-uppercase"
                          name="birth_date"
                          value="{{$patient->birth_date}}"
                          id=""
                        />
                        @error('birth_date')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div> --}}
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </div>
                </form>
            </div>
    </div>
  </div>



<!-- Modal -->
<div class="modal fade text-uppercase" id="patientDOBModal{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Update D.O.B</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/patient/{{ $patient->id }}/dob" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div>
                      <div class="form-group">
                         <label class="mt-3">Birth Date </label>
                        <input
                          type="date"
                          class="form-control text-uppercase"
                          name="birth_date"
                          value="{{$patient->birth_date}}"
                          id=""
                        />
                        @error('birth_date')
                        <p class="text-danger  mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                  </div>
                </form>
            </div>
    </div>
  </div>
