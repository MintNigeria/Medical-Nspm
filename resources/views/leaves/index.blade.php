@extends('layout')


@section('content')
<body>
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content px-5 py-5">
        <div
          class="font-weight-bold"
          style="
            display: flex;
            align-items: center;
            justify-content: space-between;
          "
        >
          <h4 class="header-title">Leave[s]</h4>
          @include('partials._searchleaves')

          <div>
            <a href="/leaves/create" class="btn bg-color">Create New LEAVE</a>

            @if (auth()->user()->role === "medic-admin")
            <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>
            @endif

          </div>

        </div>
        @include('partials._message')

        <div class="">
        <!-- <a class="archive" href="/leaves/archive">View Archived Posts</a> ({{ $archives->count() }}) -->

          <table class="table table-striped table-bordered mt-4" id="myTable">
            <thead class="table-color">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Staff ID </th>
                <th scope="col">Comment</th>
                <th scope="col">No Of Days</th>
                <th scope="col">Published Date</th>
                <th scope="col">Updated Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            @unless (count($leaves) === 0)
            <tbody>
              @php
                function calculateWorkingDays($startDay, $endDay) {
                  $start = \Carbon\Carbon::parse($startDay);
                  $end = \Carbon\Carbon::parse($endDay);

                  $workingDays = 0;

                  while ($start <= $end) {
                      if ($start->isWeekday()) {
                          $workingDays++;
                      }

                      $start->addDay();
                  }

                  return $workingDays;
              }


              @endphp

                @foreach ($leaves as  $leave)

                    <tr>
                    <td>
                        @if($leave->approved)
                            <i class="fas fa-snowflake text-success"></i>   
                         @else
                            <i class="fas fa-snowflake text-danger"></i>   
                         @endif
                            {{ $leave->patient->name }}
                        </td>
                        <td>{{ $leave->patient->staff_id }}</td>
                        <td>{{ Str::limit($leave->comment, $limit = 30, $end="...") }}</td>
                        <td>
                            {{calculateWorkingDays($leave->start_day, $leave->end_day)  }}
                        </td>

                        <td class="text-capitalize">{{ $leave->created_at->format('F j, Y  h:i') }} </td>
                        <td class="text-capitalize">{{ $leave->updated_at->format('F j, Y  h:i') }} </td>
                        <td style="display: flex; align-items:center;justify-content:space-evenly;">

                            @if (auth()->user()->role === "medic-admin")

                            <a href="leaves/{{ $leave->id }}/receipt">
                                <i class="fa-solid fa-receipt text-danger"></i>
                            </a>
                            @endif


                            @if(!$leave->approved || auth()->user()->role == "medic-admin")
                                <a type="button" data-mdb-toggle="modal" data-mdb-target="#leaveModal{{ $leave->id }}">
                                    <i class="fa-solid fa-edit text-success"></i>
                                </a>
                              @endif

                            @include('partials._modalleave')



                        </td>
                    </tr>
                @endforeach
            </tbody>
            @else
            <tbody>
            <tr colspan="4">
                <td>No SICK Leaves Recorded</td>
            </tr>
            </tbody>

            @endunless

          </table>
          {{ $leaves->links() }}
        </div>
    </div>
</div>

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
        link.setAttribute("download", "sickleave.csv");
        link.click();
    }
    </script>

</body >

@endsection
