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
              <h4 class="header-title">Receipt[s]</h4>
              @include('partials._datereceipts')

              <div>
                <a href="/records/receipt" class="btn btn-color">Create New Receipt</a>
                 <button onclick="exportToCsv()" class="btn btn-outline-success">Export</button>
              </div>
              {{-- @include('partials._search') --}}
            </div>
            <div class="p-2">
              <table class="table table-striped table-bordered mt-4" id="myTable">
                <thead class="table-color">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Staff_ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Clinic / Lab</th>
                    <th scope="col">Is Dependent</th>
                    <th scope="col">Costing</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                @unless (count($receipts) === 0)
                <tbody>
                    @foreach ($receipts as  $receipt)
                        <tr>
                            <td>{{ $receipt->record->patient->name }}</td>
                            <td>{{ $receipt->record->patient->staff_id }}</td>
                            <td>{{ $receipt->record->patient->email }}</td>
                            <td>
                              @if ($receipt->record && $receipt->record->management)
                                  @foreach ($receipt->record->management as $management)
                                    @if($management->clinic)
                                      <p>Clinic</p>
                                     <p> {{ $management->clinic }} </p>
                                     @endif
                                     @if($management->labtest)
                                      <p>Labtest</p>
                                      <p>{{ $management->labtest }} </p>
                                      @endif
                                  @endforeach
                              @else
                                  No management records found
                              @endif
                          </td>
                            <td>{{ $receipt->is_dependent }}</td>
                            <td>N{{ number_format($receipt->cost) }}</td>
                            <td style="display: flex; align-items:center;justify-content:space-evenly">

                                <a type="button" class="text-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $receipt->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                 @include('partials._viewmodal')


                                  <form method="POST" action="/receipts/{{$receipt->id}}">
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
                    <td>No Receipt Recorded</td>
                </tr>
                </tbody>

                @endunless

              </table>
              {{-- {{ $receipts->links() }} --}}
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
            link.setAttribute("download", "receipts.csv");
            link.click();
        }
        </script>

</body>




@endsection
