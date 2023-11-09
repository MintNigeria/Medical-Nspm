@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
              <h4 class="header-title">Archives ({{ $inventories->count() }})</h4>
              @include('partials._searchinventory')
              <div>
                 <a href="/inventory/create" class="btn btn-color">Create Inventory</a>
              <button onclick="exportToCsv()" class="btn btn-outline-success">Export XLS</button>
              </div>
            </div>
            @include('partials._message')
            <div>
        <a class="archive" href="/inventory/">View  Posts</a>

              <table class="table table-striped table-bordered mt-4" id="myTable">
                <thead class="table-color">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Product Type </th>
                    <th scope="col">Packaging</th>
                    <th scope="col">No Of Units Available</th>
                    <th scope="col">Location</th>
                    <th scope="col">Archive</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                @unless (count($inventories) === 0)
                <tbody>
                    @foreach ($inventories as  $inventory)
                        <tr>
                            <td>{{ $inventory->name }}</td>
                            <td>{{ $inventory->type }}</td>
                            <td>{{ $inventory->packaging }}</td>
                            <td class="{{ $inventory->no_of_units > $inventory->unit_deficit   ? 'text-success':  'text-danger'}}" >{{ $inventory->no_of_units }}</td>
                            <td>{{ $inventory->location }}</td>
                            <td>{{ $inventory->deleted_at->format('F j, Y  h:i')}}</td>
                            <td style="display:flex; align-items:center; justify-content:space-evenly">
                                <a type="button" data-mdb-toggle="modal" data-mdb-target="#eyeinventoryModal{{ $inventory->id }}">
                                    <i class="fa-solid fa-eye text-success"></i>
                                </a>

                                @include('partials._modalinventory')

                                <form method="POST" action="/inventory/{{$inventory->id}}/restore">
                                    @csrf

                                    <button class="btn btn-success" onclick="return confirm('Are you sure you want to Restore this Item?')">
                                        <i class="fas fa-trash-restore text-white"></i>
                                    </button>
                                </form>

                                  <form method="POST" action="/inventory/{{$inventory->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to permanetly delete this Item?')">
                                        <i class="fas fa-trash text-white"></i>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="4">
                    <td>No Inventory Data found</td>
                </tr>
                </tbody>

                @endunless

              </table>
            </div>
        </div>
    </div>
</body>

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
    link.setAttribute("download", "inventory.csv");
    link.click();
}
</script>

@endsection