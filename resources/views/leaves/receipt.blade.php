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
        <h4 class="header-title">Leave[Receipt] : {{ $leave->patient->staff_id }}</h4>

        {{-- <div class="card w-70 p-4" style="margin-top: 3%;">
            <div id="printContent">
                <!-- Your content goes here -->
             <p class="text-black">ID-CC</p>
            </div>

            <button class="mt-3 btn btn-outline-success" onclick="printDiv()">
                <i class="fa-solid fa-print"></i> Print
            </button>
        </div> --}}

        <div class="card w-70 p-4" style="margin-top: 3%;">
            <div id="printContent">
            <img src="{{ asset("images/logo.png") }}"  class="img-receipt"/>

            <div class="pt-3 text-black-100">
                <label>Staff Name</label>
                <p class="text-black"> {{ $leave->patient->name }} | {{ $leave->patient->staff_id }}</p>
            </div>

            <div class="pt-3">
                <label>Medical Leave</label>
                <p class="text-black"> {{ $leave->comment }}</p>
            </div>

            <div class="pt-3">
                <label>Date of Leave</label>
                <p class="text-black"> {{ $leave->updated_at->format('F j, Y  h:i') }} </p>
            </div>

            <div class="pt-3">
                <label>Prepared By</label>
                <p class="text-black"> {{ auth()->user()->name }}</p>
            </div>

            <div class="pt-3">
                <label>Signed By:</label>

                <hr class="text-black" />
            </div>

            </div>

            <button class="mt-3 btn btn-outline-success" onclick="printDiv('printContent')">
                <i class="fa-solid fa-print"></i> Print
            </button>
        </div>


        <div>

    </div>
</div>
<script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        // Restore the original content after printing is done
        document.body.innerHTML = originalContents;
    }
</script>
</body>
@endsection
