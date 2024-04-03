@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-4">

        <div class="">
            <div class="centered-div">
              <div class="card">
                <div class="card-header bg-color">
                  ADD New Retainer
                </div>
                <div class="card-body">
            <form method="POST" action="/clinics/">
                @csrf
            <div>
                  <div class="form-group">
                    <label>Name</label>
                    <input
                      type="text"
                      class="form-control"
                      name="name"
                      placeholder="Example: JOHN HOPSKINS HOSPITAL" value="{{old('name')}}"
                      id=""
                    />
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="mt-3">TYPE</label>
                    <select name="type" id="mySelect" class="js-example-basic-single text-uppercase form-control" searchable="Search here.." required>
                        <option value="">Choose ...</option>
                        <option value="Internal Lagos">Internal Lagos</option>
                        <option value="Internal Abuja">Internal Abuja</option>
                        <option value="General Clinic">General Clinic</option>
                        <option value="Dental Clinic">Dental Clinic</option>
                        <option value="Cardiology Clinic">Cardiology Clinic</option>
                        <option value="Dermatology Clinic">Dermatology Clinic</option>
                        <option value="Orthopedic Clinic">Orthopedic Clinic</option>
                        <option value="Hearing Clinic">Hearing Clinic</option>
                        <option value="Pediatric Clinic">Pediatric Clinic</option>
                        <option value="Psychiatry Clinic">Psychiatry Clinic</option>
                        <option value="Urology Clinic">Urology Clinic</option>
                        <option value="Obstetrics & Gynecology Clinic">Obstetrics & Gynecology Clinic</option>
                        <option value="Oncology Clinic">Oncology Clinic</option>
                        <option value="Gastroenterology Clinic">Gastroenterology Clinic</option>
                        <option value="ENT Clinic">ENT Clinic</option>
                        <option value="Chiropractic Clinic">Chiropractic Clinic</option>
                        <option value="Geriatric Clinic">Geriatric Clinic</option>
                        <option value="Aesthetic or Cosmetic Clinic">Aesthetic or Cosmetic Clinic</option>
                        <option value="Pain Clinic">Pain Clinic</option>
                        <option value="Holistic or Integrative Medicine Clinic">Holistic or Integrative Medicine Clinic</option>
                        <option value="Addiction Treatment Clinic">Addiction Treatment Clinic</option>
                        <option value="Immunization Clinic">Immunization Clinic</option>
                        <option value="Genetics Clinic">Genetics Clinic</option>
                        <option value="Wound Care Clinic">Wound Care Clinic</option>
                        <option value="Diagnostic Imaging Clinic">Diagnostic Imaging Clinic</option>
                        <option value="Pulmonary Clinic">Pulmonary Clinic</option>
                        <option value="Endocrinology Clinic">Endocrinology Clinic</option>
                        <option value="Infertility Clinic">Infertility Clinic</option>
                    </select>

                    @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label class="mt-3">Lab/Retainer</label>
                    <select name="lab_retainer" class="js-example-basic-single text-uppercase form-control" searchable="Search here.." required>
                        <option value="">Choose ...</option>
                        <option value="laboratory">Laboratory</option>
                        <option value="retainer">Retainer Hospital</option>
                    </select>

                    @error('lab_retainer')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                    <button  class="mt-5 btn btn-success">
                      SAVE CLINIC
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

@include('partials._message')

@endsection
