@extends('layout')


@section('content')
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
        <h4 class="header-title">pharmaceutical(s)</h4>
        @include('partials._searchpharmacy')
        <div>
         <a href="/pharmacy/create" class="btn btn-color">Create</a>
         <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>
        </div>

      </div>
      @include('partials._message')
      <div>
        <a class="archive" href="/pharmacy/archive">View Archived Posts</a>
        <table  class="table table-striped table-bordered mt-4" id="myTable">
            <thead class="table-color">
                <th>NAME</th>
                <th>NO-OF-UNITS(CURRENTLY)</th>
                <th>TYPE</th>
                <th>PACKAGING</th>
                <th>Location</th>
                {{-- <th></th> --}}
                <th>Actions</th>
            </thead>
            @unless (count($pharmacies) === 0)
            <tbody>
                @foreach ($pharmacies as  $pharmacy)
                    <tr>
                        <td>{{ $pharmacy->name }}</td>
                        <td>{{ $pharmacy->no_of_units }}</td>
                        <td>{{ $pharmacy->type }}</td>
                        <td> {{ $pharmacy->packaging }}</td>
                        <td> {{ $pharmacy->location }}</td>
                        <td style="display: flex; align-items:center;justify-content:space-evenly">
                            <a type="button" data-mdb-toggle="modal" data-mdb-target="#pharmacyModal{{ $pharmacy->id }}">
                                <i class="fa-solid fa-edit text-success"></i>
                            </a>
                            @include('partials._modalpharmacy')
                           <form method="POST" action="/pharmacy/{{$pharmacy->id}}">
                               @csrf
                               @method('DELETE')
                               <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this Product?')"><i class="fa-solid fa-trash"></i></button>
                             </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            @else
            <tbody>
            <tr colspan="4">
                <td>No Pharmaceutical Recorded</td>
            </tr>
            </tbody>

            @endunless
        </table>
        {{ $pharmacies->links() }}
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
        link.setAttribute("download", "pharmacy.csv");
        link.click();
    }
    </script>

@endsection
