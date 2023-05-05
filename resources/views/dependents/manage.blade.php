@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-5">
            @unless (count($dependents) === 0)

            @foreach ($dependents as $dependent)

            <div class="card p-4 m-3 font-weight-bold" style="color: teal
            ">
            <p> [Staff ID    -{{ $dependent->patient->staff_id }}]</p>
            <p> [DEPENDENT'S NAME    -{{ $dependent->name }}]</p>
            <hr>
            {{ $dependent->prescription }}


            <div style="display: flex;align-items:center;margin-top:20px;">

                @if ($dependent->flag === '')
                <form method="POST" action="/dependents/{{$dependent->id}}/flag_success">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary m-1">SERVICED</button>
                 </form>

                      <form method="POST" action="/dependents/{{$dependent->id}}/flag_nt_stock">
                          @csrf
                        @method('PUT')
                        <button class="btn btn-primary m-1">NOT-IN-STOCK</button>
                  </form>
                  @endif

            </div>
            </div>


            @endforeach
            @else
            NO dependentS FOUND
            @endunless
        </div>
</body>

@endsection
