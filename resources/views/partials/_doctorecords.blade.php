

<form method="POST" action="/record/{{$record->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Presenting Complaint</h4></label>
        <textarea type="text" name="complaint" value="{{ old('complaint') }}"  class="form-control text-uppercase mt-2" id="">
            {{$record->complaint}}
        </textarea>
        @error('complaint')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Physical Examination</h4></label>
        <textarea type="text" name="physicalexam" value="{{ old('physicalexam') }}"  class="form-control text-uppercase mt-2" id="">
            {{$record->physicalexam}}

        </textarea>
        @error('physicalexam')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Assessment </h4></label>
        <textarea type="text" name="assessment" class="form-control text-uppercase mt-2" id="">
            {{$record->assessment}}
        </textarea>
        @error('assessment')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

      <div class="alert-primary p-4 mt-4 text-primary" style="border-radius:10px;font-weight:bold;">
            <a href="/management/{{ $record->id }}/create" class="text-primary">
                Management
            </a>
        </div>


    <h4 class="text-secondary text-capitalize mt-5">Management <span class="text-lowercase text-black-50">(Select Treatment)</span></h4>

    <div class="form-group mt-3">
        <!-- Default checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="test" id="tests" name="doctor_act[]" @if(is_array(json_decode($record->doctor_act, true)) && in_array('test', json_decode($record->doctor_act, true))) checked @endif />
            <label class="form-check-label" for="flexCheckDefault">Medical Test(s)</label>
        </div>

        <!-- Checked checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="prescription" id="prescription" name="doctor_act[]" @if(is_array(json_decode($record->doctor_act, true)) && in_array('prescription', json_decode($record->doctor_act, true))) checked @endif   />
            <label class="form-check-label" for="flexCheckChecked">Prescription</label>
        </div>

        <!-- Default checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="nurse" id="nurse" name="doctor_act[]" @if(is_array(json_decode($record->doctor_act, true)) && in_array('nurse', json_decode($record->doctor_act, true))) checked @endif  />
            <label class="form-check-label" for="flexCheckDefault">Nurse Management</label>
        </div>


    </div>
   <!-- ... (other form elements) ... -->

   <div class="treatment-options">
    <div class="testsDiv" style="display:none;">
        <div style="display: grid; grid-template-columns:auto auto auto auto;">
        <div>
            <span>Hematology</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood Grouping" @if(is_array(json_decode($record->tests, true)) && in_array('Blood Grouping', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Blood Grouping</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Hb genotype" @if(is_array(json_decode($record->tests, true)) && in_array('Hb genotype', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Hb genotype</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Hb/PCV" @if(is_array(json_decode($record->tests, true)) && in_array('Hb/PCV', json_decode($record->tests, true))) checked @endif >
                <label class="form-check-label" for="flexCheckChecked">Hb/PCV</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="FBC" @if(is_array(json_decode($record->tests, true)) && in_array('FBC', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">FBC</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="WBC  Total" @if(is_array(json_decode($record->tests, true)) && in_array('WBC  Total', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">WBC – Total</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="WBC  Differentials" @if(is_array(json_decode($record->tests, true)) && in_array('WBC  Differentials', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">WBC – Differentials</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="RBC count" @if(is_array(json_decode($record->tests, true)) && in_array('RBC count', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">RBC count</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Platelet count" @if(is_array(json_decode($record->tests, true)) && in_array('Platelet count', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Platelet count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Reticulocyte count" @if(is_array(json_decode($record->tests, true)) && in_array('Reticulocyte count', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Reticulocyte count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="ESR"  @if(is_array(json_decode($record->tests, true)) && in_array('ESR', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">ESR</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Bleeding time"  @if(is_array(json_decode($record->tests, true)) && in_array('Bleeding time', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Bleeding time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Clotting time"  @if(is_array(json_decode($record->tests, true)) && in_array('Clotting time', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Clotting time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Peripheral blood film" @if(is_array(json_decode($record->tests, true)) && in_array('Peripheral blood film', json_decode($record->tests, true))) checked @endif  />
                <label class="form-check-label" for="flexCheckDefault">Peripheral blood film</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="RBC indices  each" @if(is_array(json_decode($record->tests, true)) && in_array('RBC indices  each', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">RBC indices – each</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Cross-matching" @if(is_array(json_decode($record->tests, true)) && in_array('Cross-matching', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Cross-matching</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Unit of screened Rh-positive blood" @if(is_array(json_decode($record->tests, true)) && in_array('Unit of screened Rh-positive blood', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Unit of screened Rh-positive blood</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Unit of screened rh-negative blood" @if(is_array(json_decode($record->tests, true)) && in_array('Unit of screened Rh-positive blood', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Unit of screened rh-negative blood</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Screening of donor blood" @if(is_array(json_decode($record->tests, true)) && in_array('Unit of screened Rh-positive blood', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Screening of donor blood</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Coombs test (direct & indirect)" @if(is_array(json_decode($record->tests, true)) && in_array('Unit of screened Rh-positive blood', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Coombs test (direct & indirect)</label>
            </div>

            <hr />
            <span> Thyroid function test </span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="TSH" @if(is_array(json_decode($record->tests, true)) && in_array('TSH', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">TSH</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="T3" @if(is_array(json_decode($record->tests, true)) && in_array('T3', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">T3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="T4" @if(is_array(json_decode($record->tests, true)) && in_array('T4', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">T4</label>
            </div>

        </div>



        <div>
            <span>Microbiology & serology</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Malaria parasite test" @if(is_array(json_decode($record->tests, true)) && in_array('Unit of screened Rh-positive blood', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Malaria parasite test</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Widal test" @if(is_array(json_decode($record->tests, true)) && in_array('Widal test', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Widal test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Rhesus factor determination" @if(is_array(json_decode($record->tests, true)) && in_array('Rhesus factor determination', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Rhesus factor determination</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Microscopy urine" @if(is_array(json_decode($record->tests, true)) && in_array('Microscopy urine', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Microscopy urine</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Microscopy stool" @if(is_array(json_decode($record->tests, true)) && in_array('Microscopy stool', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Microscopy stool</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Microscopy culture & sensitivity (MCS) -Stool" @if(is_array(json_decode($record->tests, true)) && in_array('Microscopy culture & sensitivity (MCS) -Stool', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Microscopy culture & sensitivity (MCS) -Stool</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS -Urine" @if(is_array(json_decode($record->tests, true)) && in_array('MCS -Urin', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">MCS -Urine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS – HVS" @if(is_array(json_decode($record->tests, true)) && in_array('MCS – HVS', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">MCS – HVS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="MCS – urethral swab" @if(is_array(json_decode($record->tests, true)) && in_array('MCS – urethral swab', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">MCS – urethral swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="MCS – sputum" @if(is_array(json_decode($record->tests, true)) && in_array('MCS – sputum', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">MCS – sputum</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCS – Ear, nose, throat swab" @if(is_array(json_decode($record->tests, true)) && in_array('MCS – Ear, nose, throat swab', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">MCS – Ear, nose, throat swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="MCB – pus/aspirate/wound" @if(is_array(json_decode($record->tests, true)) && in_array('MCB – pus/aspirate/wound', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">MCB – pus/aspirate/wound</label>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Gram staining" @if(is_array(json_decode($record->tests, true)) && in_array('Gram staining', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Gram staining</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="CSF – gram stain & MCS" @if(is_array(json_decode($record->tests, true)) && in_array('CSF – gram stain & MCS', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">CSF – gram stain & MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Semen analysis" @if(is_array(json_decode($record->tests, true)) && in_array('Semen analysis', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Semen analysis</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Seminal fluid MCS" @if(is_array(json_decode($record->tests, true)) && in_array('Seminal fluid MCS', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Seminal fluid MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood culture & sensivity" @if(is_array(json_decode($record->tests, true)) && in_array('Blood culture & sensivity', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Blood culture & sensivity</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Sputum AFB X 3" @if(is_array(json_decode($record->tests, true)) && in_array('Sputum AFB X 3', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Mantoux test" @if(is_array(json_decode($record->tests, true)) && in_array('Mantoux test', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Mantoux test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Sputum AFB X 3" @if(is_array(json_decode($record->tests, true)) && in_array('Sputum AFB X 3', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBsAg"  @if(is_array(json_decode($record->tests, true)) && in_array('HBsAg', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">HBsAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBsAg"  @if(is_array(json_decode($record->tests, true)) && in_array('HBsAg', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">HBeAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="HBcAg" @if(is_array(json_decode($record->tests, true)) && in_array('HBcAg', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">HBcAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"   name="tests[]" value="Microfilarial test – skin snip" @if(is_array(json_decode($record->tests, true)) && in_array('Microfilarial test – skin snip', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Microfilarial test – skin snip</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Skin scrapings for MCS" @if(is_array(json_decode($record->tests, true)) && in_array('Skin scrapings for MCS', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Skin scrapings for fungal studies" @if(is_array(json_decode($record->tests, true)) && in_array('Skin scrapings for fungal studies', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for fungal studies</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="VDRL"  @if(is_array(json_decode($record->tests, true)) && in_array('VDRL', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">VDRL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="ELISA – Retroviral screening" @if(is_array(json_decode($record->tests, true)) && in_array('ELISA – Retroviral screening', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">ELISA – Retroviral screening</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Viral load – RNA"  @if(is_array(json_decode($record->tests, true)) && in_array('Viral load – RNA', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Viral load – RNA</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Viral load – P24"  @if(is_array(json_decode($record->tests, true)) && in_array('Viral load – P24', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Viral load – P24</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="CD4 Count"  @if(is_array(json_decode($record->tests, true)) && in_array('CD4 Count', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">CD4 Count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HIV Titre" @if(is_array(json_decode($record->tests, true)) && in_array('HIV Titre', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">HIV Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HIV Confirmation" @if(is_array(json_decode($record->tests, true)) && in_array('HIV Confirmation', json_decode($record->tests, true))) checked @endif/>

                <label class="form-check-label" for="flexCheckDefault">HIV Confirmation</label>

            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Rheumatoid factor"  @if(is_array(json_decode($record->tests, true)) && in_array('HIV Confirmation', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Rheumatoid factor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="ASO Titre"  @if(is_array(json_decode($record->tests, true)) && in_array('HIV Confirmation', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">ASO Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Alpha-feto protein"  @if(is_array(json_decode($record->tests, true)) && in_array('HIV Confirmation', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Alpha-feto protein</label>
            </div>

        </div>

        <div>
            <span>Blood & urine chemistry</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Urinalysis"  @if(is_array(json_decode($record->tests, true)) && in_array('Urinalysis', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Urinalysis</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Serum electrolytes & urea"  @if(is_array(json_decode($record->tests, true)) && in_array('Serum electrolytes & urea', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Serum electrolytes & urea</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Sodium" @if(is_array(json_decode($record->tests, true)) && in_array('Sodium', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Sodium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Chloride" @if(is_array(json_decode($record->tests, true)) && in_array('Chloride', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Chloride</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Potassium" @if(is_array(json_decode($record->tests, true)) && in_array('Potassium', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Potassium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Urea" @if(is_array(json_decode($record->tests, true)) && in_array('Urea', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Urea</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Creatinine" @if(is_array(json_decode($record->tests, true)) && in_array('Creatinine', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckChecked">Creatinine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="E/U/Cr"  @if(is_array(json_decode($record->tests, true)) && in_array('E/U/Cr', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">E/U/Cr</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Calcium" @if(is_array(json_decode($record->tests, true)) && in_array('Calcium', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Calcium </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Uric acid"  @if(is_array(json_decode($record->tests, true)) && in_array('Uric acid', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Uric acid</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood sugar – fasting" @if(is_array(json_decode($record->tests, true)) && in_array('Blood sugar – fasting', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Blood sugar – fasting</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Blood sugar - random" @if(is_array(json_decode($record->tests, true)) && in_array('Blood sugar - random', json_decode($record->tests, true))) checked @endif  />
                <label class="form-check-label" for="flexCheckDefault">Blood sugar - random</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Glucose tolerance test" @if(is_array(json_decode($record->tests, true)) && in_array('Glucose tolerance test', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Glucose tolerance test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Glycated Hb" @if(is_array(json_decode($record->tests, true)) && in_array('Glycated Hb', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Glycated Hb</label>
            </div>

            <hr />
            <span>Prostate specific antigen (PSA)</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="PSA Total" @if(is_array(json_decode($record->tests, true)) && in_array('PSA Total', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">PSA Total</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="PSA Free" @if(is_array(json_decode($record->tests, true)) && in_array('PSA Free', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">PSA Free</label>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Hormonal Assay" @if(is_array(json_decode($record->tests, true)) && in_array('Hormonal Assay', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Hormonal Assay</label>
            </div>
        </div>

        <div>
            <span>Lipid Profile</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Cholesterol" @if(is_array(json_decode($record->tests, true)) && in_array('Cholesterol', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Cholesterol</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Triglycerides" @if(is_array(json_decode($record->tests, true)) && in_array('Triglycerides', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Triglycerides</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="HDL" @if(is_array(json_decode($record->tests, true)) && in_array('HDL', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">HDL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="LDL" @if(is_array(json_decode($record->tests, true)) && in_array('LDL', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">LDL</label>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Liver function test" @if(is_array(json_decode($record->tests, true)) && in_array('Liver function test', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Liver function test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="SGOT" @if(is_array(json_decode($record->tests, true)) && in_array('SGOT', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckChecked">SGOT</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="SGPT" @if(is_array(json_decode($record->tests, true)) && in_array('SGPT', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">SGPT</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Bilirubin – total" @if(is_array(json_decode($record->tests, true)) && in_array('Bilirubin – total', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Bilirubin – total</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Bilirubin – direct" @if(is_array(json_decode($record->tests, true)) && in_array('Bilirubin – direct', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Bilirubin – direct</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Alkaline phosphatase" @if(is_array(json_decode($record->tests, true)) && in_array('Alkaline phosphatase', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Alkaline phosphatase</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Acid phosphatase" @if(is_array(json_decode($record->tests, true)) && in_array('Acid phosphatase', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Acid phosphatase</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="tests[]" value="Total protein" @if(is_array(json_decode($record->tests, true)) && in_array('Total protein', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckChecked">Total protein</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Albumin" @if(is_array(json_decode($record->tests, true)) && in_array('Albumin', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Albumin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Globulin"  @if(is_array(json_decode($record->tests, true)) && in_array('Globulin', json_decode($record->tests, true))) checked @endif/>
                <label class="form-check-label" for="flexCheckDefault">Globulin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Albumin – globulin ratio" @if(is_array(json_decode($record->tests, true)) && in_array('Albumin – globulin ratio', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Albumin – globulin ratio</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Amylase" @if(is_array(json_decode($record->tests, true)) && in_array('Amylase', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Amylase</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Pregnancy test – urine" @if(is_array(json_decode($record->tests, true)) && in_array('Pregnancy test – urine', json_decode($record->tests, true))) checked @endif />
                <label class="form-check-label" for="flexCheckDefault">Pregnancy test – urine</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tests[]" value="Pregnancy test – serum hCG" @if(is_array(json_decode($record->tests, true)) && in_array('regnancy test – serum hCG', json_decode($record->tests, true))) checked @endif  />
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
        {{ $record->prescription }}

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
        {{ $record->management }}
        </textarea>
        @error('management')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
</div>


<div style="display:block;">
    <hr>

    <div class="form-group mt-5">
        <label>SELECT CLINIC</label><br />
        <select  class=" js-example-basic-single text-uppercase form-control" searchable="Search here.." name="clinic_location">
            <option value="">Choose ...</option>
            @unless (count($clinics) === 0)
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->name }}" class="text-success" @if ($clinic->name == $record->clinic_location) selected @endif>{{ $clinic->name }}</option>
                @endforeach
            @endunless
        </select>
        @error('clinic_location')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

    <div class="form-group mt-3">
        <label>CURRENT STATUS</label>
        <!-- Default radio -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="open"  @if ($record->status === 'open')
                checked
            @endif/>
            <label class="form-check-label" for="flexRadioDefault1"> OPENED</label>
        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="status" value="closed" @if ($record->status === 'closed')
                checked
            @endif />
            <label class="form-check-label" for="flexRadioDefault1"> CLOSED </label>
        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="status" value="cancelled" @if ($record->status === 'cancelled')
                checked
            @endif/>
            <label class="form-check-label" for="flexRadioDefault1"> CANCELLED </label>
        </div>
        @error('status')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror

        <div class="form-group my-5">
            <button class="btn btn-success">
                <i class="fas fa-share"></i> SEND
            </button>
        </div>
    </div>
</div>


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

