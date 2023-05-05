@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content p-5">

            <h3>Pending Request[s]</h3>
            @unless (count($records) === 0)

            @foreach ($records as $record)

            <div class="card p-4 m-3 font-weight-bold" style="color: teal
            ">
            <p>Prescription [Staff ID    -{{ $record->patient->staff_id }}]</p>
            <hr>
            {{ $record->prescription }}


            <div style="display: flex;align-items:center;margin-top:20px;">

                @if ($record->flag !== '')
                <form method="POST" action="/record/{{$record->id}}/flag_success">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary m-1">SERVICED</button>
                     </form>

                      <form method="POST" action="/record/{{$record->id}}/flag_nt_stock">
                          @csrf
                        @method('PUT')
                        <button class="btn btn-primary m-1">NOT-IN-STOCK</button>
                  </form>
                  @endif

            </div>
            </div>


            @endforeach
            @else
            <div class="alert-primary mt-5 p-3" style="width: 100%;border-radius: 20px;">

                <h5 class="text-danger font-weight-bold">No Requests Pending</h5>

            </div>

            @endunless
        </div>
    </div>
</body>


@endsection
