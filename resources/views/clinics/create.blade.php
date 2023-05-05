@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-4">

        <div class="container">
            <div class="centered-div">
              <div class="card">
                <div class="card-header header_inverse">
                  ADD New Clinic
                </div>
                <div class="card-body">
            <form method="POST" action="/clinics/">
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
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="mt-3">tYPE</label>
                    <select name="type" class="form-select" id="" required>
                        <option value="">Choose ...</option>
                        <option value="eye">EYE CLINIC</option>
                        <option value="stomach">STOMACH CLINIC</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                    <button  class="mt-5 btn btn-gold header">
                      SAVE CLINIC
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

@include('partials._message')

@endsection
