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
                          <option value="Intaglio Print" @if($patient->department == "Intaglio Print") selected @endif>Intaglio Print</option>
                          <option value="New Line" @if($patient->department == "New Line") selected @endif>New Line</option>
                          <option value="Quality Control" @if($patient->department == "Quality Control") selected @endif>Quality Control</option>
                          <option value="BankNote Finishing" @if($patient->department == "BankNote Finishing") selected @endif>BankNote Finishing</option>
                          <option value="Pre-Press" @if($patient->department == "Pre-Press") selected @endif>Pre-Press</option>
                          <option value="BankNote Design" @if($patient->department == "BankNote Design") selected @endif>BankNote Design</option>
                          <option value="Litho" @if($patient->department == "Litho") selected @endif>Litho</option>
                          <option value="Numbering" @if($patient->department == "Numbering") selected @endif>Numbering</option>
                          <option value="Engineering Services" @if($patient->department == "Engineering Services") selected @endif>Engineering Services</option>
                          <option value="Health Safety & Enviroment" @if($patient->department == "Health Safety & Enviroment") selected @endif>Health Safety & Enviroment</option>
                          <option value="Spy Police" @if($patient->department == "Spy Police") selected @endif>Spy Police</option>
                          <option value="Comissioners" @if($patient->department == "Comissioners") selected @endif>Comissioners</option>
                          <option value="SDD Core Press" @if($patient->department == "SDD Core Press") selected @endif>SDD Core Press</option>
                          <option value="SDD Finishing" @if($patient->department == "SDD Finishing") selected @endif>SDD Finishing</option>
                          <option value="Cheque Finishing" @if($patient->department == "Cheque Finishing") selected @endif>Cheque Finishing</option>
                          <option value="Exam Type Setting" @if($patient->department == "Exam Type Setting") selected @endif>Exam Type Setting</option>
                          <option value="Adhoc" @if($patient->department == "Adhoc") selected @endif>Adhoc</option>
                          <option value="NYSC" @if($patient->department == "NYSC") selected @endif>NYSC</option>
                          <option value="Contracts" @if($patient->department == "Contracts") selected @endif>Contracts</option>
                          <option value="Locum" @if($patient->department == "Locum") selected @endif>Locum</option>
                          <option value="Security" @if($patient->department == "Security") selected @endif>Security</option>
                          <option value="Admin Services" @if($patient->department == "Admin Services") selected @endif>Admin Services</option>
                          <option value="Procurement" @if($patient->department == "Procurement") selected @endif>Procurement</option>
                          <option value="Internal Audit & Compliance" @if($patient->department == "Internal Audit & Compliance") selected @endif>Internal Audit & Compliance</option>
                          <option value="Strategy" @if($patient->department == "Strategy") selected @endif>Strategy</option>
                          <option value="Planning" @if($patient->department == "Planning") selected @endif>Planning</option>
                          <option value="CS/LA" @if($patient->department == "CS/LA") selected @endif>CS/LA</option>
                          <option value="Treasury" @if($patient->department == "Treasury") selected @endif>Treasury</option>
                          <option value="Cost & Management" @if($patient->department == "Cost & Management") selected @endif>Cost & Management</option>
                          <option value="ICT" @if($patient->department == "ICT") selected @endif>ICT</option>
                          <option value="Risk Management" @if($patient->department == "Risk Management") selected @endif>Risk Management</option>
                          <option value="Inspectorate" @if($patient->department == "Inspectorate") selected @endif>Inspectorate</option>
                          <option value="Finance" @if($patient->department == "Finance") selected @endif>Finance</option>
                          <option value="Protocol & Transport" @if($patient->department == "Protocol & Transport") selected @endif>Protocol & Transport</option>
                          <option value="Coporate Communications" @if($patient->department == "Coporate Communications") selected @endif>Coporate Communications</option>
                          <option value="Human Resources" @if($patient->department == "Human Resources") selected @endif>Human Resources</option>
                          <option value="Medical Services" @if($patient->department == "Medical Services") selected @endif>Medical Services</option>
                          <option value="EPMO" @if($patient->department == "EPMO") selected @endif>EPMO</option>
                          <option value="Sales & Marketing" @if($patient->department == "Sales & Marketing") selected @endif>Sales & Marketing</option>
                          <option value="SD Engineering" @if($patient->department == "SD Engineering") selected @endif>SD Engineering</option>
                          <option value="SD Production" @if($patient->department == "SD Production") selected @endif>SD Production</option>
                          <option value="R&D" @if($patient->department == "R&D") selected @endif>R&D</option>
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
                      <div class="form-group mt-1">
                        <label class="mt-4">Define location</label>
                        <select name="location" class="form-control text-uppercase">
                            <option value="">Choose ...</option>
                            <option value="lag"  @if($patient->location === "lag")
                                selected
                            @endif>Lagos</option>
                            <option value="abj"  @if($patient->location === "abj")
                                selected
                            @endif>Abuja</option>
                        </select>
                        @error('location')
                        <p class="text-danger  text-xs mt-1">{{$message}}</p>
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
