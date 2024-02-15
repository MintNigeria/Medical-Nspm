@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content p-5">

            <h3>Pending Request[s]</h3>
            @unless (count($records) === 0)
            <div class="preview__grid">
                @foreach ($records as $record)
                <div class="card">
                    <div class="card-body">

                        <p class="card-text preview__text">
                            <div><b>Patient Name</b> : <span>{{ $record->patient->name }} </span></div>
                            <div><b>Patient StaffId</b> : <span>{{ $record->patient->staff_id }} </span></div>
                            <div><b>Processed By</b> : <span>{{ $record->processing_by }} </span></div>
                            <div class="my-3">
                                    <x-prescription-list :drugs_mgmtCsv="$record->prescription" />
                            </div>
                      </p>

                      <div class="d-flex justify-between">
                        <form method="POST" action="/record/{{$record->id}}/flag_prescription">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-secondary" onclick="return confirm('Are you sure you want to check this as done? ')">
                                <i class="fas fa-plus text-secondary"></i>
                            </button>
                        </form>
                        <form method="POST" action="/record/{{$record->id}}/flag_prescription_fail">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to check this as not done? ')">
                                <i class="fas fa-minus text-danger"></i>
                            </button>
                        </form>

                     </div>
                    </div>
                  </div>
                @endforeach
            </div>

        @else
            <div class="alert-primary mt-5 p-3" style="width: 100%;border-radius: 20px;">
                <h5 class="text-danger font-weight-bold">No Requests Pending</h5>
            </div>
        @endunless
        </div>
    </div>
</body>


@endsection



