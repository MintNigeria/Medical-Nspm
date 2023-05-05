@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 py-5">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
              <h4>Injur [ies] Data</h4>
              @include('partials._searchinjury')
              <a href="/patient/create" class="btn btn-gold header">Record New Injury</a>
            </div>
            <div class="card p-2 mt-4">
              <table class="table table-striped table-bordered mt-4">
                <thead class="header_inverse">
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
                            <td>{{ $injury->cost_total }}</td>
                            <td style="display:flex; align-items:center; justify-content:space-evenly">
                                {{-- <a href="/injury/{{ $injury->id }}/edit" class="btn btn-success">
                                     <i class="fas fa-pencil" style="cursor: pointer;color:whitesmoke"></i>
                                     View
                                </a> --}}
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#injury{{ $injury->id }}Modal">
                                    View
                                </button>




                                <form method="POST" action="/injury/{{$injury->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-gold header"><i class="fa-solid fa-trash"></i> Delete</button>
                                  </form>


                            </td>

                              @include('partials._injurymodal')

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
</body>

@endsection
