@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4 class="header-title"> OPEN RECORDS</h4>
        @include('partials._searchoprecord')
        </div>

        <div style="display:grid; grid-template-columns: auto auto auto auto">
            @unless (count($record) === 0)
            @foreach ($record as $record)

                  <div class="card p-4 mt-5 mx-3 font-weight-bold" style="color: teal;padding:10px;
                  ">
                  <i class="fas fa-info bg-success text-white"
                  style="font-size:10px;padding:10px; border-radius:5px;
                  position: absolute;right:0; cursor: pointer;margin-right: 10px;"></i>
                  <p> STAFF ID : {{$record->patient->staff_id  }}</p>
                  <p> RECORDED B/P : {{$record->blood_pressure  }}</p>
                  <p> RECORDED PULSE RATE : {{$record->pulse_rate }}</p>
                  <p> NURSE NOTE: {{Str::limit($record->nurse_note, 10, '...')  }}</p>
                  {{-- <p> NURSE NOTE: {{$record->service_type  }}</p> --}}


                  @if ($record->processing && $record->processing_by !== auth()->user()->name)
                    <button class="btn header " disabled>
                        Currently Being Processed
                    </button>

                @elseif ($record->processing && $record->processing_by === auth()->user()->name)
                    <a href="/records/{{ $record->id }}/edit" class="btn btn-success">
                        Revisit Record
                    </a>
                @else
                <form action="{{ route('records.updateStatusAndRedirect', ['id' => $record->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit"> Begin Process</button>
                </form>
                  @endif



                </div>
            @endforeach

            @endunless





        <div class="mt-1 p-1">
            {{-- {{ $record->links() }} --}}
        </div>
    </div>
</div>

@endsection
