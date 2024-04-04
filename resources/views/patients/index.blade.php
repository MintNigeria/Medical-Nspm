@extends('layout')

@section('content')

<body>

<div class="dashboard">
     @include('partials._sidebar')
<div class="content p-3">
    <div id="content__overflow">
    <div
        class="font-weight-bold"
        style="
        display: flex;
        align-items: center;
        justify-content: space-between;
        "
    >
        <h4 class="header-title">Patient(s)</h4>
        @include('partials._search')
        <div>
            <a href="/patient/create" class="btn bg-color">Create Patient </a>
            <a onclick="exportToCsv()" class="btn btn-outline-success">Export XLS</a>
            
        </div>
    
       
    </div>
    @include('partials._message')
    @if(auth()->user()->role == "super-admin" || auth()->user()->role == "medic-admin" )
    <div class="my-4" style="width: 50%;">
        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label" for="customFile">Large Import Order: Name, Prefix and  Staff ID </label>
            <input type="file" class="form-control" id="customFile" />
            <button type="submit" class="btn btn-primary mt-3" style="">Import</button>
        </form>
    </div>
    @endif

    <div class=" p-2 mt-4">
    {{-- <a class="archive" href="/patient/archive">View Archived Posts</a> ({{ $archives->count() }}) --}}

        <table class="table table-striped table-bordered mt-4" id="myTable">
        <thead class="table-color">
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Staff ID </th>
            <th scope="col">Department</th>
            {{-- <th scope="col">Height</th>
            <th scope="col">Birth Date</th> --}}
            <th>Actions</th>
            </tr>
        </thead>
        @unless (count($patients) === 0)
        <tbody>
            @foreach ($patients as  $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->prefix }}/{{ $patient->staff_id }}</td>
                    <td>{{ $patient->department }}</td>

                    <td style="display:flex; align-items:center; justify-content:space-evenly">
                        {{-- @if (auth()->user()->roles === 'him') --}}
                        <a type="button" data-mdb-toggle="modal" data-mdb-target="#patientModal{{ $patient->id }}">
                            <i class="fa-solid fa-edit text-success"></i>
                        </a>
                        @if(auth()->user()->user_type == "medic-admin")
                         <a type="button" data-mdb-toggle="modal" data-mdb-target="#patientDOBModal{{ $patient->id }}">
                            <i class="fa-solid fa-calendar text-success"></i>
                        </a>
                        @endif
                        @include('partials._modalpatient')

                         @if($patient->activate)

                            <form method="POST" action="/patient/{{$patient->id}}/activate">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-danger mx-1" onclick="return confirm('Are you sure you want to deactivate this Account?')">
                                    <i class="fas fa-flag text-danger"></i>
                                </button>
                            </form>

                            @else

                            <form method="POST" action="/patient/{{$patient->id}}/activate">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-outline-success mx-1" onclick="return confirm('Are you sure you want to activate this Account?')">
                                    <i class="fas fa-flag text-success"></i>
                                </button>
                            </form>

                            @endif



                        <a href="/dependents/{{ $patient->id }}/dependent" class="btn btn-outline-success disabled">
                            <i class="fas fa-heartbeat" style="cursor: pointer;color:teal"></i>
                            {{-- Dependents --}}
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
        @else
        <tbody>
        <tr colspan="4">
            <td>No Patient Data found</td>
        </tr>
        </tbody>

        @endunless


        </table>

        <div class="mt-5 p-1">
        {{ $patients->links() }}
        </div>


    </div>
</div>
</div>
</div>


{{--  --}}
<!-- Your JavaScript code -->
<script>
function exportToCsv() {
    // Get the table element
    var table = document.getElementById("myTable");

    // Create an empty string for the CSV data
    var csvData = "";

    // Loop through each row in the table
    for (var i = 0; i < table.rows.length; i++) {
        var rowData = [];

        // Loop through each column in the current row
        for (var j = 0; j < table.rows[i].cells.length; j++) {
            // Get the cell value and add it to the rowData array
            rowData.push(table.rows[i].cells[j].innerText);
        }

        // Join the rowData array into a comma-separated string and add it to the CSV data
        csvData += rowData.join(",") + "\n";
    }

    // Create a link to download the CSV file
    var link = document.createElement("a");
    link.setAttribute("href", "data:text/csv;charset=utf-8," + encodeURIComponent(csvData));
    link.setAttribute("download", "patient.csv");
    link.click();
}
</script>
</body>

@endsection

