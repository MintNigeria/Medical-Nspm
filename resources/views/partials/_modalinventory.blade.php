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

                      <div class="form-group">
                  <label class="mt-3 text-danger">Expiration Date </label>
                  <input
                      type="date"
                      class="form-control"
                      placeholder="Example: 9"
                      value="{{$inventory->expiration_date}}"
                      id=""
                  />
                  
                  @error('expiration_date')
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
<div class="modal fade text-uppercase" id="inventoryDispenseModal{{$inventory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark" style="background-color:#238263;color:#fff">
                <h5 class="modal-title" id="exampleModalLabel">Dispense Drug</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/inventory/{{ $inventory->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control text-uppercase" value="{{ $inventory->name }}" disabled>
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>
                  <div class="form-group">
                    <label class="mt-4">ADD Grouping (If Any)</label>
                    <select class="form-control" searchable="Search here.." name="grouping" disabled>
                        <option value="">Choose ...</option>
                        @foreach ($groups as $group)
                           <option value="{{ $group->name }}" @if($inventory->grouping) selected @endif>{{ $group->name }}</option>
                        @endforeach
                    </select>
                  </div>


                  <div class="form-group">
                    <label class="mt-3">No of Units</label>
                    <input
                      type="number"
                      class="form-control text-uppercase"
                      name="no_of_units"
                      placeholder="Example: 9" value="{{$inventory->no_of_units}}"
                      id=""
                      disabled
                    />
                    @error('no_of_units')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                    <div class="form-group" id="expirationContent">
                  <label class="mt-3 text-danger">Expiration Date (<span id="expirationWarning" class="text-danger text-xs mt-1"></span>)</label>
                  <input
                      type="date"
                      class="form-control bg-danger text-white"
                      placeholder="Example: 9"
                      value="{{$inventory->expiration_date}}"
                      id="expirationDateInput"
                      disabled
                  />
                  
                  @error('expiration_date')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
              </div>

                 
                <div class="modal-footer" id="expirationButton">
                    <button type="submit" class="btn btn-success">Dispense (<i class="fas fa-minus"></i>)</button>
                </div>
        </form>
            </div>
    </div>
  </div>

<script>
    // Get the current date
    const currentDate = new Date();

    // Get the expiration date from the input
    const expirationDateInput = document.getElementById('expirationDateInput');
    const expirationDate = new Date(expirationDateInput.value);

    // Calculate the difference in months
    const monthsDifference = (expirationDate.getFullYear() - currentDate.getFullYear()) * 12 +
        (expirationDate.getMonth() - currentDate.getMonth());

    const expirationWarning = document.getElementById('expirationWarning');

    // Check if the expiration date is less than 6 months
    if (monthsDifference <= 0) {
         expirationWarning.textContent = 'This item has expired!' ;
        document.getElementById('expirationContent').style.display = "block";
        document.getElementById('expirationButton').style.display = "none";

    }else if(monthsDifference < 6)
    {
        expirationWarning.textContent = 'This item is nearing expiration!' ;
        document.getElementById('expirationContent').style.display = "block";
    }
    
    else{
        expirationWarning.textContent = 'This item has not passed expiration.';
        document.getElementById('expirationContent').style.display = "none";


    }
</script>



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

