@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content">
            <div class="p-5" id="content__overflow">
                <div class="centered-div">
                  <div class="card">
                    <div class="card-header bg-color">
                      ADD New Inventory
                    </div>
                    <div class="card-body">
                <form method="POST" action="/inventory">
                    @csrf
                <div>
                      <div class="form-group">
                        <label>Name</label>
                        <input
                          type="text"
                          class="form-control text-uppercase"
                          name="name"
                          placeholder="Example: Paracetamol" value="{{old('name')}}"
                          id=""
                        />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">Product Type</label>
                        <select name="type" id="" class="js-example-basic-single form-control text-uppercase">
                            <option value=""> Choose ...</option>
                            <option value="Tablets">Tablets</option>
                            <option value="Capsules">Capsules</option>
                            <option value="Suspension">Suspension</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Injection">Injection</option>
                            <option value="Inhalation">Inhalation</option>
                            <option value="Infusion">Infusion</option>
                            <option value="Suppository">Suppository</option>
                            <option value="Drops">Drops</option>
                            <option value="Ear Drops">Ear Drops</option>
                            <option value="Nasal Spray">Nasal Spray</option>
                            <option value="Cream">Cream</option>
                            <option value="Consumables">Consumables</option>
                            <option value="Lozenges">Lozenges</option>
                            <option value="Powder">Powder</option>
                            <option value="Granules">Granules</option>
                        </select>
                        @error('type')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label class="mt-3">Product Package</label>
                        <select name="packaging" id="" class="js-example-basic-single form-control text-uppercase">
                           <option>Choose ...</option>
                           <option value="cartons">Cartons</option>
                           <option  value="boxes">Boxes</option>
                        </select>
                        @error('packaging')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label class="mt-4">ADD Grouping (If Any)</label>
                        <select class="js-example-basic-single text-uppercase form-control" searchable="Search here.." name="grouping">
                            <option value="">Choose ...</option>
                            @foreach ($groups as $group)
                               <option value="{{ $group->name }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="mt-3">No of Units</label>
                        <input
                          type="number"
                          class="form-control text-uppercase"
                          name="no_of_units"
                          placeholder="Example: 9" value="{{old('no_of_units')}}"
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
                          placeholder="Example: 2" value="{{old('unit_deficit')}}"
                          id=""
                        />
                        @error('unit_deficit')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div>

                       <div class="form-group">
                          <label class="mt-3">Expiration Date</label>
                          <input
                            type="date"
                            class="form-control text-uppercase"
                            name="expiration_date"
                            value="{{old('expiration_date')}}"
                            id=""
                          />
                          @error('expiration_date')
                          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                          @enderror
                      </div>
                      {{-- <div class="form-group">
                        <label class="mt-4">Location </label>
                        <select name="location" id="" class="form-control text-uppercase">
                            <option value=""> Choose ...</option>
                            <option value="lagos">Lagos</option>
                            <option value="abuja">Abuja</option>
                            <option value="abuja_clinic">Family Clinic (ABJ)</option>
                            <option value="lagos_clinic">Family Clinic (LAG)</option>
                            <option value="lancaster">Lancaster</option>
                        </select>
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                      </div> --}}


                        <button  class="mt-5 btn btn-success">
                          CREATE Inventory
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
