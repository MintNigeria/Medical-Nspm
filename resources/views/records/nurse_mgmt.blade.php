@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4>Management</h4>
        @include('partials._searchoprecord')
        </div>

        <div style="display:grid; grid-template-columns: auto auto auto auto">
            @unless (count($records) === 0)
            @foreach ($records as $record)

                  <div class="card p-4 mt-5 mx-3 font-weight-bold" style="color: teal;padding:10px;
                  ">

                  <p class="text-primary"> Staff_Id : {{$record->patient->staff_id  }}</p>
                  <p class="mb-2 text-primary font-weight-bold"> Management</p>
                  <x-patient-nurse :nurse_mgmtCsv="$record->management" />
                  <p></p>


                  <form method="POST" action="/record/{{$record->id}}/flag_success">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-gold header mt-1">Intiate Process Close</button>
                 </form>


                </div>
            @endforeach

            @else
            <div class="alert-primary mt-5 p-3" style="width: 100%;border-radius: 20px;">

                <h5 class="text-danger font-weight-bold">No Record awaiting Management </h5>

            </div>

            @endunless





        <div class="mt-1 p-1">
            {{-- {{ $record->links() }} --}}
        </div>
    </div>
</div>

@endsection
