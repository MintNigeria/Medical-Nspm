@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="">
                <div class="">
                  <div class="card">
                    <div class="card-header bg-color ">
                      CREATE NEW GROUP
                    </div>
                    <div class="card-body">
                <form method="POST" action="/grouping">
                    @csrf
                <div>


                      <div class="form-group">
                        <label class="mt-3">Group Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Enter Name for Group Type" value="{{old('name')}}"
                          id=""
                        />
                        @error('name')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                        <button  class="mt-5 btn btn-success">
                          CREATE NEW GROUP
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
