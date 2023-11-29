@extends('layout')

@section('content')
<body>
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content px-5 py-5">
        <div id="content__overflow">
        <div
          class="font-weight-bold"
          style="
            display: flex;
            align-items: center;
            justify-content: space-between;
          "
        >
          <h4 class="header-title">Group[s]</h4>
          @include('partials._searchleaves')

          <div>
            <a href="/grouping/create" class="btn bg-color">Create New Grouping</a>
            <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>
          </div>

        </div>
        @include('partials._message')

        <div class="">
        <a class="archive" href="/leaves/archive">View Archived Post</a> ({{ $archives->count() }})

          <table class="table table-striped table-bordered mt-4" id="myTable">
            <thead class="table-color">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Published Date</th>
                <th scope="col">Updated Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            @unless (count($groups) === 0)
            <tbody>
                @foreach ($groups as  $group)
                    <tr>
                        <td>{{ $group->name}}</td>
                        <td class="text-capitalize">{{ $group->created_at->format('F j, Y  h:i') }} </td>
                        <td class="text-capitalize">{{ $group->updated_at->format('F j, Y  h:i') }} </td>
                        <td style="display: flex; align-items:center;justify-content:space-evenly;">

                            <a type="button" data-mdb-toggle="modal" data-mdb-target="#groupModal{{ $group->id }}">
                                <i class="fa-solid fa-edit text-success"></i>
                            </a>
                            @include('partials._groupmodal')

                            <form method="POST" action="/group/{{$group->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this Item?')">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @else
            <tbody>
            <tr colspan="4">
                <td>No Group Recorded</td>
            </tr>
            </tbody>

            @endunless

          </table>
          {{ $groups->links() }}
        </div>
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
