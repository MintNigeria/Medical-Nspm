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
                    <label class="mt-4">ADD Grouping (If Any)</label>
                    <select class="form-control" searchable="Search here.." name="grouping">
                        <option value="">Choose ...</option>
                        @foreach ($groups as $group)
                           <option value="{{ $group->name }}" @if($inventory->grouping) selected @endif>{{ $group->name }}</option>
                        @endforeach
                    </select>
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
                        <option value="capsules" @if($inventory->packaging === "capsules")
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
<div class="modal fade text-uppercase" id="eyeinventoryModal{{$inventory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Product Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <h4>{{ $inventory->name }}</h4>
                </div>

                <div class="form-group">
                    <label class="mt-3">Product Type</label>
                    <h4>{{ $inventory->type }}</h4>
                  </div>


                  <div class="form-group">
                    <label class="mt-3">Product Package</label>
                    <h4>{{ $inventory->packaging }}</h4>
                  </div>

                  <div class="form-group">
                    <label class="mt-3">No of Units</label>
                    <h4>{{ $inventory->no_of_units }}</h4>
                  </div>

                  <div class="form-group">
                    <label class="mt-3">Unit Deficit</label>
                    <h4>{{ $inventory->unit_deficit }}</h4>
                  </div>


                  <div class="form-group">
                    <label class="mt-4">Location </label>
                    <h4>{{ $inventory->location }}</h4>


                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                </div>
        </form>
            </div>
    </div>
  </div>
