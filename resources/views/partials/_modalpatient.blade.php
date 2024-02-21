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
                             <option value="Internal Audit & Compliance" @if($patient->department == "Internal Audit & Compliance")selected @endif>Internal Audit & Compliance</option>
                            <option value="Strategy" @if($patient->department == "Strategy")selected @endif>Strategy</option>
                            <option value="Planning"  @if($patient->department == "Planning")selected @endif>Planning</option>
                            <option value="CS/LA" @if($patient->department == "CS/LA")selected @endif>CS/LA</option>
                            <option value="Treasury"  @if($patient->department == "Treasury")selected @endif>Treasury</option>
                            <option value="Cost & Management"  @if($patient->department == "Cost & Management")selected @endif>Cost & Management</option>
                            <option value="ICT" @if($patient->department == "ICT")selected @endif>ICT</option>
                            <option value="Risk Management" @if($patient->department == "Risk Management")selected @endif>Risk Management</option>
                            <option value="Inspectorate"  @if($patient->department == "Inspectorate")selected @endif>Inspectorate</option>
                            <option value="Security"  @if($patient->department == "Security")selected @endif>Security</option>
                            <option value="Finance" @if($patient->department == "Finance")selected @endif>Finance</option>
                            <option value="Protocol & Transport" @if($patient->department == "Protocol & Transport")selected @endif>Protocol & Transport</option>
                            <option value="Coporate Communications"  @if($patient->department == "Coporate Communications")selected @endif>Coporate Communications</option>
                            <option value="Human Resources"  @if($patient->department == "Human Resources")selected @endif>Human Resources</option>
                            <option value="Medical Services"  @if($patient->department == "Medical Services")selected @endif>Medical Services</option>
                            <option value="EPMO"  @if($patient->department == "EPMO")selected @endif>EPMO</option>
                            <option value="Production"  @if($patient->department == "Production")selected @endif>Production</option>
                            <option value="Engineering"  @if($patient->department == "Engineering")selected @endif>Engineering</option>
                            <option value="Sales & Marketing"  @if($patient->department == "Sales & Marketing")selected @endif>Sales & Marketing</option>
                            <option value="SD Engineering"  @if($patient->department == "SD Engineering")selected @endif>SD - Engineering</option>
                            <option value="SD Production"  @if($patient->department == "SD Production")selected @endif>SD - Production</option>
                            <option value="R&D">R&D</option>
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
