@extends('layout')


@section('content')

<body>
    <div class="dashboard reports">
        @include('partials._sidebar')
        <div class="content p-4">
            <!--  Introduction -->
            <div id="content__overflow">
              <div class="flex-div">
                {{-- <h6 class="font-weight-light">Hi, You Have 2 Notifications</h6> --}}
                {{-- <button class="btn btn-outline-secondary">
                  View All Records {{ auth()->user()->role }}
                </button> --}}
              </div>

              <div class="mt-3">
                <h2 class="font-weight-bold text-black-50">
                    Dashboard
                </h2>
              </div>



            <div class="card mt-3" >
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
                    Open Records
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
                    Users
                  </a>
                </li>
              </ul>
              <!-- Tabs navs -->

              <!-- Tabs content -->
              <div class="tab-content" id="ex1-content p-5">
                <div
                  class="tab-pane fade show active p-2"
                  id="ex1-tabs-1"
                  role="tabpanel"
                  aria-labelledby="ex1-tab-1"
                >
                <div class="flex-div">
                    <table  class="table table-striped table-bordered tabel m-5 pb-16" id="myTable">
                        <thead class="table-color">
                            <th>Staff ID</th>
                            <th>Blood Pressure</th>
                            <th>Current Temp(Celcius)</th>
                            <th>Pulse rate</th>
                            <th>BMI</th>
                            <th>Actions</th>
                        </thead>
                        @unless (count($records) === 0)
                        <tbody>
                            @foreach ($records as  $record)

                                <tr>
                                    <td>{{ $record->patient->staff_id }}</td>
                                    <td @if ($record->blood_pressure_systolic > 140 || $record->blood_pressure_diastolic > 100)
                                        class="text-danger"
                                    @endif>{{ $record->blood_pressure_systolic }}/{{ $record->blood_pressure_diastolic }}</td>
                                    <td>{{ $record->temp }} Cel</td>
                                    <td> {{ $record->pulse_rate }}</td>
                                    <td>  {{ round($record->bmi, 4 )}} Kg/m2 </td>
                                    <td style="display: flex; align-items:center;justify-content:space-evenly;">

                                        <a type="button" data-mdb-toggle="modal" data-mdb-target="#recordModal{{ $record->id }}">
                                            <i class="fa-solid fa-eye text-success"></i>
                                        </a>
                                        @include('partials._infomodal')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                        <tr colspan="6">
                            <td class="text-center text-capitalize">No Records Recorded</td>
                        </tr>
                        </tbody>

                        @endunless
                    </table>
                    {{ $records->links() }}
                  </div>
                </div>

                <div
                  class="tab-pane fade"
                  id="ex1-tabs-3"
                  role="tabpanel"
                  aria-labelledby="ex1-tab-3"
                >
                  <div class="flex-div">
                    <table  class="table table-striped table-bordered tabel m-5 pb-16" id="myTable">
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

                                        <a type="button" data-mdb-toggle="modal" data-mdb-target="#eyeuserModal{{ $user->id }}">
                                            <i class="fa-solid fa-eye text-success"></i>
                                        </a>
                                        @include('partials._modalusers')


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
              <!-- Tabs content -->
            </div>
         
         {{--  --}}
          </div>

    </div>
</body>


<script>
  $(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>


@endsection
