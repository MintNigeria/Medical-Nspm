@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div id="content__overflow">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4 class="header-title"> OPEN RECORDS</h4>
        {{-- @include('partials._searchoprecord') --}}
        <a href="/records/queue" class="btn btn-primary" >
            <i class="fas fa-hourglass"></i>
        </a>

        </div>


        <div style="display:grid; grid-template-columns: auto auto auto auto;margin:20px 0;" >
            @unless (count($records) === 0)
            @foreach ($records as $record)
                  <div class="card p-4 mt-5 mx-3 font-weight-bold" style="color: teal;padding:10px;
                  ">
                @if ($record->processing_by)
                    <div class="alert alert-primary">
                        Initiated: {{ $record->processing_by }}
                    </div>
                @else
                <div class="alert alert-warning">
                   Not Yet Initiated
                </div>
                @endif
                  <p> NAME : {{$record->patient->name  }}</p>
                  <p> STAFF ID : {{$record->patient->staff_id  }}</p>
                </div>
            @endforeach

            @endunless

        <div class="mt-1 p-1">
            {{ $records->links() }}
        </div>
        </div>
    </div>
</div>

@endsection
