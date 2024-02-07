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

        <div class="w-70 p-4 " style="margin-top: 3%;" >
            <div id="printContent" class="leave" style="background-color:rgba(127, 255, 212, 0.324); padding:10px;border-radius: 10px;">
            <div style="display:flex; align-items:center;justify-content:space-between;">
             <img src="{{ asset("images/logo.png") }}"  class="img-receipt"/>
            <h5 class="text-black font-weight-bold" style="font-weight: 900">Medical Sick Leave</h5>
            </div>

            <div class="pt-3 text-black-100">
                <label>Staff Name</label>
                <p class="text-black"> {{ $leave->patient->name }} | {{ $leave->patient->staff_id }}</p>
            </div>

            <div class="pt-3">
                <label>Medical Leave</label>
                <p class="text-black"> {{ $leave->comment }}</p>
            </div>
            <div class="pt-3">
                <label>Start</label>
            <p class="text-black">Start Date: {{ $leave->start_day }}</p>
            <p class="text-black">End Date: {{ $leave->end_day }}</p>
            </div>

            <div class="pt-3">
                <label>No of Days</label>
            <p class="text-black">{{ \Carbon\Carbon::parse($leave->end_day)->diffInDays(\Carbon\Carbon::parse($leave->start_day)) }}</p>
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

            <button class="mt-3 btn btn-outline-success" onclick="printReport()">
                <i class="fa-solid fa-print"></i> Print
            </button>
        </div>


        <div>

    </div>
</div>
<<script>
    function printReport() {
        // Add a class to handle visibility during printing
        document.querySelector('.leave').classList.add('print-visible');
        window.print();
        // Remove the added class after printing
        setTimeout(() => {
            document.querySelector('.leave').classList.remove('print-visible');
        }, 500);
    }
</script>
 <style>
    @media print {
        body * {
            visibility: hidden;
            font-size: 20px;
        }

        .leave, .leave * {
            visibility: visible;
            /* height: 100%; */
        }

    }
</style>
</body>
@endsection
