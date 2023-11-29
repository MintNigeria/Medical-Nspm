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
              <h4 class="header-title">Injuries Record</h4>
              @include('partials._searchinjury')
              <a href="/injuries/create" class="btn bg-color">Record New Injury</a>
              <a class="btn btn-outline-success" onclick="exportToCsv()">Export</a>

            </div>
          @include('partials._message')

            <div class="p-2">
        <a class="archive" href="/injuries/archive">View Archived Posts</a> ({{ $archives->count() }})

              <table class="table table-striped table-bordered mt-4">
                <thead class="table-color">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Staff ID </th>
                    <th scope="col">Injury</th>
                    <th scope="col">Treatment</th>
                    <th scope="col">Cost Total</th>

                    <th>Actions</th>
                  </tr>
                </thead>
                @unless (count($injuries) === 0)
                <tbody>
                    @foreach ($injuries as  $injury)
                        <tr>
                            <td>{{ $injury->patient->name }}</td>
                            <td>{{ $injury->patient->staff_id }}</td>
                            <td>{{ $injury->injury }}</td>
                            <td>{{ $injury->treatment }}</td>
                            <td class="text-uppercase">N {{ number_format($injury->cost_total, 0, '.', ',') }}</td>
                            <td style="display: flex; align-items:center;justify-content:space-evenly;">

                                <a type="button" data-mdb-toggle="modal" data-mdb-target="#injuryModal{{ $injury->id }}">
                                    <i class="fa-solid fa-edit text-success"></i>
                                </a>
                                @include('partials._modalinjury')

                                <form method="POST" action="/injuries/{{$injury->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this Item?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>

                              {{-- @include('partials._injurymodal') --}}

                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="4">
                    <td>No Injury Data found</td>
                </tr>
                </tbody>

                @endunless

              </table>
              {{ $injuries->links() }}
            </div>
        </div>
    </div>
    </div>
</body>

@endsection
