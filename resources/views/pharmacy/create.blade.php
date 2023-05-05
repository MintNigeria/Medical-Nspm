@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content">

        <div class="p-5">
            <div class="centered-div">
              <div class="card">
                <div class="card-header header_inverse">
                  ADD New pharmaceutical
                </div>
                <div class="card-body">
            <form method="POST" action="/pharmacy/">
                @csrf
            <div>
                  <div class="form-group">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control text-uppercase"
                      name="name"
                      placeholder="Example: JOHN HOPSKINS HOSPITAL" value="{{old('name')}}"
                      id=""
                    />
                    @error('name')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="mt-3">Type</label>
                    <select id=""  class="form-select text-uppercase" name="type">
                        <option value="">Choose ...</option>
                        <option value="tablets">Tablets</option>
                        <option value="injections">Injections</option>
                        <option value="syrups">Syrups</option>
                    </select>
                    @error('type')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="mt-3">Packaging</label>
                    <select id=""  class="form-select text-uppercase" name="packaging">
                        <option value="">Choose ...</option>
                        <option value="BOXES">BOXES</option>
                        <option value="CARTONS">CARTONS</option>
                        <option value="NIL">NIL</option>
                    </select>

                    <div class="form-group">
                        <label class="mt-4"> NO OF UNITS</label>
                        <input type="number" name="no_of_units" class="form-control text-uppercase" />

                        @error('no_of_units')
                        <p class="text-danger text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="mt-4">DEFICIT COUNT <span class="text-sm" style="font-size: 13px;">(Notify When Deficit Number Hits)</span></label>
                        <input type="number" name="deficit_target" class="form-control text-uppercase" />
                    </div>

                    @error('deficit_target')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                    <button  class="mt-5 btn btn-gold header">
                      SAVE pharmaceutical
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
