@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="">
                <div class="">
                  <div class="card">
                    <div class="card-header bg-color text-white">
                      RECORD USERS
                    </div>
                    <div class="card-body">
                <form method="POST" action="/users/create">
                    @csrf
                <div>
                      <div class="form-group">
                        <label class="mt-3">User Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Example: James Smith" value="{{old('name')}}"
                          id=""
                        />
                        @error('name')
                        <p class="text-danger  text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Staff ID</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="staff_id"
                          placeholder="Example: 6068" value="{{old('staff_id')}}"
                          oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4)"
                          id=""
                        />
                        @error('staff_id')
                        <p class="text-danger  text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Email</label>
                        <input
                          type="email"
                          class="form-control"
                          name="email"
                          placeholder="Example: richey.okoh-michael@mintnigeria.com" value="{{old('email')}}"
                          id=""
                        />
                        @error('email')
                        <p class="text-danger  text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>


                      <div class="form-group">
                        <label class="mt-4">Define Role</label>
                        <select name="role" class="form-control text-uppercase">
                            <option value="">Choose ...</option>
                            <option value="nurse">Nurse</option>
                            <option value="doctor">Doctor</option>
                            <option value="pharmacy">Pharmacy</option>
                            <option value="pharmacy-admin">Pharmacy-Admin</option>
                            <option value="medic-admin">Medical Administrator</option>
                            <option value="him">HIM Officer</option>
                        </select>
                        @error('role')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">Define Locality</label>
                        <select name="locality" class="form-control text-uppercase">
                            <option value="">Choose ...</option>
                            <option value="lag">Lagos</option>
                            <option value="abj">Abuja</option>
                        </select>
                        @error('locality')
                        <p class="text-danger  text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>


                        <button type="submit"  class="mt-5 btn btn-success">
                          RECORD NEW USers
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
</body>

@endsection
