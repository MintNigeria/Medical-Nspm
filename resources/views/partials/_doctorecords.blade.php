

<form method="POST" action="/record/{{$record->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group mt-3">
        <label>Prescription / Management </label>
      <!-- Default radio -->
      <div class="form-check mt-3">
        <input class="form-check-input" type="radio"name="service_type" value="prescription" onclick="radioDiv('prescription', 'management')"  >
          <label class="form-check-label">Prescription</label>
      </div>
      <div class="form-check ">
        <input type="radio" class="form-check-input" name="service_type" value="management" onclick="radioDiv('management', 'prescription')" >

        <label class="form-check-label">Management</label>
      </div>
      @error('service_type')
      <p class="text-danger font-weight-bold mt-1">{{$message}}</p>
      @enderror

  </div>


    <div class="form-group mt-2">
        <label>ASSESSMENT</label>
        <textarea type="text" name="assessment" value="{{ old('assesment') }}"  class="form-control text-uppercase mt-2" id="">
            {{ $record->assessment }}
        </textarea>
        @error('assessment')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>


    <div id="prescription" style="display:none;">
        <hr>

        <div class="form-group mt-2">
            <label class="mt-1">Prescription</label>
            <textarea type="text" name="prescription"  value="{{ old('prescription') }}" placeholder="Prescribe as to be Viewed By the pharmacist"  class="form-control text-uppercase" id="">
                {{ $record->prescription }}
            </textarea>
            @error('prescription')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <button type="button" class="mt-1 header btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Preview Stocks
          </button>


          {{-- Modal : Get All Stocks --}}

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pharamceuticals</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="search" class="form-control" name="" id="" />


                    @unless (count($pharmacies) === 0)
                        @foreach ($pharmacies as $pharmacy)

                        <div class="alert-primary p-4 mt-3">
                            <div style="display: flex; align-items:center; justify-content:space-between;">
                                <b> {{ $pharmacy->name }}</b>
                                <b> {{ $pharmacy->type }}</b>
                                <b> {{ $pharmacy->no_of_units }}</b>
                            </div>

                        </div>
                    {{ $pharmacies->links() }}

                        @endforeach

                    @endunless
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>



        <div class="form-group mt-4">
            <label>Designate </label>
            <select name="designate" id="mySelect" class="form-control text-uppercase" onchange="showDiv()">
                <option value=""> Choose ...</option>
                <option value="pharmacy" @if ($record->designate === 'pharmacy')
                    selected
                @endif>Pharmacy</option>
                <option value="family_clinic"  @if ($record->designate === 'family_clinic')
                    selected
                @endif>Family clinic</option>

                <option value="outsource" onclick="showDiv()"  @if ($record->designate === 'outsource')
                    selected
                @endif>OutSourced</option>

            </select>
            @error('designate')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group mt-3" id="myDiv" style="display:none;">
            <label> CLINIC OUTSOURCE: </label>
            <select name="clinic_location" id="" class='form-control'>
                <option value="">Choose ...</option>
                <option value="nobel_eye">NOBEL EYE CLINIC</option>
            </select>
            @error('clinic_location')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

    </div>

    <div id="management" style="display:none;">
        <div class="form-group mt-2">
            <label class="mt-2">Management (<span class="text-danger text-sm">
                Seperate Each Process with a Comma(,)
            </span>) </label>
            <textarea type="text" name="management" value="{{ old('management') }}"  class="form-control text-uppercase" id="">
                {{ $record->management }}
            </textarea>
            @error('management')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

    </div>




<div class="form-group mt-3">
  <label>CURRENT STATUS</label>
<!-- Default radio -->
<div class="form-check">
    <input class="form-check-input" type="radio"name="status" value="open"  @if ($record->status === 'open')
        checked
    @endif/>
    <label class="form-check-label" for="flexRadioDefault1"> OPENED</label>
</div>
<div class="form-check ">
    <input class="form-check-input" type="radio"name="status" value="closed" @if ($record->status === 'closed')
    checked
@endif />
    <label class="form-check-label" for="flexRadioDefault1"> CLOSED </label>
</div>
<div class="form-check ">
    <input class="form-check-input" type="radio"name="status" value="cancelled" @if ($record->status === 'cancelled')
    checked
@endif/>
    <label class="form-check-label" for="flexRadioDefault1"> CANCELLED </label>
</div>
@error('status')
<p class="text-danger text-xs mt-1">{{$message}}</p>
@enderror

<div class="form-group my-5">
    <button class="btn header">
        <i class="fas fa-share-square-o"></i> SEND
    </button>
</div>
</div>

</form>
