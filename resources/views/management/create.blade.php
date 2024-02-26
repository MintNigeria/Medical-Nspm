@extends('layout')

@section('content')

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-2 py-3">
            <div id="content__overflow">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
              <h4 class="text-black text-capitalize">Management({{ $management->count() }})</h4>
              <a href="/management/{{$record->slug }}/" class="btn btn-outline-success">
                View
              </a>

            </div>
             @include('partials._message')
            <div class="row text-black py-4 text-capitalize">
                <div>
                    <div class="card">
                    <div class="card-header bg-color  text-white">
                      Create Management for {{ $record->patient->name }} : {{ $record->patient->staff_id }}
                    </div>
                    <div class="card-body">
                <form method="POST" action="/management/{{ $record->id }}">
                    @csrf
                <div>
                <h4 class="text-secondary text-capitalize">Management <span class="text-lowercase text-black-50">(Select Treatment)</span></h4>

                 <div class="form-group mt-3">
                 <!-- Default checkbox -->
                <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="test" id="tests" name="doctor_act[]"/>
                    <label class="form-check-label" for="flexCheckDefault">Medical Test(s)</label>
                </div>

                <!-- Checked checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="prescription" id="prescription" name="doctor_act[]"/>
                    <label class="form-check-label" for="flexCheckChecked">Prescription</label>
                </div>

                <!-- Default checkbox -->
                <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="nurse" id="nurse" name="doctor_act[]"/>
                    <label class="form-check-label" for="flexCheckDefault">Nurse Management</label>
                </div>
                 

                 {{-- Hr --}}
                  <div class="treatment-options">
            <div class="testsDiv" style="display:none;">
                <div style="display: grid; grid-template-columns:auto auto auto auto;">
                <div>
                    <span>Hematology</span>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood Grouping" />
                        <label class="form-check-label" for="flexCheckDefault">Blood Grouping</label>
                    </div>


                    <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Hb genotype" />
                        <label class="form-check-label" for="flexCheckDefault">Hb genotype</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="Hb/PCV">
                        <label class="form-check-label" for="flexCheckChecked">Hb/PCV</label>
                    </div>

                    <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="FBC" />
                        <label class="form-check-label" for="flexCheckDefault">FBC</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="WBC  Total" />
                        <label class="form-check-label" for="flexCheckChecked">WBC – Total</label>
                    </div>

                    <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="WBC  Differentials"/>
                        <label class="form-check-label" for="flexCheckDefault">WBC – Differentials</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="RBC count"/>
                        <label class="form-check-label" for="flexCheckChecked">RBC count</label>
                    </div>

                    <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Platelet count"/>
                        <label class="form-check-label" for="flexCheckDefault">Platelet count</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Reticulocyte count"/>
                        <label class="form-check-label" for="flexCheckDefault">Reticulocyte count</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="ESR"   />
                        <label class="form-check-label" for="flexCheckDefault">ESR</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Bleeding time"/>
                        <label class="form-check-label" for="flexCheckDefault">Bleeding time</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="Clotting time" />
                        <label class="form-check-label" for="flexCheckDefault">Clotting time</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tests[]" value="Peripheral blood film"  />
                        <label class="form-check-label" for="flexCheckDefault">Peripheral blood film</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="RBC indices  each"/>
                        <label class="form-check-label" for="flexCheckDefault">RBC indices – each</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Cross-matching" />
                        <label class="form-check-label" for="flexCheckDefault">Cross-matching</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Unit of screened Rh-positive blood"/>
                        <label class="form-check-label" for="flexCheckDefault">Unit of screened Rh-positive blood</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"   name="tests[]" value="Unit of screened rh-negative blood" />
                        <label class="form-check-label" for="flexCheckDefault">Unit of screened rh-negative blood</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="Screening of donor blood" />
                        <label class="form-check-label" for="flexCheckDefault">Screening of donor blood</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"   name="tests[]" value="Coombs test (direct & indirect)" />
                        <label class="form-check-label" for="flexCheckDefault">Coombs test (direct & indirect)</label>
                    </div>

                    <hr />
                    <span> Thyroid function test </span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"   name="tests[]" value="TSH"/>
                        <label class="form-check-label" for="flexCheckDefault">TSH</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="T3" />
                        <label class="form-check-label" for="flexCheckDefault">T3</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="tests[]" value="T4" />
                        <label class="form-check-label" for="flexCheckDefault">T4</label>
                    </div>

                </div>
        <div>
            <span>Microbiology & serology</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Malaria parasite test" />
                <label class="form-check-label" for="flexCheckChecked">Malaria parasite test</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Widal test" />
                <label class="form-check-label" for="flexCheckDefault">Widal test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Rhesus factor determination"/>
                <label class="form-check-label" for="flexCheckChecked">Rhesus factor determination</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Microscopy urine"/>
                <label class="form-check-label" for="flexCheckDefault">Microscopy urine</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Microscopy stool"/>
                <label class="form-check-label" for="flexCheckChecked">Microscopy stool</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Microscopy culture & sensitivity (MCS) -Stool"/>
                <label class="form-check-label" for="flexCheckDefault">Microscopy culture & sensitivity (MCS) -Stool</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS -Urine" />
                <label class="form-check-label" for="flexCheckChecked">MCS -Urine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS – HVS"/>
                <label class="form-check-label" for="flexCheckDefault">MCS – HVS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="MCS – urethral swab"/>
                <label class="form-check-label" for="flexCheckDefault">MCS – urethral swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="MCS – sputum"/>
                <label class="form-check-label" for="flexCheckDefault">MCS – sputum</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS – Ear, nose, throat swab" />
                <label class="form-check-label" for="flexCheckDefault">MCS – Ear, nose, throat swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCB – pus/aspirate/wound" />
                <label class="form-check-label" for="flexCheckDefault">Gram staining</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="CSF – gram stain & MCS" />
                <label class="form-check-label" for="flexCheckDefault">CSF – gram stain & MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Semen analysis" />
                <label class="form-check-label" for="flexCheckDefault">Semen analysis</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Seminal fluid MCS" />
                <label class="form-check-label" for="flexCheckDefault">Seminal fluid MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood culture & sensivity" />
                <label class="form-check-label" for="flexCheckDefault">Blood culture & sensivity</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Sputum AFB X 3" />
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Mantoux test" />
                <label class="form-check-label" for="flexCheckDefault">Mantoux test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Sputum AFB X 3"  />
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBsAg"  />
                <label class="form-check-label" for="flexCheckDefault">HBsAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBsAg" />
                <label class="form-check-label" for="flexCheckDefault">HBeAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBcAg"/>
                <label class="form-check-label" for="flexCheckDefault">HBcAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Microfilarial test – skin snip" />
                <label class="form-check-label" for="flexCheckDefault">Microfilarial test – skin snip</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Skin scrapings for MCS" />
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Skin scrapings for fungal studies" />
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for fungal studies</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="VDRL"/>
                <label class="form-check-label" for="flexCheckDefault">VDRL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="ELISA – Retroviral screening" />
                <label class="form-check-label" for="flexCheckDefault">ELISA – Retroviral screening</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Viral load – RNA"  />
                <label class="form-check-label" for="flexCheckDefault">Viral load – RNA</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Viral load – P24"  />
                <label class="form-check-label" for="flexCheckDefault">Viral load – P24</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="CD4 Count"  />
                <label class="form-check-label" for="flexCheckDefault">CD4 Count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HIV Titre"/>
                <label class="form-check-label" for="flexCheckDefault">HIV Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HIV Confirmation" />

                <label class="form-check-label" for="flexCheckDefault">HIV Confirmation</label>

            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Rheumatoid factor" />
                <label class="form-check-label" for="flexCheckDefault">Rheumatoid factor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="ASO Titre"  />
                <label class="form-check-label" for="flexCheckDefault">ASO Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Alpha-feto protein"  />
                <label class="form-check-label" for="flexCheckDefault">Alpha-feto protein</label>
            </div>

        </div>

        <div>
            <span>Blood & urine chemistry</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Urinalysis"  />
                <label class="form-check-label" for="flexCheckDefault">Urinalysis</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Serum electrolytes & urea" />
                <label class="form-check-label" for="flexCheckDefault">Serum electrolytes & urea</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Sodium"/>
                <label class="form-check-label" for="flexCheckChecked">Sodium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Chloride" />
                <label class="form-check-label" for="flexCheckDefault">Chloride</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Potassium"/>
                <label class="form-check-label" for="flexCheckChecked">Potassium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Urea"/>
                <label class="form-check-label" for="flexCheckDefault">Urea</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Creatinine"/>
                <label class="form-check-label" for="flexCheckChecked">Creatinine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="E/U/Cr" />
                <label class="form-check-label" for="flexCheckDefault">E/U/Cr</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Calcium" />
                <label class="form-check-label" for="flexCheckDefault">Calcium </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Uric acid"/>
                <label class="form-check-label" for="flexCheckDefault">Uric acid</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood sugar – fasting"/>
                <label class="form-check-label" for="flexCheckDefault">Blood sugar – fasting</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood sugar - random" />
                <label class="form-check-label" for="flexCheckDefault">Blood sugar - random</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Glucose tolerance test" />
                <label class="form-check-label" for="flexCheckDefault">Glucose tolerance test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Glycated Hb"/>
                <label class="form-check-label" for="flexCheckDefault">Glycated Hb</label>
            </div>

            <hr />
            <span>Prostate specific antigen (PSA)</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="PSA Total"/>
                <label class="form-check-label" for="flexCheckDefault">PSA Total</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="PSA Free" />
                <label class="form-check-label" for="flexCheckDefault">PSA Free</label>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Hormonal Assay"/>
                <label class="form-check-label" for="flexCheckDefault">Hormonal Assay</label>
            </div>
        </div>

        <div>
            <span>Lipid Profile</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Cholesterol"/>
                <label class="form-check-label" for="flexCheckDefault">Cholesterol</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Triglycerides"/>
                <label class="form-check-label" for="flexCheckDefault">Triglycerides</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HDL" />
                <label class="form-check-label" for="flexCheckChecked">HDL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="LDL" />
                <label class="form-check-label" for="flexCheckChecked">LDL</label>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Liver function test"/>
                <label class="form-check-label" for="flexCheckChecked">Liver function test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="SGOT"/>
                <label class="form-check-label" for="flexCheckChecked">SGOT</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="SGPT" />
                <label class="form-check-label" for="flexCheckChecked">SGPT</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Bilirubin – total"/>
                <label class="form-check-label" for="flexCheckChecked">Bilirubin – total</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Bilirubin – direct"/>
                <label class="form-check-label" for="flexCheckDefault">Bilirubin – direct</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Alkaline phosphatase"/>
                <label class="form-check-label" for="flexCheckChecked">Alkaline phosphatase</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Acid phosphatase" />
                <label class="form-check-label" for="flexCheckDefault">Acid phosphatase</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Total protein" />
                <label class="form-check-label" for="flexCheckChecked">Total protein</label>
            </div>

                <!-- Default checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Albumin"/>
                    <label class="form-check-label" for="flexCheckDefault">Albumin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Globulin"/>
                    <label class="form-check-label" for="flexCheckDefault">Globulin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Albumin – globulin ratio" />
                    <label class="form-check-label" for="flexCheckDefault">Albumin – globulin ratio</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Amylase" />
                    <label class="form-check-label" for="flexCheckDefault">Amylase</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Pregnancy test – urine"  />
                    <label class="form-check-label" for="flexCheckDefault">Pregnancy test – urine</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tests[]" value="Pregnancy test – serum hCG"  />
                    <label class="form-check-label" for="flexCheckDefault">Pregnancy test – serum hCG</label>
                </div>

            </div>

        </div>



    </div>

        <div class="prescriptionDiv" style="display:none;color:black;margin:20px 0px">
            <div style="display: flex; align-items:center; justify-content:space-between">
                <label><h4 class="text-secondary text-capitalize">prescription</h4> - to pharmacist</label>
                <button type="button"  class="btn header" data-mdb-toggle="modal" data-mdb-target="#stockModal">
                    View Items In Stock
                </button>
                @include('partials._viewinventorymodal')




            </div>

            <textarea type="text" name="prescription" value="{{ old('prescription') }}"  class="form-control text-uppercase mt-2" id="">

            </textarea>
            @error('prescription')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>



        <div class="nurseDiv" style="display:none;color:black;">
            <div style="display: flex; align-items:center; justify-content:space-between">
                <label><h5 class="text-secondary text-capitalize">Nurse Management</h5> (Seperate tasks with a comma )</label>
            </div>

            <textarea placeholder="E.g Place on bed rest, check temperature, ..." type="text" name="management" value="{{ old('management') }}"  class="form-control text-uppercase mt-2" id="" >
            </textarea>
            @error('management')
            <p class="text-danger text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    </div>


        <div style="display:block;">
            <hr>

            <div class="form-group mt-2">
                <label class="my-3">Select Test / Referral</label><br />
                <select  class=" js-example-basic-single text-uppercase form-control" searchable="Search here.." name="clinic_location">
                    <option value="">Choose ...</option>
                    @unless (count($labs) === 0)
                        @foreach ($labs as $lab)
                            <option value="{{ $lab->name }}" class="text-success">{{ $lab->name }}</option>
                        @endforeach
                    @endunless
                </select>
                @error('clinic_location')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            
            <div class="form-group mt-2">
                <label>SELECT Clinic</label><br />
                <select  class=" js-example-basic-single text-uppercase form-control" searchable="Search here.." name="clinic_location">
                    <option value="">Choose ...</option>
                    @unless (count($retainers) === 0)
                        @foreach ($retainers as $retainer)
                            <option value="{{ $retainer->name }}" class="text-success">{{ $retainer->name }}</option>
                        @endforeach
                    @endunless
                </select>
                @error('clinic_location')
                <p class="text-danger text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

                  </div>
                </div> 
             <div class="card-footer">
                    <button class="btn btn-success" style="float:right">
                        Initiate Management
                    </button>
                </div>
            </form>  
                </div>
            
             
            </div>
        </div>
    </div>
    </div>
</body>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the checkboxes
        var medicalTestCheckbox = document.getElementById('tests');
        var prescriptionCheckbox = document.getElementById('prescription');
        var nurseCheckbox = document.getElementById('nurse');

        // Get the divs to show/hide
        var prescriptionDiv = document.querySelector('.prescriptionDiv');
        var medicalTestDiv = document.querySelector('.testsDiv');
        var nurseDiv = document.querySelector('.nurseDiv');

        // Add change event listeners to checkboxes
        medicalTestCheckbox.addEventListener('change', function () {
            toggleDivVisibility(medicalTestCheckbox, medicalTestDiv);
        });

        prescriptionCheckbox.addEventListener('change', function () {
            toggleDivVisibility(prescriptionCheckbox, prescriptionDiv);
        });

        nurseCheckbox.addEventListener('change', function () {
            toggleDivVisibility(nurseCheckbox, nurseDiv);
        });

        // Function to toggle div visibility
        function toggleDivVisibility(checkbox, div) {
            if (checkbox.checked) {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    });
</script>