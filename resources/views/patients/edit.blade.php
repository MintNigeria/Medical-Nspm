@extends('layout')


@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 py-5">
            <div class="container">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header header">
                       EDIT Patient DATA {{ $patient->staff_id }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/patient/{{$patient->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                <div>

                      <div class="form-group">
                        <label>Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Example: John Doe" value="{{ $patient->name }}"
                          id=""
                        />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">STAFF ID </label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="staff_id"
                          placeholder="Example: 1010" value="{{ $patient->staff_id }}"
                          id=""
                        />
                        @error('staff_id')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Contact [Phone No]</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="contact"
                          placeholder="Example: 090 000 32 732" value="{{ $patient->contact }}"
                          id=""
                        />
                        @error('contact')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">Home Address</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="address"
                          id=""
                        >{{ $patient->address }}</textarea>
                        @error('address')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">User Dependecies</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="address"
                          id=""
                        >{{ $patient->dependencies }}</textarea>
                        @error('address')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                         <label class="mt-3">Birth Date </label>
                        <input
                          type="date"
                          class="form-control text-uppercase"
                          name="birth_date"
                          id=""
                          value="{{ $patient->birth_date }}"
                        />
                        @error('birth_date')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>




                        <button type="submit"  class="mt-5 btn btn-gold header">
                          EDIT Patient's DATA
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
    </div>

</body>

@endsection
