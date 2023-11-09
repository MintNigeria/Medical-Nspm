<!-- Modal -->
<div class="modal fade text-uppercase" id="userModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Staff ID</label>
                    <input type="text" name="staff_id" id="" class="form-control text-uppercase" value="{{ $user->staff_id }}">
                    @error('staff_id')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" id="" value="{{ $user->email }}">
                    @error('email')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-1">
                    <label class="mt-4">Role</label>
                    <select name="role" class="form-control text-uppercase">
                        <option value="" >Choose ...</option>
                        <option value="nurse" @if ($user->role === "nurse")
                            selected
                        @endif>Nurse</option>
                        <option value="doctor" @if($user->role === "doctor")
                            selected
                        @endif>Doctor</option>
                        <option value="pharmacy" @if($user->role === "pharmacy")
                            selected
                        @endif>Pharmacy</option>
                        <option value="him" @if($user->role === "him")
                            selected
                        @endif>HIM Officer</option>
                    </select>
                    @error('role')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group mt-1">
                    <label class="mt-4">Define Locality</label>
                    <select name="locality" class="form-control text-uppercase">
                        <option value="">Choose ...</option>
                        <option value="lag"  @if($user->locality === "lag")
                            selected
                        @endif>Lagos</option>
                        <option value="abj"  @if($user->locality === "abj")
                            selected
                        @endif>Abuja</option>
                    </select>
                    @error('locality')
                    <p class="text-danger  text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
        </form>
            </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade text-uppercase" id="eyeuserModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <h4>{{ $user->name }}</h4>
                </div>

                <div class="form-group mt-3">
                    <label>Staff ID</label>
                    <h4>{{ $user->staff_id }}</h4>

                </div>

                <div class="form-group mt-3">
                    <label>Email Address</label>
                    <h4>{{ $user->email }}</h4>

                </div>

                <div class="form-group mt-1">
                    <label class="mt-4">Role</label>
                    <h4>{{ $user->role }}</h4>

                  </div>


                  <div class="form-group mt-1">
                    <label class="mt-4">Define Locality</label>
                    <h4>{{ $user->locality }}</h4>

                  </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                </div>
        </form>
            </div>
    </div>
  </div>
