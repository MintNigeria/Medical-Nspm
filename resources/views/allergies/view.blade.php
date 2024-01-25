@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div id="content__overflow">
            <div class="font-weight-bold my-3"><span>RECORD 4 {{ $patient->name }} </span></div>
            <div
            class="font-weight-bold"
            style="
              display: flex;
              align-items: center;
              justify-content: space-between;
            "
          >
            <h4 class="header-title">{{ $allergys->count() }} Allergies </h4>
            @include('partials._searchusers')
            <div>
               <a href="/allergies/create" class="btn btn-outline-secondary"
                 data-mdb-toggle="modal" data-mdb-target="#allergyModal"
               >
                Add New Allergy
            </a>
            </div>
            @include('partials._createallergy')

          </div>
          @include('partials._message')
          <div>
        {{-- <a class="archive" href="/users/archive">View Archived Posts</a> --}}
            <table  class="table table-striped table-bordered my-5 pb-16" id="myTable">
                <thead class="table-color">
                    <th>Allergy</th>
                    <th>Actions</th>
                </thead>
                @unless (count($allergys) === 0)
                <tbody>
                    @foreach ($allergys as  $allergy)

                        <tr>
                            <td>{{ $allergy->allergies }}</td>
                            <td> Preview </td>

                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="6">
                    <td class="text-center text-capitalize">No Allergies Recorded</td>
                </tr>
                </tbody>

                @endunless
            </table>
            {{ $allergys->links() }}
          </div>
        </div>
        </div>
    </div>
</body>

@endsection
