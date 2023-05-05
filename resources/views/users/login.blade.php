@extends('layout')

@section('content')

<body class="body-img">
    <div class="log-div p-3">
      <p>Welcome To</p>
      <h3>NSPM MEDICAL</h3>
      <p class="mt-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam,
        laboriosam!
      </p>

      <form method="POST" action="/users" style="width:100%;" >
        @csrf
        <div class="form-group text-uppercase">
            <label>Staff ID</label>
            <input
              type="number"
              class="form-control"
              placeholder="Enter Your Staff No Here"
              name="staff_id"
              id=""
            />
            <label class="mt-4">Password</label>
            <input
              type="password"
              class="form-control"
              placeholder="Enter Your Password"
              name="password"
              id=""
            />
            <button type="submit"  class="btn btn-lg mt-5 text-white"
            style="background-color: blueviolet; width: 100%;">
              LOGIN
            </button>
          </div>
    </form>

    </div>
    <div class="log-img">
      <h1 class="text-white text-uppercase font-weight-bold">
        Welcome TO NSPM Medical
      </h1>
      <p class="text-white">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, iusto.
      </p>
    </div>
  </body>

@endsection


