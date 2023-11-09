<!-- Modal -->
<div class="modal fade text-uppercase" id="clinicModal{{$clinic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Clinic Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/clinics/{{ $clinic->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $clinic->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mt-3">tYPE</label>
                    <select name="type" class="form-select" id="" required>
                        <option value="">Choose ...</option>
                        <option value="eye" @if ($clinic->type == "eye")
                            selected
                        @endif>EYE CLINIC</option>
                        <option value="stomach"  @if ($clinic->type == "stomach")
                            selected
                        @endif>STOMACH CLINIC</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
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

<!-- Modal -->
<div class="modal fade text-uppercase" id="eyeclinicModal{{$clinic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Clinic Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/clinics/{{ $clinic->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <h4>{{ $clinic->name }}</h4>
                </div>

                <div class="form-group">
                    <label class="mt-3">tYPE</label>
                    <h4>{{ $clinic->type }}</h4>
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

