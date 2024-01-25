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
                         ALLERGY
                    </div>
             <div class="card-body">
                <form method="POST" action="/allergies">
                    @csrf
                <div>
                      <div class="form-group">
                        <label class="my-3">Allegy Note</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="allergy"
                          placeholder="Take Note of Allergic Reaction" value="{{old('allergy')}}"
                          id=""
                        ></textarea>
                        @error('allergy')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                        <button  class="mt-5 btn btn-success">
                          Save Note
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
