@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div id="content__overflow">
            <div class="font-weight-bold my-3"><span>RECORD 4 {{ $record->patient->name }} </span></div>
            <div
            class="font-weight-bold"
            style="
              display: flex;
              align-items: center;
              justify-content: space-between;
            "
          >
            <h4 class="header-title">Follow Up(s) {{ $feedbacks->count() }}</h4>


          </div>
          @include('partials._message')
          <div>
        {{-- <a class="archive" href="/users/archive">View Archived Posts</a> --}}
            <table  class="table table-striped table-bordered my-5 pb-16" id="myTable">
                <thead class="table-color">
                    <th>Type</th>
                    <th>Clinic Location</th>
                    <th>Detected Illness</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                @unless (count($feedbacks) === 0)
                <tbody>
                    @foreach ($feedbacks as  $feedback)

                        <tr>
                            <td>{{ $feedback->feedback_type }}</td>
                            <td>{{ $feedback->clinic_location }}</td>
                            <td>{{ $feedback->detected_illness }}</td>
                            <td>{{ $feedback->created_at }}</td>
                            <td style="display: flex; align-items:center;justify-content:space-evenly;">

                                    <a type="button" data-mdb-toggle="modal" data-mdb-target="#feedbackModal{{ $feedback->id }}">
                                        <i class="fa-solid fa-eye text-success"></i>
                                    </a>

                                     @include('partials._modalfeedback')

                            </td>

                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                <tr colspan="6">
                    <td class="text-center text-capitalize">No Feeback Recorded</td>
                </tr>
                </tbody>

                @endunless
            </table>
            {{ $feedbacks->links() }}
          </div>
        </div>
        </div>
    </div>
</body>

@endsection
