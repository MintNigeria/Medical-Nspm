@extends('layout')

@section("content")

<?php
// Assuming $record->patient->birth_date is in the format 'Y-m-d'

$birthDate = new DateTime($injury->patient->birth_date);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

?>

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 py-5" id="content__overflow">
            <div >
            <div
              class="font-weight-bold"
              style="display: flex;align-items: center;justify-content: space-between;">
              <h4 class="header-title">ACCIDENT CLAIM ON MEDICAL REPORT : {{ $injury->patient->name }}</h4>
                <button class="btn btn-success"  style="border-radius: 10px;" onclick="printReport()">
                    <i class="fas fa-print"></i>
                </button>
            </div>
            @include('partials._message')
            <div style="background-color:#fafafa;color:#000;min-height:100vh;padding:20px;" class="preview__report mt-4" >
                <table  class="table my-2" id="myTable">
                        <thead>
                            <th style="font-size: 12px">
                                Staff Details
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-uppercase"d>{{ $injury->patient->name }}</td>
                            </tr>
                              <tr>
                                <td class="text-uppercase"d>{{ $injury->patient->staff_id }}</td>
                            </tr>
                              <tr>
                                <td class="text-uppercase"d> {{ $injury->patient->department }}</td>
                            </tr>
                              <tr>
                                <td class="text-uppercase"d>Age : {{ $age}}</td>
                            </tr>
                        </tbody>
                </table>
                 <table  class="table my-2" id="myTable">
                        <thead>
                            <th style="font-size: 12px">
                                INJURY Details
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-uppercase"d>DATE OF INCIDENCE: {{ $injury->date_accident_death }}</td>
                            </tr>
                              <tr>
                                <td class=""d>LOCATION OF INCIDENCE : {{ $injury->location_accident }}</td>
                            </tr>
                              <tr>
                                <td class=""d>NATURE OF ACCIDENT:  {{ $injury->description_accident }}</td>
                            </tr>
                              <tr>
                                <td class="text-uppercase"d>Severity  : {{ $injury->severity}}</td>
                            </tr>
                        </tbody>
                </table>
                <table  class="table my-2" id="myTable">
                        <thead>
                            <th  style="font-size: 12px">
                                Health Details
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>DISABILITY: {{ $injury->disability }}</td>
                            </tr>
                              <tr>
                                <td>Premorbid Health Status : {{ $injury->health_status }}</td>
                            </tr>
                              <tr>
                                <td>Days Absent:  {{ $injury->days_absent }}</td>
                            </tr>
                            @if($injury->death_cause)
                              <tr>
                                <td>Death  : {{ $injury->death_cause}}</td>
                            </tr>
                            @endif
                        </tbody>
                </table>

                <div  class="table my-2" id="myTable">
                    <div style="display:flex;align-item:center;justify-content:space-between;background-color:#fafafa;color:#fff;">
                        <div>
                            <b>Attendance Doctor: {{ $injury->attending_doctor }} </b>
                            <b>Recorded Date : {{ $injury->created_at }} </b>
                        </div>
                         <div>
                            <b>Insurance Doctor: {{ $injury->insurance_doctor }} </b>
                            <b>Insurance Date : {{ $injury->insurance_date }} </b>
                        </div>  
                    </div>
                       
                </div>
            </div>
          </div>

          </div>
        </div>
        </div>


</body>


 <script>
        function printReport() {
            // Add a class to handle visibility during printing
            document.querySelector('.preview__report').classList.add('print-visible');
            window.print();
            // Remove the added class after printing
            setTimeout(() => {
                document.querySelector('.preview__report').classList.remove('print-visible');
            }, 500);
        }
    </script>
<style>
        @media print {
            body * {
                visibility: hidden;
                font-size: 6px;
            }

            .preview__report, .preview__report * {
                visibility: visible;
            }
            .preview__report {
                position: absolute;
                left: 0;
                top: 0;
            }

            thead > th{
                font-size: 10px;
            }
             tr > td{
                font-size: 10px;
            }
            
        }
    </style>


@endsection