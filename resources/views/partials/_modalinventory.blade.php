<!-- Modal -->
<div class="modal fade text-uppercase" id="inventoryModal{{$inventory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Product Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/inventory/{{ $inventory->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control text-uppercase" value="{{ $inventory->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mt-3">Product Type</label>
                    <select name="type" id="" class="form-control text-uppercase">
                        <option value=""> Choose ...</option>
                        <option value="liquid" @if ($inventory->type === "liquid")
                            selected
                        @endif>Liquid</option>
                        <option value="tablets" @if ($inventory->type === "tablets")
                            selected
                        @endif>Tablets</option>
                        <option value="injection" @if ($inventory->type === "injection")
                            selected
                        @endif> Injection</option>
                        <option value="capsules" @if ($inventory->type === "capsules")
                            selected
                        @endif>Capsules</option>
                        <option value="drops" @if ($inventory->type === "drops")
                            selected
                        @endif>Drops</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label class="mt-3">Product Package</label>
                    <select name="packaging" id="" class="form-control text-uppercase">
                        <option value=""> Choose ...</option>
                        <option value="sachets" @if($inventory->packaging === "sachets")
                            selected
                        @endif>Sachets</option>
                        <option value="cartons" @if($inventory->packaging === "cartons")
                            selected
                        @endif>Cartons</option>
                        <option value="capsules" @if($inventory->packaging === "cappsules")
                            selected
                        @endif>Capsules</option>
                        <option value="drops" @if($inventory->packaging === "drops")
                            selected
                        @endif>Drops</option>
                    </select>
                    @error('packaging')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-3">No of Units</label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="no_of_units"
                      placeholder="Example: 9" value="{{$inventory->no_of_units}}"
                      id=""
                    />
                    @error('no_of_units')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="mt-3">Unit Deficit</label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="unit_deficit"
                      placeholder="Example: 2" value="{{$inventory->unit_deficit}}"
                      id=""
                    />
                    @error('unit_deficit')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label class="mt-4">Location </label>
                    <select name="location" id="" class="form-control text-uppercase">
                        <option value=""> Choose ...</option>
                        <option value="lagos" @if($inventory->location === "lagos")
                            selected
                        @endif>Lagos</option>
                        <option value="abuja" @if($inventory->location === "abuja")
                            selected
                        @endif>Abuja</option>
                        <option value="abuja_clinic" @if($inventory->location === "abuja_clinic")
                            selected
                        @endif>Family Clinic (ABJ)</option>
                        <option value="lagos_clinic" @if($inventory->location === "lagos_clinc")
                            selected
                        @endif>Family Clinic (LAG)</option>
                        <option value="lancaster" @if($inventory->location === "lancaster")
                            selected
                        @endif>Lancaster</option>
                    </select>
                    @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>



                {{-- <div class="form-group mt-1">
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
                </div> --}}




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
        </form>
            </div>
    </div>
  </div>

