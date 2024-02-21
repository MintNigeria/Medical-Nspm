@extends('layout')

@section('content')

<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-1">
            @include('partials._message')
            <div class="centered-div p-5" id="content__overflow">
              <div class="card">
                <div class="card-header bg-color text-white">
                  ADD New Patient
                </div>
                <div class="card-body">
            <form method="POST" action="/patient">
                @csrf
            <div>
                  <div class="form-group">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control text-uppercase"
                      name="name"
                      placeholder="Example: John Doe" value="{{old('name')}}"
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
                      placeholder="Example: 1010" value="{{old('staff_id')}}"
                      {{-- oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)" --}}
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
                      placeholder="Example: 090 000 32 732" value="{{old('contact')}}"
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
                      placeholder="" value="{{old('email')}}"
                      id=""
                    />
                    @error('email')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group mt-4">
                    <label>Department</label><br />
                    <select  class="js-example-basic-single text-uppercase form-control" searchable="Search here.." name="department">
                        <option value="">Choose ...</option>
                        <option value="Internal Audit & Compliance">Internal Audit & Compliance</option>
                        <option value="Strategy">Strategy</option>
                        <option value="Planning">Planning</option>
                        <option value="CS/LA">CS/LA</option>
                        <option value="Treasury">Treasury</option>
                        <option value="Cost & Management">Cost & Management</option>
                        <option value="ICT">ICT</option>
                        <option value="Risk Management">Risk Management</option>
                        <option value="Inspectorate">Inspectorate</option>
                        <option value="Security">Security</option>
                        <option value="Finance">Finance</option>
                        <option value="Security">Security</option>
                        <option value="Protocol & Transport">Protocol & Transport</option>
                        <option value="Coporate Communications">Coporate Communications</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Medical Services">Medical Services</option>
                        <option value="EPMO">EPMO</option>
                        <option value="Production">Production</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Sales & Marketing">Sales & Marketing</option>
                        <option value="SD - Engineering">SD - Engineering</option>
                        <option value="SD - Production">SD - Production</option>
                        <option value="R&D">R&D</option>
                    </select>
                    @error('department')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label class="mt-4">Home Address</label>
                    <textarea
                      type="text"
                      class="form-control text-uppercase"
                      name="address"
                      id=""
                      value="{{old('address')}}"
                    ></textarea>
                    @error('address')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-4"> Height</label>
                    <input type="number" placeholder="Recorded in m2" class="form-control" name="height" value="{{ old('height') }}" id="">
                    @error('height')
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
                    ></textarea>
                    @error('dependencies')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  .

                  <div class="form-group">
                     <label class="mt-3">Birth Date </label>
                    <input
                      type="date"
                      class="form-control text-uppercase"
                      name="birth_date"
                      id=""
                    />
                    @error('birth_date')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                  </div>




                    <button  class="mt-5 btn btn-success">
                      CREATE patient
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

@endsection
