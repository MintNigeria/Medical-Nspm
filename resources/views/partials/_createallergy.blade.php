<!-- Modal -->
<div class="modal fade text-uppercase" id="allergyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-black-50" id="exampleModalLabel" >NEW ALLERGY {{ $patient->name }}</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/allergies/{{ $patient->id }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label class="my-1">

                        </label>

                    </div>
                      <div class="form-group">
                        <label class="my-1">STATE ALLERGY</label>
                        <textarea
                          type="text"
                          class="form-control text-uppercase"
                          name="allergies"
                          placeholder="State Allergy Here" value=""
                          id=""
                        ></textarea>
                        @error('allergies')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      {{-- </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                  </div>
                </form>
      </div>
    </div>

