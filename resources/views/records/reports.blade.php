 @extends('layout')

@section('content')

<body>
<div class="dashboard">
@include('partials._sidebar')
<div class="content p-3">
<div style="display: flex; align-items:center; justify-content:space-between;">
<h4>Reports</h4>
 @include('partials._reportsdate')
</div>

<!-- Tabs navs -->
  <ul
    class="nav nav-tabs mb-3"
    style="
        display: flex;
        align-items: flex-start;
        flex-direction: row;
        justify-content: flex-start;
    "
    id="ex1"
    role="tablist"
    >
    <li class="nav-item" role="presentation">
        <a
        class="nav-link active"
        id="ex1-tab-1"
        data-mdb-toggle="tab"
        href="#ex1-tabs-1"
        role="tab"
        aria-controls="ex1-tabs-1"
        aria-selected="true"
        >
        Sick Leaves
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a
        class="nav-link"
        id="ex1-tab-2"
        data-mdb-toggle="tab"
        href="#ex1-tabs-2"
        role="tab"
        aria-controls="ex1-tabs-2"
        aria-selected="false"
        >
        Patient Visits 
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a
        class="nav-link"
        id="ex1-tab-3"
        data-mdb-toggle="tab"
        href="#ex1-tabs-3"
        role="tab"
        aria-controls="ex1-tabs-3"
        aria-selected="false"
        >
        Injury Stats
        </a>
    </li>
    </ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex1-content">
  <div
    class="tab-pane fade show active"
    id="ex1-tabs-1"
    role="tabpanel"
    aria-labelledby="ex1-tab-1"
  >
    <a class="btn btn-outline-success" style="float:right" onclick="exportSickLeaveDataToCsv()">Export</a>
  {{-- Leaves Statistics --}}
   <table class="table table-striped table-bordered tabel my-5 pb-16" id="mySickLeaveTable">
          <thead class="table-color">
            <th>Staff ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>No of Days</th>
        </thead>
         @unless (count($leaves) === 0)
        <tbody>
            @foreach ($leaves as  $leave)
                <tr>
                    <td>{{ $leave->patient->staff_id }}</td>
                    <td>{{ $leave->patient->name }}</td>
                    <td>{{ $leave->patient->department }}</td>
                    <td>{{ $leave->start_day }}</td>
                    <td>{{ $leave->end_day }}</td>
                    <td>
                         {{ \Carbon\Carbon::parse($leave->end_day)->diffInDays(\Carbon\Carbon::parse($leave->start_day)) }}
                    </td>
                </tr>
        </tbody>
        @endforeach
         @else
        <tbody>
        <tr colspan="6">
            <td class="text-center text-capitalize">No Sick Leave Recorded</td>
        </tr>
        </tbody>

        @endunless
    </table>
    {{ $leaves->links() }}
   </table>
  </div>
  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
    {{-- Records Visits Statistics --}}
    <a class="btn btn-outline-success" style="float:right" onclick="exportReferralDataToCsv()">Export</a>

     <table class="table table-striped table-bordered tabel my-5 pb-16" id="myReferralTable">
          <thead class="table-color">
            <th>Staff ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Status</th>
            {{-- <th>Nurse Care</th> --}}
            {{-- <th>Pharmacy</th> --}}
            {{-- <th>Referral</th>  --}}
        </thead>
         @unless (count($records) === 0)
        <tbody>
            @foreach ($records as  $record)
                <tr>
                    <td>{{ $record->patient->staff_id }}</td>
                    <td>{{ $record->patient->name }}</td>
                    <td>{{ $record->patient->department }}</td>
                    <td>{{ $record->status }}</td>
                    {{-- <td>{{ $record->patient->management }}</td/> --}}
                    {{-- <td>{{ $record->patient->department }}</td> --}}
                    {{-- <td>
                         {{ \Carbon\Carbon::parse($leave->end_day)->diffInDays(\Carbon\Carbon::parse($leave->start_day)) }}
                    </td> --}}
                </tr>
        </tbody>
        @endforeach
         @else
        <tbody>
        <tr colspan="6">
            <td class="text-center text-capitalize">No New Data Recorded</td>
        </tr>
        </tbody>

        @endunless
    </table>
    {{ $records->links() }}
   </table>

  </div>
  <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
     {{-- Injury Visits Statistics --}}
    <a class="btn btn-outline-success" style="float:right" onclick="exportInjuryDataToCsv()">Export</a>

     <table class="table table-striped table-bordered tabel my-5 pb-16" id="myInjuryTable">
          <thead class="table-color">
            <th>Staff ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Location of Accident</th>
            <th>Severity</th>
            <th>Attending Doctor</th>
        </thead>
         @unless (count($injuries) === 0)
        <tbody>
            @foreach ($injuries as  $injury)
                <tr>
                    <td>{{ $injury->patient->staff_id }}</td>
                    <td>{{ $injury->patient->name }}</td>
                    <td>{{ $injury->patient->department }}</td>
                    <td>{{ $injury->location_accident }}</td>
                    <td>{{ $injury->severity }}</td>
                    <td>{{ $injury->attending_doctor }}</td>
                </tr>
        </tbody>
        @endforeach
         @else
        <tbody>
        <tr colspan="6">
            <td class="text-center text-capitalize">No Injury Data Recorded</td>
        </tr>
        </tbody>

        @endunless
    </table>
    {{ $injuries->links() }}
   </table>
  </div>
</div>


</div>
</body>


<script>
    function exportSickLeaveDataToCsv() {
        // Get the table element
        var table = document.getElementById("mySickLeaveTable");

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
        link.setAttribute("download", "sickleave.csv");
        link.click();
    }
    </script>
    <script>
    function exportReferralDataToCsv() {
        // Get the table element
        var table = document.getElementById("myReferralTable");

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
        link.setAttribute("download", "records.csv");
        link.click();
    }
    </script>
    <script>
    function exportInjuryDataToCsv() {
        // Get the table element
        var table = document.getElementById("myInjuryTable");

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
        link.setAttribute("download", "injurydata.csv");
        link.click();
    }
    </script>

@endsection

