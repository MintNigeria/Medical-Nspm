

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
                Management [ {{ $management->count() }} ] 
            </a>
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

