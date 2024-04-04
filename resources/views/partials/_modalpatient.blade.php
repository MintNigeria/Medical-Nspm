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
                          <label class="mt-3">Prefix</label>
                          <select class="text-uppercase form-control" searchable="Search here.." name="prefix">
                            <option value="">Choose ...</option>
                            <option value="ABV" @if($patient->prefix == "ABV") selected @endif>ADHOC, NYSC, COMMS, LOCUM - ABV</option>

                            <option value="INT" @if($patient->prefix == "INT") selected @endif>Intaglio Print - INT</option>
                            <option value="NWL" @if($patient->prefix == "NWL") selected @endif>NewLine - NWL</option>
                            <option value="QC" @if($patient->prefix == "QC") selected @endif>Quality Control - QC</option>
                            <option value="BF" @if($patient->prefix == "BF") selected @endif>Bank Note Design - BF</option>
                            <option value="INT" @if($patient->prefix == "INT") selected @endif>Pre Press - PP</option>
                            <option value="BDE" @if($patient->prefix == "BDE") selected @endif>BankNote Design - BDE</option>
                            <option value="NOG" @if($patient->prefix == "NOG") selected @endif>Numbering - NOG</option>
                            <option value="ENG" @if($patient->prefix == "ENG") selected @endif>Engineering Services - ENG</option>
                            <option value="HSE" @if($patient->prefix == "HSE") selected @endif>Health Safety & Enviroment - HSE</option>
                            <option value="SC" @if($patient->prefix == "SC") selected @endif>SECURITY AND ACCESS CONTROL - SC</option>
                            <option value="OB" @if($patient->prefix == "OB") selected @endif>Office Block - OB</option>
                            <option value="M" @if($patient->prefix == "M") selected @endif>Manager & Above - M</option>
                            <option value="FA" @if($patient->prefix == "FA") selected @endif>Factory Audit - FA</option>
                            <option value="SPY" @if($patient->prefix == "SPY") selected @endif>SPY POLICE - SPY</option>
                            <option value="SPY" @if($patient->prefix == "SPY") selected @endif>COMMISIONERS - COMM</option>
                            <option value="SFD" @if($patient->prefix == "SFD") selected @endif>BANK NOTE FINISHING (LAGOS) - SFD</option>
                            <option value="SHE" @if($patient->prefix == "SHE") selected @endif>QUALITY CONTROL - SHE</option>
                            <option value="SPD" @if($patient->prefix == "SPD") selected @endif>SDD CORE PRESS - SPD</option>
                            <option value="SPF" @if($patient->prefix == "SPF") selected @endif>SDD FINISHING - SDF</option>
                            <option value="SDE" @if($patient->prefix == "SDE") selected @endif>SDD DESIGN - SDD</option>
                            <option value="CHQ" @if($patient->prefix == "CHQ") selected @endif>CHEQUE FINISHING - CHQ</option>
                            <option value="ETS" @if($patient->prefix == "ETS") selected @endif>EXAM TYPE SETTING - ETS</option>
                        </select>
                        
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
                          <option value="Engineering Services" @if($patient->department == "Engineering Services") selected @endif>Engineering Services</option>
                          <option value="Health Safety & Enviroment" @if($patient->department == "Health Safety & Enviroment") selected @endif>Health Safety & Enviroment</option>
                          <option value="Spy Police" @if($patient->department == "Spy Police") selected @endif>Spy Police</option>
                          <option value="Comissioners" @if($patient->department == "Comissioners") selected @endif>Comissioners</option>
                          <option value="Adhoc" @if($patient->department == "Adhoc") selected @endif>Adhoc</option>
                          <option value="NYSC" @if($patient->department == "NYSC") selected @endif>NYSC</option>
                          <option value="Contracts" @if($patient->department == "Contracts") selected @endif>Contracts</option>
                          <option value="Locum" @if($patient->department == "Locum") selected @endif>Locum</option>
                          <option value="Security" @if($patient->department == "Security") selected @endif>Security</option>
                          <option value="Admin Services" @if($patient->department == "Admin Services") selected @endif>Admin Services</option>
                          <option value="Procurement" @if($patient->department == "Procurement") selected @endif>Procurement</option>
                          <option value="Internal Audit & Compliance" @if($patient->department == "Internal Audit & Compliance") selected @endif>Internal Audit & Compliance</option>
                          <option value="Risk & Strategy" @if($patient->department == "Risk & Strategy") selected @endif>Risk & Strategy</option>
                          <option value="Planning" @if($patient->department == "Planning") selected @endif>Planning</option>
                          <option value="CS/LA" @if($patient->department == "CS/LA") selected @endif>CS/LA</option>
                          <option value="Cost & Management" @if($patient->department == "Cost & Management") selected @endif>Cost & Management</option>
                          <option value="ICT" @if($patient->department == "ICT") selected @endif>ICT</option>
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
