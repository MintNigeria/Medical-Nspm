@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')

        <div class="content p-5" id="content__overflow">
            @if ($dependent->flag === 'success')
            <div class="alert-success my-1 p-3">
            FLAGGED AS : SERVICE RENDERED ADVISED TO CLOSE STATUS
        </div>
        @elseif ($dependent->flag === 'not_stocked')
        <div class="alert-primary my-1 p-3">
            FLAGGED AS : NOT IN STOCK @ {{ $dependent->designate }} MAY NEED TO DESIGNATE OUTDOORS
        </div>
        @else

        @endif

            <div class="card">
                <div class="card bg-color p-2">
                    <div style="display:flex;align-items:center;justify-content:space-between">
                        <p>RECORD [ {{ $dependent->name }} ]</p>
                        <a class="btn btn-success" href="/dependent/{{ $dependent->patient->id }}/view">
                            VIEW PAST RECORDS
                        </a>
                    </div>

                </div>
                <div class="card-body">
                    <div style="display:flex; align-items:center; justify-content:space-between">
                        <div class="form-group">
                            <label>Staff Name</label>
                            <input type="text" class="form-control text-uppercase"
                             value="{{  $dependent->name }}" disabled name="" id="">
                        </div>

                        <div class="form-group">
                            <label>RECORDED PULSE RATE</label>
                            <input type="text" class="form-control text-uppercase"
                             value="{{ $dependent->bpm }}" disabled name="" id="">
                        </div>
                        <div class="form-group">
                            <label>RECORDED BLOOD PRESSURE</label>
                            <input type="text" class="form-control text-uppercase"
                             value="{{ $dependent->blood_pressure }}" disabled name="" id="">
                        </div>

                    </div>

                    <hr>
                    @if ($dependent->nurse_note)
                        <textarea name="" id="" class="form-control mt-4 text-uppercase" disabled cols="30" rows="3">
                            {{ $dependent->nurse_note }}
                         </textarea>
                    @endif
                    <b class="text-primary">
                        DOCTOR'S ACTIONS
                    </b>


                    <form method="POST" action="/dependents/{{$dependent->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label>ASSESMENT</label>
                            <textarea type="text" name="doctor_comment" cols="30" value="{{ old('doctor_comment') }}"  rows="5" class="form-control text-uppercase mt-2" id="">
                                {{ $dependent->doctor_comment }}
                            </textarea>
                            @error('doctor_comment')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label>Prescription</label>
                            <textarea type="text" name="prescription" cols="30" value="{{ old('prescription') }}"  rows="5" class="form-control text-uppercase mt-2" id="">
                                {{ $dependent->prescription }}
                            </textarea>
                            @error('prescription')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label>Designate </label>
                            <select name="designate" id="mySelect" class="form-control text-uppercase" onchange="showDiv()">
                                <option value=""> Choose ...</option>
                                <option value="pharmacy" @if ($dependent->designate === 'pharmacy')
                                    selected
                                @endif>Pharmacy</option>
                                <option value="family_clinic"  @if ($dependent->designate === 'family_clinic')
                                    selected
                                @endif>Family clinic</option>

                                <option value="outsource" onclick="showDiv()"  @if ($dependent->designate === 'outsource')
                                    selected
                                @endif>OutSourced</option>

                            </select>
                            @error('designate')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-3" id="myDiv" style="display:none;">
                            <label> CLINIC OUTSOURCE: </label>
                            <select name="outsourced_location" id="" class='form-control'>
                                <option value="">Choose ...</option>
                                <option value=""> NOBEL EYE CLINIC</option>
                            </select>
                            @error('outsourced_location')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    <div class="form-group mt-3">
                      <label>CURRENT STATUS</label>
                    <!-- Default radio -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio"name="status" value="open"  @if ($dependent->status === 'open')
                            checked
                        @endif/>
                        <label class="form-check-label" for="flexRadioDefault1"> OPENED</label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio"name="status" value="closed" @if ($dependent->status === 'closed')
                        checked
                    @endif />
                        <label class="form-check-label" for="flexRadioDefault1"> CLOSED </label>
                    </div>
                    <div class="form-check ">
                        <input class="form-check-input" type="radio"name="status" value="cancelled" @if ($dependent->status === 'cancelled')
                        checked
                    @endif/>
                        <label class="form-check-label" for="flexRadioDefault1"> CANCELLED </label>
                    </div>
                    @error('status')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="form-group mt-5">
                        <button class="btn header">
                            <i class="fas fa-share-square-o"></i> SEND
                        </button>
                    </div>
                </div>

                    </form>

                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</body>

@endsection
