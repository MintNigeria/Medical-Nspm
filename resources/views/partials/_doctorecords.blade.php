

<form method="POST" action="/record/{{$record->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Presenting Complaint</h4></label>
        <textarea type="text" name="complaint" value="{{ old('complaint') }}"  class="form-control text-uppercase mt-2" id="">
            {{-- {{ $record->assessment }} --}}
        </textarea>
        @error('complaint')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Physical Examination</h4></label>
        <textarea type="text" name="physicalexam" value="{{ old('physicalexam') }}"  class="form-control text-uppercase mt-2" id="">
            {{-- {{ $record->assessment }} --}}
        </textarea>
        @error('physicalexam')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group mt-4">
        <label><h4 class="text-secondary text-capitalize">Assessment</h4></label>
        <textarea type="text" name="physicalexam" value="{{ old('physicalexam') }}"  class="form-control text-uppercase mt-2" id="">
            {{-- {{ $record->assessment }} --}}
        </textarea>
        @error('physicalexam')
        <p class="text-danger text-xs mt-1">{{$message}}</p>
        @enderror
    </div>


    <h4 class="text-secondary text-capitalize mt-5">Management <span class="text-lowercase text-black-50">(Select Treatment)</span></h4>

    <div class="form-group mt-3">
        <!-- Default checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="test" id="tests" />
            <label class="form-check-label" for="flexCheckDefault">Medical Test(s)</label>
        </div>

        <!-- Checked checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="prescription" id="prescription"/>
            <label class="form-check-label" for="flexCheckChecked">Prescription</label>
        </div>

        <!-- Default checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="nurse" id="nurse" />
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
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Blood Grouping</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Hb genotype</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Hb/PCV</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">FBC</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">WBC – Total</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">WBC – Differentials</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">RBC count</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Platelet count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Reticulocyte count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">ESR</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Bleeding time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Clotting time</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Peripheral blood film</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">RBC indices – each</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Cross-matching</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Unit of screened Rh-positive blood</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Unit of screened rh-negative blood</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Screening of donor blood</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Coombs test (direct & indirect)</label>
            </div>

            <hr />
            <span> Thyroid function test </span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">TSH</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">T3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">T4</label>
            </div>

        </div>



        <div>
            <span>Microbiology & serology</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Malaria parasite test</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Widal test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Rhesus factor determination</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Microscopy urine</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Microscopy stool</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Microscopy culture & sensitivity (MCS) -Stool</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">MCS -Urine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">MCS – HVS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">MCS – urethral swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">MCS – sputum</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">MCS – Ear, nose, throat swab</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">MCB – pus/aspirate/wound</label>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Gram staining</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">CSF – gram stain & MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Semen analysis</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Seminal fluid MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Blood culture & sensivity</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Mantoux test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Sputum AFB X 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">HBsAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">HBeAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">HBcAg</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Microfilarial test – skin snip</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for MCS</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Skin scrapings for fungal studies</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">VDRL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">ELISA – Retroviral screening</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Viral load – RNA</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Viral load – P24</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">CD4 Count</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">HIV Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">HIV Confirmation</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Rheumatoid factor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">ASO Titre</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Alpha-feto protein</label>
            </div>

        </div>

        <div>
            <span>Blood & urine chemistry</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Urinalysis</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Serum electrolytes & urea</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Sodium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Chloride</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Potassium</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Urea</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Creatinine</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">E/U/Cr</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Calcium </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Uric acid</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Blood sugar – fasting</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Blood sugar - random</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Glucose tolerance test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Glycated Hb</label>
            </div>

            <hr />
            <span>Prostate specific antigen (PSA)</span>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Total</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Free</label>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Hormonal Assay</label>
            </div>
        </div>

        <div>
            <span>Lipid Profile</span>

            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Cholesterol</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Triglycerides</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">HDL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">LDL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">HDL</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">LDL</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Liver function test</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">SGOT</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">SGPT</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Bilirubin – total</label>
            </div>


            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Bilirubin – direct</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Alkaline phosphatase</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Acid phosphatase</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label" for="flexCheckChecked">Total protein</label>
            </div>

            <!-- Default checkbox -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Albumin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Globulin</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Albumin – globulin ratio</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Amylase</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Pregnancy test – urine</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  />
                <label class="form-check-label" for="flexCheckDefault">Pregnancy test – serum hCG</label>
            </div>

        </div>

    </div>


  </div>

    <div class="prescriptionDiv" style="display:none;color:black;">
        <!-- Your prescription form content goes here -->
        Prescription
    </div>



    <div class="nurseDiv" style="display:none;color:black;">

    </div>
</div>

<!-- ... (remaining HTML) ... -->

<!-- ... (other form elements) ... -->

<!-- ... (remaining HTML) ... -->

<div style="display:none;">
    <hr>

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

<!-- ... (remaining HTML) ... -->

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

