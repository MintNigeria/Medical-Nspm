@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div id="content__overflow">
            <div
                class="font-weight-bold"
                style="
                display: flex;
                align-items: center;
                justify-content: space-between;
                "
            >
            <h4 class="header-title">Activity Log(s)</h4>
            </div>

            <table  class="table table-striped table-bordered tabel my-5 pb-16" id="myTable">
                <thead class="table-color">
                    <th>Action</th>
                    <th>Performed By</th>
                    <th>Performed On</th>
                    <th>Properties</th>
                    {{-- <th>Locality</th> --}}
                    <th>Date</th>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td>{{ $log->description }}</td>
                        <td>{{ $log->causer ? $log->causer->name : 'Null' }}</td>
                        <td>{{ $log->subject_type ? $log->subject_type : 'Null' }}</td>
                        <td>{{ $log->properties }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                @endforeach

                </tbody>
            </div>
        
    </div>
</body>
