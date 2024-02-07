@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div>
                <div
                    class="font-weight-bold"
                    style="
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    "
                >
                    <h4 class="header-title">Reset Password</h4>

                </div>
                 @include('partials._message')
                 <div class="centered-div p-5" id="content__overflow">
                    <div class="card">
                      <div class="card-header bg-color text-white">
                        Password Reset
                      </div>
                      <div class="card-body">


      <form method="POST" action="/profile" >
        @csrf
            <div class="form-group">
                <label>Enter Old Password</label>
                <input type="password" class="form-control" name="current_password" id="" value="{{ old('current_password') }}">
                @error('current_password')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-4">
                <label>Enter New Password</label>
                <input class="form-control" type="password" name="password" id="" value="{{ old('password') }}">
                @error('password')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label>Confirm New Password</label>
                <input class="form-control" type="password" name="password_confirmation" id="" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <p class="text-danger  mt-1">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="form-control mt-5 btn btn-success">
                RESET PASSWORD
            </button>
      </form>
                    </div>
                </div>
            </body>
@endsection
