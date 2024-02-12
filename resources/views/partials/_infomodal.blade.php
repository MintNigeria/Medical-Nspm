<!-- Modal -->

<?php
// Assuming $record->patient->birth_date is in the format 'Y-m-d'

$birthDate = new DateTime($record->patient->birth_date);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

?>

<div class="modal fade text-uppercase" id="recordModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



  <!-- Modal -->
<div class="modal fade text-uppercase" id="recordDataModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header listing-header">
          <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">
            {{ $record->patient->name }} [{{ $record->patient->staff_id }}]
        </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                @csrf
                    <div class="modal-body">
                        <div class="my-3">
                            <div class="listing-tab">
                                <div>
                                    <label>Department</label>
                                    <p> {{ $record->patient->department }}</p>
                                </div>
                                <div>
                                    <label>Age</label>
                                    <p> {{ $age }}</p>
                                </div>
                            </div>
                            <div class="listing-tab">
                                <div>
                                    <label>Weight</label>
                                    <p> {{ $record->weight }} Kg</p>
                                </div>
                                <div>
                                    <label>BMI</label>
                                    <p> {{ round($record->bmi, 6 )}}Kg/m2</p>
                                </div>
                            </div>
                            <div>
                                <label>Pulse rate</label>
                                <p> {{ round($record->bmi, 6 )}}Kg/m2</p>
                            </div>
                            <div>
                                <label class="mt-3">Blood Pressure</label>
                                @if ($record->blood_pressure_systolic > 141 || $record->blood_pressure_diastolic > 100)
                               <p class="text-danger text-2xl blood_danger">
                                   RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                               </p>

                               @else
                               <p>
                                   RECORDED B/P :  {{$record->blood_pressure_systolic  }} / {{ $record->blood_pressure_diastolic }}
                               </p>
                               @endif
                            </div>
                        </div>
                        <hr class="border-line" />
                        <div class="mt-2">
                            <p class="text-black">Doctor In Charge : {{ $record->processing_by }}</p>
                                <div class="listing-notes">
                                    <label>Presenting Complaint</label>
                                    <p>{{ $record->complaint }}</p>
                                </div>
                            <div class="listing-notes">
                                    <label>Physical Exam</label>
                                    <p> {{ $record->physicalexam }} </p>
                            </div>
                            <div class="listing-notes">
                                    <label>Assessment</label>
                                    <p> {{ $record->assessment }}</p>
                            </div>
                        </div>
                        <hr class="border-line" />
                        <div class="listing-actions">
                            @if($record->tests){
                                <div>
                                    <b>Test count </b> : <span>
                                    @php
                                    $tests = json_decode($record->tests);
                                    $numberOfTests = is_array($tests) ? count($tests) : 0;
                                    echo $numberOfTests;
                                     @endphp
                                @if ($record->tests)
                                            <ul style="display:flex; flex-direction:column;">
                                                @foreach (json_decode($record->tests) as $test)
                                                    <li style="font-size: 10px; margin:4px 0">{{ $test }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            No tests available.
                                        @endif
                            </div>
                            }
                            @endif

                        @if($record->prescription){
                            <div>
                                <label>Prescription</label>
                                <p><x-prescription-list :drugs_mgmtCsv="$record->prescription" /></p>


                            </div>
                        }

                        @endif

                        @if($record->assessment){
                            <div>
                                <label>Nurse:</label>
                                <p><x-nurse-mgmt :nurse_mgmtCsv="$record->management" /></p>
                            </div>
                        }

                        @endif
                        </div>

                        <hr class="border-line" />
                        <div style="display: flex; align-item:center; justify-content:space-between;">
                            @if($record->clinic_location){
                                <div>
                                    <label>Assigned Clinic Location</label>
                                    <p class="text-black">{{ $record->clinic_location }}</p>
                                </div>
                            }
                            @endif

                            <div>
                                <label>Current Status</label>
                                <p class="text-black">{{ $record->status }}</p>

                            </div>
                        </div>
                        <div style="display: flex; align-item:center; justify-content:space-between;">
                            <div>
                                <label>Date Initated</label>
                                <p class="text-black-50">{{ $record->created_at }}</p>

                            </div>
                            <div>
                                <label>Last Updated</label>
                                <p class="text-black-50">{{ $record->updated_at }}</p>

                            </div>
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

