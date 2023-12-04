

<div class="sidebar bg-color">
    <div class="top">
        <i class="fas fa-dna bg-color"></i>
        {{ auth()->user()->locality }}
    </div>
    <div class="sidebar_central">
        <ul class="">

            @if (auth()->user()->role === "nurse")
                <li>
                    <a href="/records">New Record</a>
                </li>

                <li>
                    <a href="/records/nurse_mgmt">Nurse Mgmt</a>
                </li>
                <li>
                    <a href="/injuries">Injury Records</a>
                </li>

                <li>
                    <a href="/leaves">Sick Leave</a>
                </li>


            @endif

            @if(auth()->user()->role == "pharmacy-admin")
            <li>
                <a href="/inventory">Inventories</a>
            </li>
            <li>
                <a href="/pharmacy">Pharmacy</a>
            </li>
            <li>
                <a href="/grouping">Pha-Grouping</a>
            </li>
            <li>
                <a href="/inventory/stock_low">Out Stocks</a>
            </li>
            @endif


            @if(auth()->user()->role === "pharmacy")

            <li>
                <a href="/inventory">Inventories</a>
            </li>

            <li>
                <a href="/pharmacy">Pharmacy</a>
            </li>
            <li>
                <a href="/grouping">Pha-Grouping</a>
            </li>
            <li>
                <a href="/inventory/stock_low">Out Stocks</a>
            </li>
            <li>
                <a href="/records/pharmacy">Requests</a>
            </li>


            @endif

            @if(auth()->user()->role === "him")

            <li>

                <a href="/patient">Patients</a>
            </li>

            <li>
                <a href="/users">Users</a>
            </li>

            <li>
                <a href="/clinics">Clinics</a>
            </li>

            <li>
                <a href="/records/receipt">Receipts</a>
            </li>


            @endif

            @if(auth()->user()->role === "doctor")
            <li>
                <a href="/records/manage">View Records</a>
            </li>

            <li>
                <a href="/dependents/">Dependents</a>
            </li>

            <li>
                <a href="/users">Users</a>
            </li>


            @endif

            @if(auth()->user()->role == "admin")

                <li>
                    {{-- <i class="fas fa-history"></i> --}}
                    <a href="/admin">Medical Admin</a>
                </li>
            @endif


        </ul>


        <form class="inline bottom" method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn-danger btn z-30">
                <i class="fa fa-sign-out" style="font-size: 30;">
                </i>
                <b style="font-size: 15px">Logout</b>
            </button>
          </form>





    </div>










</div>
