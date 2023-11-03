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
            <h4 class="header-title">User(s)</h4>
            @include('partials._searchusers')
            <div>
               <a href="/users/register" class="btn btn-color">Create New User</a>
               <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>
            </div>
          @include('partials._message')
          </div>

          <div>
            <table  class="table table-striped table-bordered tabel mt-4" id="myTable">
                <thead class="table-color">
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Locality</th>
                    <th>Actions</th>
                </thead>
                @unless (count($users) === 0)
                <tbody>
                    @foreach ($users as  $user)

                        <tr>
                            <td>{{ $user->staff_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td> {{ $user->role }}</td>
                            <td> {{ $user->locality }}</td>
                            <td style="display: flex; align-items:center;justify-content:space-evenly;">

                                <a type="button" data-mdb-toggle="modal" data-mdb-target="#userModal{{ $user->id }}">
                                    <i class="fa-solid fa-edit text-success"></i>
                                </a>
                                @include('partials._modalusers')

                                <form method="POST" action="/users/{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this User?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="6">
                    <td class="text-center text-capitalize">No Users Recorded</td>
                </tr>
                </tbody>

                @endunless
            </table>
            {{ $users->links() }}
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
            link.setAttribute("download", "users.csv");
            link.click();
        }
        </script>
</body>

@endsection
