@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4>Management
                {{-- @if(auth()->user()->locality === "abj") --}}
                 {{-- {{ $notifications->count() }}
                @elseif(auth()->user()->locality === "lag")
                 {{ $notificationslag->count() }}

                @endif --}}
                </h4>
        @include('partials._searchoprecord')
        </div>

        {{-- <div style="display:grid; grid-template-columns: auto auto auto auto"> --}}
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
                                <x-patient-nurse :nurse_mgmtCsv="$record->management" />
                        </div>




                      </p>
                      <div class="d-flex justify-between">
                        <form method="POST" action="/record/{{$record->id}}/flag_nurse">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-secondary" onclick="return confirm('Are you sure you want to check this as done? ')">
                                <i class="fas fa-plus text-secondary"></i>
                            </button>
                        </form>
                        <form method="POST" action="/record/{{$record->id}}/flag_nurse_fail">
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

        <div class="alert alert-danger mt-5 ">
            No Requests
        </div>

        @endunless



            {{-- <x-patient-nurse :nurse_mgmtCsv="$record->management" />
                <p></p>


                <form method="POST" action="/record/{{$record->id}}/flag_success">
                  @csrf
                  @method('PUT')
                  <button class="btn btn-success mt-1">Intiate Process Close</button>
               </form> --}}




        <div class="mt-1 p-1">
            {{ $records->links() }}
        </div>
    </div>
</div>

@endsection
