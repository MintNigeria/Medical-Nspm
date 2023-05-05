@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="container">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header header">
                      ADD RECEIPT 4 {{ $record->patient->name }}
                    </div>
                    <div class="card-body">
                <form method="POST" action="/receipts/{{ $record->id }}">
                    @csrf
                <div>
                    <div class="form-group mt-2">
                        <label>IS DEPENDENT </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"name="is_dependent" value=true />
                            <label class="form-check-label" for="flexRadioDefault1"> YES, is Dependent</label>
                        </div>

                        <div class="form-check ">
                            <input class="form-check-input" type="radio"name="is_dependent" value=false  />
                            <label class="form-check-label" for="flexRadioDefault1"> No, It's Not </label>
                        </div>

                    </div>

                      <div class="form-group mt-4">
                        <label>Prescription</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="prescription"
                          value="{{old('prescription')}}"
                          id=""
                        ></textarea>
                        @error('prescription')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group mt-2">
                        <label>Cost (In Naira)</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="cost"
                          value="{{old('cost')}}"
                          id=""
                        />
                        @error('cost')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                        <button  class="mt-5 btn btn-gold header">
                          SAVE Receipt
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
