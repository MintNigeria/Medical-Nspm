@extends('layout')


@section('content')

<body>
    <div class="dashboard reports">
        @include('partials._sidebar')
        <div class="content p-3">
            <!--  Introduction -->
            <div>
              <div class="flex-div">
                <h6 class="font-weight-light">Hi, You Have 2 Notifications</h6>
                <button class="btn btn-outline-secondary">
                  View All Records {{ auth()->user()->role }}
                </button>
              </div>

              <div class="mt-3">
                <h2>
                    Dashboard
                </h2>
              </div>

              <div class="flex-div mt-5">
                <div class="card card_style">
                  <div>
                    <i class="fa fa-users header_inverse"></i>
                  </div>

                  <p>
                    Users
                  </p>
                </div>
                <div class="card card_style">
                  <div>
                    <i class="fa fa-notes-medical header_inverse"></i>
                  </div>

                  <p>
                    Records
                  </p>
                </div>
                <div class="card card_style">
                  <div>
                    <i class="fas fa-crutch header_inverse"></i>
                  </div>

                  <p>
                    Injury Cases
                  </p>
                </div>
                <div class="card card_style">
                  <div>
                    <i class="fas fa-kit-medical header_inverse"></i>
                  </div>

                  <p>
                    Inventory
                  </p>
                </div>
              </div>
            </div>

            <div class="card mt-3" style="min-height: 400px;">
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
                    Medical Reports
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
                    Sick Leaves
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
                    Audit Log
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
                    <div style="flex: 2; padding: 10px;" class="card">
                      <canvas id="myChart" height="500"></canvas>
                    </div>

                    {{-- <div class="card"></div> --}}


                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="ex1-tabs-2"
                  role="tabpanel"
                  aria-labelledby="ex1-tab-2"
                >
                  <div class="flex-div">
                    <table
                      class="table table-responsive align-middle"
                      style="flex: 1;"
                    >
                      <thead class="header">
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="ex1-tabs-3"
                  role="tabpanel"
                  aria-labelledby="ex1-tab-3"
                >
                  <div class="flex-div">
                    <table
                      class="table table-responsive align-middle"
                      style="flex: 1;"
                    >
                      <thead class="header">
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>1</td>
                          <td>1</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Tabs content -->
            </div>
          </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('myChart')

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [
            {
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1,
            },
            {
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1,
            },
            {
              label: '# of Votes',
              data: [5, 29, 13, 15, 7, 7],
              type: 'line',
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            x: {
              grid: {
                display: false,
              },
            },
            y: {
              grid: {
                display: false,
              },
            },
          },
        },
      })
    </script>
</body>

@endsection
