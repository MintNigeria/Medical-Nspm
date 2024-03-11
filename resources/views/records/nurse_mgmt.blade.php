@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3" id="content__overflow">
        <div style="display: flex; align-items:center;justify-content:space-between">
            <h4 class="text-black">Nurse Care</h4>
                
             <!-- @include('partials._searchoprecord') -->
        </div>
          @include('partials._message')
            
            @unless (count($management) === 0)
            <div class="preview__grid my-3">
                @foreach ($management as $management)
                <div class="card">
                    <div class="card-body">
                      <p class="card-text preview__text">
                        <div><b>Patient Name</b> : <span>{{ $management->record->patient->name }} </span></div>
                        <div><b>Patient StaffId</b> : <span>{{ $management->record->patient->staff_id }} </span></div>
                        <div><b>Processed By</b> : <span>{{ $management->record->processing_by }} </span></div>
                        <div class="my-3">
                                <x-patient-nurse :nurse_mgmtCsv="$management->nurse_mgmt" />
                        </div>
                      </p>
                      <div class="card-footer d-flex justify-between" style="border-radius: 20px;border: 1px solid #eee; padding:30px 10px">
                       <form action="/management/{{ $management->id }}/nurse_response" method="POST">
                            @csrf
                            @method('PUT')

                                <div class="form-group my-3">
                                    <label>Review Note </label>
                                    <input class="form-control" name="nurse_notes" value="{{ old("nurse_notes") }}" width="100" />
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flag_nurse" value="completed" id="" required/>
                                    <label class="form-check-label" for=""> Completed </label>
                                    </div>

                                    <!-- Default checked radio -->
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flag_nurse" value="refer back" id="" required/>
                                    <label class="form-check-label" for=""> Refer Back </label>
                                    </div>

                                    <button type="submit" class="btn text-success">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        @else

        <div class="alert alert-danger mt-5 ">
            No Requests
        </div>

        @endunless
        <div class="mt-1 p-1">
            {{-- {{ $management->links() }} --}}
        </div>
    </div>
</div>

@endsection
