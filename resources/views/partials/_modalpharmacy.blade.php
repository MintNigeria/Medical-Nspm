<!-- Modal -->
<div class="modal fade text-uppercase" id="pharmacyModal{{$pharmacy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Product Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/pharmacy/{{ $pharmacy->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $pharmacy->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-1">
                    <label class="mt-4">Type</label>
                    <select name="type" class="form-control text-uppercase">
                        <option value="" >Choose ...</option>
                        <option value="tablets" @if ($pharmacy->type === "tablets")
                            selected
                        @endif>TABLETS</option>
                        <option value="injections" @if($pharmacy->type === "injections")
                            selected
                        @endif>INJECTIONS</option>
                        <option value="syrups" @if($pharmacy->type === "pharmacy")
                            selected
                        @endif>SYRUPS</option>
                    </select>
                    @error('type')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group mt-1">
                    <label class="mt-4">PACKAGING</label>
                    <select name="packaging" class="form-control text-uppercase">
                        <option value="" >Choose ...</option>
                        <option value="BOXES" @if ($pharmacy->packaging === "BOXES")
                            selected
                        @endif>BOXES</option>
                        <option value="CARTONS" @if($pharmacy->packaging === "CARTONS")
                            selected
                        @endif>CARTONS</option>
                        <option value="NIL" @if($pharmacy->packaging === "NIL")
                            selected
                        @endif>NIL</option>
                    </select>
                    @error('packaging')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label class="mt-4"> NO OF UNITS</label>
                    <input type="number" name="no_of_units" class="form-control text-uppercase" value="{{ $pharmacy->no_of_units }}" />

                    @error('no_of_units')
                    <p class="text-danger text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="mt-4">DEFICIT COUNT <span class="text-sm" style="font-size: 13px;">(Notify When Deficit Number Hits)</span></label>
                    <input type="number" name="deficit_target" class="form-control text-uppercase" value="{{$pharmacy->deficit_target }}" />
                    @error('deficit_target')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
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

