
<?php
$birthDate = new DateTime($record->patient->birth_date);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

?>
<div class="modal fade text-uppercase" id="recordModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark font-weight-bolder" id="exampleModalLabel">
            {{ $record->patient->name }} [{{ $record->patient->staff_id }}]
        </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-3">Nurse Note</label>
                            <h6>{{$record->nurse_note}}
                            </h6>
                        </div>
                        <div class="form-group">
                            <label class="mt-3">Current Blood Pressure</label>
                             @if ($record->blood_pressure_systolic > 141 || $record->blood_pressure_diastolic > 100)
                            <h6 class="text-danger font-weight-bold text-2xl blood_danger">
                                RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                            </h6>

                            @else
                            <h6>
                                RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                            </h6>
                            @endif
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Current Pulse Rate</label>
                                <h6>{{ $record->pulse_rate }}</h6>
                            </div>

                            <div class="form-group">
                                <label class="mt-3">Height</label>
                                <h6>Height: {{$record->patient->height}} (m2)</h6>
                                <h6>Weight: {{$record->weight}} (Kg)</h6>
                            </div>

                            <div class="form-group">
                                <label class="mt-3">Current BMI</label>
                                <h6>BMI: {{ round($record->bmi, 6 )}} Kg/m2 </h6>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    </div>
        </form>

        </div>

      </div>
    </div>
  </div>


