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
                <a class="btn btn-success" href="/records/{{ $management->id }}/preview" class="btn btn-warning" style="border-radius: 20px;">
                    Request Tests
                </a>
                <a class="btn btn-success" href="/records/{{ $management->id }}/preview" class="btn btn-warning" style="border-radius: 20px;">
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="referral__doc">
                {{-- Header Information --}}

                <nav>
                    <img src="{{ asset("images/referral__note.png") }}" style="width:100%" alt="referral" />
                </nav>

                <div class="letter-container">
                    <div class="destination">
                        <div>

                        </div>
                        <div>
                            <p>To: {{ $management->clinic }}</p>
                            <p>Date: {{ Date::now() }}</p>
                        </div>
                    </div>

                    <div class="source">
                        <div>
                            <p><b>Tally No: </b> {{ $management->record->patient->staff_id }}</p>
                            <p><b>Name: </b> {{ $management->record->patient->name }}</p>
                            <p><b> Department: </b> {{ $management->record->patient->department }}</p>
                        </div>
                        <div>


                        </div>
                    </div>
                </div>

                <div class="referral_list my-2">
                    <div class="heading">
                        <p class="pb-3">The above named is an employee of this company and is authorised to attend your surgery for medical attention on
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                    <div class="heading mt-2">
                        <p class="pb-3 font-weight-bold">Reason
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                </div>

                <div class="referral_reason">
                </div>


                <div class="destination signoff">
                    <div>

                    </div>
                    <div>
                        <p>______________________________________________</p>
                        <p>From: <b>Authorising Officer</b></p>
                        <p><b>{{ auth()->user()->name }}</b></p>
                        <p><b>Date</b> {{ Date::now() }}</p>
                    </div>
                </div>

                <div class="referral__lab">
                    <p>FOR REFERREE USE: </p>
                </div>

                <div class="referral__lab_info">
                    <h5>TO : <b>NIGERIAN SECURITY PRINTING & MINTING COMPANY LIMITED</b></h5>
                    <div class="heading mt-3">
                        <p class="pb-3 font-weight-bold text-capitalize">I HAVE SEEN
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                    <div class="heading mt-3">
                        <p class="pb-3 font-weight-bold">on
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                    <div class="heading mt-3">
                        <p class="pb-3 font-weight-bold">Type of Illness
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                    <div class="heading mt-3">
                        <p class="pb-3 font-weight-bold">Further consultation
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>

                    <div class="heading mt-3">
                        <p class="pb-3 font-weight-bold">DATE
                        </p>
                        {{-- <br /> --}}
                        <p class="heading_line">
                        </p>
                    </div>
                </div>






            </div>
        </div>


    </div>

    <script>
        function printReport() {
            // Add a class to handle visibility during printing
            document.querySelector('.referral__doc').classList.add('print-visible');
            window.print();
            // Remove the added class after printing
            setTimeout(() => {
                document.querySelector('.referral__doc').classList.remove('print-visible');
            }, 500);
        }
    </script>
     <style>
        @media print {
            body * {
                visibility: hidden;
                font-size: 20px;
            }

            .referral__doc, .referral__doc * {
                visibility: visible;
                /* height: 100%; */
            }
            .referral__doc {
                position: absolute;
                left: 0;
                top: 0;
                font-size: 14px
            }

            .destination >div > p, .source >div > p,  .destination >div > p > b, .source >div > p > b {
                font-size: 13px;
            }

            .referral_list{
                font-size: 5px;
                text-transform: capitalize;
            }

        .referral_list > .heading > p {
            font-size: 10px;
        }

        .referral_reason{
                height: 5vh;
            }
        .signoff > div > p, .signoff > div > p > b{
            font-size: 10px;
        }
        .referral__lab_info > h5{
            font-size: 10px;
        }
        .referral__lab_info > h5 > b {
            font-size: 12px;
        }
        .referral__lab_info > .heading > p {
            font-size: 13px;
        }
        }
    </style>
</body>

@endsection
