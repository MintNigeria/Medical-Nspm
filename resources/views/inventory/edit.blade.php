@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content p-4">
            <div class="container">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header header">
                      EDIT Inventory : {{ $inventory->name }}
                    </div>
                    <div class="card-body">
                <form method="POST" action="/inventory/{{$inventory->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div>
                      <div class="form-group">
                        <label>Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Example: Paracetamol" value="{{ $inventory->name }}"
                          id=""
                        />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">Product Type</label>
                        <select name="type" id="" class="form-control text-uppercase">
                            <option value=""> Choose ...</option>
                            <option value="liquid" @if ($inventory->type === 'liquid')
                                selected
                            @endif>Liquid</option>
                            <option value="tablets" @if ($inventory->type === 'tablets')
                                selected
                            @endif>Tablets</option>
                            <option value="injection" @if ($inventory->type === 'injection')
                                selected
                            @endif> Injection</option>
                            <option value="capsules" @if ($inventory->type === 'capsules')
                                selected
                            @endif>Capsules</option>
                            <option value="drops" @if ($inventory->type === 'drops')
                                selected
                            @endif>Drops</option>
                        </select>
                        @error('type')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">No of Units</label>
                        <input
                          type="no_of_units"
                          class="form-control text-uppercase"
                          name="no_of_units"
                          placeholder="Example: 9" value="{{ $inventory->no_of_units  }}"
                          id=""
                        />
                        @error('no_of_units')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-3">Unit Deficit {{ $inventory->unit_deficit  }}</label>
                        <input
                          type="unit_deficit"
                          class="form-control text-uppercase"
                          name="unit_deficit"
                          placeholder="Example: 2" value="{{ $inventory->unit_deficit }}"
                          id=""
                        />
                        @error('unit_deficit')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">Packaging </label>
                        <select name="packaging" id="" class="form-control text-uppercase" >
                            <option value=""> Choose ...</option>
                            <option value="cartons" @if ($inventory->packaging === 'cartons')
                                selected
                            @endif>Cartons</option>
                            <option value="sachets"  @if ($inventory->packaging === 'sachets')
                                selected
                            @endif>Sachets</option>
                            <option value="packs"  @if ($inventory->packaging === 'packs')
                                selected
                            @endif>Packs</option>
                        </select>
                        @error('packaging')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-4">Location </label>
                        <select name="location" id="" class="form-control text-uppercase">
                            <option value=""> Choose ...</option>
                            <option value="lagos" @if ($inventory->location === 'lagos')
                                selected
                            @endif>Lagos</option>
                            <option value="abuja"  @if ($inventory->location === 'abuja')
                                selected
                            @endif>Abuja</option>
                            <option value="abuja_clinic"  @if ($inventory->location === 'abuja_clinic')
                                selected
                            @endif>Family Clinic (ABJ)</option>
                            <option value="lagos_clinic"  @if ($inventory->location === 'lagos_clinic')
                                selected
                            @endif>Family Clinic (LAG)</option>
                            <option value="lancaster"  @if ($inventory->location === 'lancaster')
                                selected
                            @endif>Lancaster</option>
                        </select>
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>


                        <button  class="mt-5 btn btn-gold header">
                          Update Inventory
                        </button>
                      </div>
                    </div>
                  </div>
                </form>

                      <div class="card-footer"></div>

                  </div>
                </div>
        </div>
    </div>
</body>

@endsection
