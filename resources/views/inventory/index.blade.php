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
              <h4 class="header-title">Inventory  Data
                <a type="button" data-mdb-toggle="modal" data-mdb-target="#modalNotify">
                </a>
                </h4>


              @include('partials._searchinventory')
           
              <div>
                 @if(auth()->user()->role === "pharmacy-admin" || auth()->user()->role === "medic-admin")
                 <a href="/inventory/create" class="btn btn-color">Create Inventory</a>
                @endif
              <button onclick="exportToCsv()" class="btn btn-outline-success">Export XLS</button>
              </div>
            </div>
            @include('partials._message')
            <div>
        {{-- <a class="archive" href="/inventory/archive">View Archived Posts</a> ({{ $archives->count() }}) () --}}

              <table class="table table-striped table-bordered mt-4" id="myTable">
                <thead class="table-color">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Product Type </th>
                    <th scope="col">Group </th>
                    <th scope="col">Packaging</th>
                    <th scope="col">No Of Units Available</th>
                    <th scope="col">Location</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                @unless (count($inventories) === 0)
                <tbody>
                    @foreach ($inventories as  $inventory)
                        <tr>
                            <td>{{ $inventory->name }}</td>
                            <td>{{ $inventory->type }}</td>
                            <td>{{ $inventory->grouping }}</td>
                            <td>{{ $inventory->packaging }}</td>
                            <td class="{{ $inventory->no_of_units > $inventory->unit_deficit   ? 'text-success':  'text-danger'}}" >{{ $inventory->no_of_units }}</td>
                            <td>{{ $inventory->location }}</td>
                            <td style="display:flex; align-items:center; justify-content:space-evenly">
                                 @if(auth()->user()->user_type === "pharmacy-admin")
                                <a type="button" data-mdb-toggle="modal" data-mdb-target="#inventoryModal{{ $inventory->id }}">
                                    <i class="fa-solid fa-edit text-success"></i>
                                </a>
                                @endif
                                 <a type="button" data-mdb-toggle="modal" data-mdb-target="#inventoryDispenseModal{{ $inventory->id }}">
                                    <i class="fa-solid fa-minus text-success"></i>
                                </a>

                                @include('partials._modalinventory')

                                <form method="POST" action="/inventory/{{$inventory->id}}/increment">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn" onclick="return confirm('Are you sure you want to increase count for this Item?')"><i class="fa-solid fa-plus"></i></button>
                                  </form>

                                <form method="POST" action="/inventory/{{$inventory->id}}/reduce">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn" onclick="return confirm('Are you sure you want to reduce count for this Item?')"><i class="fa-solid fa-minus"></i></button>
                                  </form>

                                  @if (auth()->user()->role === "pharmacy-admin")

                                  <form method="POST" action="/inventory/{{$inventory->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this Item?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                                  @endif



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
