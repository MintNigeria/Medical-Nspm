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

