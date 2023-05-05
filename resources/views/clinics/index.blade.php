@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-2 py-5">
    @include('partials._message')

            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
              <h4>Clinics [s] Data</h4>
              <div>
                <a href="/clinics/create" class="btn btn-gold header">Create New Clinic</a>
              <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>
              </div>

            </div>
            <div class="p-2 mt-2">
              <table class="table table-striped table-bordered mt-4" id="myTable">
                <thead class="header_inverse">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Type </th>
                    <th>Actions</th>
                  </tr>
                </thead>
                @unless (count($clinics) === 0)
                <tbody>
                    @foreach ($clinics as  $clinic)
                        <tr>
                            <td>{{ $clinic->name }}</td>
                            <td>{{ $clinic->type }}</td>
                            <td style="display:flex; align-items:center; justify-content:space-evenly">
                                <form method="POST" action="/clinic/{{$clinic->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-gold header"><i class="fa-solid fa-trash"></i> Delete</button>
                                  </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="4">
                    <td>No Clinic Data found</td>
                </tr>
                </tbody>

                @endunless

              </table>
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
            link.setAttribute("download", "clinics.csv");
            link.click();
        }
        </script>


</body>



@endsection
