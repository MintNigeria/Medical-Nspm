<!-- Modal -->
<div class="modal fade text-uppercase" id="groupModal{{$group->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Grouping</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/grouping/{{ $group->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $group->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
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


