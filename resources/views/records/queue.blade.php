@extends('layout')

@section('content')
<div class="dashboard">
    @include('partials._sidebar')
    <div class="content p-3">
        <div id="content__overflow">
            <div style="display: flex; align-items:center;justify-content:space-between">
                <h4 class="header-title"> OPEN RECORDS</h4>
                <div>
                        <a href="/records/queue" class="btn btn-white">
                             <span id="timer" class="text-danger"></span>
                            <i class="fas fa-hourglass text-primary"></i>
                        </a>
                </div>

            </div>

            <div style="display:grid; grid-template-columns: auto auto auto auto;margin:20px 0;" >
                @unless (count($records) === 0)
                    @foreach ($records as $record)
                        <div class="card p-4 mt-5 mx-3 font-weight-bold" style="color: teal;padding:10px;">
                            @if ($record->processing_by)
                                <div class="alert alert-primary">
                                    Initiated: {{ $record->processing_by }}
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    Not Yet Initiated
                                </div>
                            @endif
                            <p> NAME : {{$record->patient->name  }}</p>
                            <p> STAFF ID : {{$record->patient->staff_id  }}</p>
                        </div>
                    @endforeach
                @endunless

                <div class="mt-1 p-1">
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-refresh every 15 seconds
    setInterval(function(){
        location.reload();
    }, 15000); // 15000 milliseconds = 15 seconds

     // Timer
     let timer = 15; // Initial value in seconds

    function updateTimer() {
        document.getElementById('timer').innerText = ` ${timer}s`;
        timer--;
        if (timer < 0) {
            timer = 15; // Reset the timer to 15 seconds
        }
    }

    // Update the timer every second
setInterval(updateTimer, 1000);
</script>

@endsection
