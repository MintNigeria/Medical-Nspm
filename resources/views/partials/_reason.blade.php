<!-- Modal -->
<div class="modal fade text-uppercase" id="addReason{{$management->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="exampleModalLabel">Add Statement of Reason</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/management/{{ $management->id }}/reason" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>State Reason</label>
                    <input type="text" name="reason" id="" class="form-control" value="{{ $management->record->reason }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label>Add Note</label>
                    <textarea class="form-control" rows="4" cols="10" name="reason_note">
                        {{ $management->record->reason_note }}
                    </textarea>
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