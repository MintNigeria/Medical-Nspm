<!-- Modal -->
<div class="modal fade text-uppercase" id="leaveModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                {{-- <h5 class="modal-title" id="exampleModalLabel">{{$leave->patient->name}}  {{$leave->patient->staff_id}} [Leave]</h5> --}}
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/leaves/{{ $leave->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="mt-3">Start Date</label>
                            <input
                              type="date"
                              class="form-control text-uppercase"
                              name="start_day"
                               value="{{$leave->start_day}}"
                              id=""
                            />
                            @error('start_day')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label class="mt-3">End Date</label>
                            <input
                              type="date"
                              class="form-control text-uppercase"
                              name="end_day"
                               value="{{$leave->end_day}}"
                              id=""
                            />
                            @error('end_day')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                          </div>

                    <div class="form-group">
                      <label class="mt-4">Doctor's Comment</label>
                      <textarea
                        type="text"
                        class="form-control text-uppercase"
                        name="comment"
                        id=""
                        placeholder="Please Fill in Reasons for Days Off"
                      >{{$leave->comment}}</textarea>
                      @error('comment')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
        </form>
            </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade text-uppercase" id="eyeleaveModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                {{-- <h5 class="modal-title" id="exampleModalLabel">{{$leave->patient->name}}  {{$leave->patient->staff_id}} [Leave]</h5> --}}
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf
            <div class="modal-body">

                <div>
                    <div class="form-group">
                      <label class="mt-3">No of Days</label>
                      <h4>{{ $leave->no_of_days }}</h4>
                    </div>

                    <div class="form-group">
                      <label class="mt-4">Doctor's Comment</label>
                      <h4>{{ $leave->comment }} </h4>
                    </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                </div>
        </form>
            </div>
    </div>
  </div>



