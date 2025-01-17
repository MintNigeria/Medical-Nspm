@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="container-record">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header header">
                      RECORD MEDICAL LEAVE
                    </div>
                    <div class="card-body">
                <form method="POST" action="/leaves">
                    @csrf
                <div>

                      <div class="form-group">
                        <label class="mt-3">No of Days</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="no_of_days"
                          placeholder="EXample: 2 " value="{{old('no_of_days')}}"
                          id=""
                        />
                        @error('no_of_days')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">Doctor's Comment</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="comment"
                          id=""
                          placeholder="Please Fill in Reasons for Days Off"
                        ></textarea>
                        @error('comment')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>


                        <button  class="mt-5 btn btn-gold header">
                          RECORD MEDICAL LEAVE
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
