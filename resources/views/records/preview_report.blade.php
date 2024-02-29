@extends('layout')

@section('content')
<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 py-5" id="content__overflow">
            <div
              class="font-weight-bold"
              style="
                display: flex;
                align-items: center;
                justify-content: space-between;
              "
            >
            </div>

            <div style="margin: 10px 0px;">
                <button class="btn btn-success"  style="border-radius: 20px;" onclick="printReport()">
                    <i class="fas fa-print"></i>
                </button>
                <a class="btn btn-warning" href="/records/{{ $management->id }}/referraldoc" class="btn btn-warning" style="border-radius: 20px;">
                    Referral
                </a>
            </div>

            <div class="preview__report">
                {{-- Header Information --}}

                <nav>
                <img src="{{ asset("images/preview__report.png") }}" style="width:100%" />
                </nav>

                {{-- Patient BioData --}}

                <div class="preview__patient__biodata">
                    <table  class="table my-2" id="myTable">
                        <thead>
                            <th  style="font-size: 14px">
                                Patient's BioData
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-uppercase"  style="font-size: 10px">Patient's Name : {{ $management->record->patient->name }}</td>
                            </tr>

                            <tr>
                                <td class="text-uppercase"  style="font-size: 10px; display:flex;align-items:center; justify-content:space-between; ">Patient's Contact Number : {{ $management->record->patient->contact }} Patient's Email : {{ $management->record->patient->email }} </td>
                            </tr>

                            <tr>
                                <td class="text-uppercase" style="font-size: 10px">Date of Birth: {{ $management->record->patient->birth_date }}</td>
                            </tr>
                            <tr>
                                <td class="text-uppercase" style="font-size: 10px">Location : NSPM PLC OFFICE</td>
                            </tr>


                        </tbody>

                    </table>
                </div>

                {{-- Referring Doctor BioData --}}


                <div class="preview__patient__biodata">
                    <table  class="table my-2" id="myTable">
                        <thead>
                            <th>
                                Referring Doctor
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-uppercase" style="font-size: 10px"> Name : {{ auth()->user()->name }}</td>
                            </tr>

                            <tr>
                                <td class="text-uppercase" style="font-size: 10px">Location : NSPM PLC OFFICE</td>
                            </tr>
                            @if($management->labtest)
                            <tr>
                                <td class="text-uppercase" style="font-size: 10px">Lab: {{ $management->labtest }}</td>
                            </tr>
                            @endif

                            @if($management->labtest)
                            <tr>
                                <td class="text-uppercase" style="font-size: 10px">Clinic: {{ $management->clinic }}</td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                </div>


                <div class="preview__patient__biodata">
                    <table  class="table" id="myTable">
                        <thead>
                            <th>
                                Tests
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-uppercase">
                                    @if ($management->tests)
                                        <ul style="display: grid; grid-template-columns: auto auto auto auto;">
                                            @foreach (json_decode($management->tests) as $test)
                                                <li style="font-size: 10px">{{ $test }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No tests available.
                                    @endif
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="preview__patient__biodata">
                    <table  class="table my-2" id="myTable">
                        <thead>
                            <th>
                                For Laboratory Use Only:
                            </th>
                        </thead>
                        <tbody style="display: grid; grid-template-columns: auto auto auto auto;">
                            <tr>
                                <td>
                                   Collected By:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Date:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Received By:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Logged By:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Location code:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Time:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Time:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    checked by:
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>

            </div>

            <div></div>
        </div>


    </div>

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
                font-size: 20px;
            }

            .preview__report, .preview__report * {
                visibility: visible;
            }
            .preview__report {
                position: absolute;
                left: 0;
                top: 0;
            }
            .preview__patient__biodata >tbody > tr > td{
                font-size: 10px;
            }
            /* .preview__patient__biodata > table > thead{
                font-size: 10px;
            } */
        }
    </style>
</body>

@endsection
