

<div class="sidebar bg-color">
    <div class="top">
        <i class="fas fa-dna bg-color"></i>
    </div>

    <div class="sidebar_central">
        <ul class="">
            {{-- @if (auth()->user()->role == 'nurse') --}}
            {{-- <li> --}}
                {{-- <a href="/records">Records</a> --}}
                    {{-- <i class="fas fa-hospital"></i></a> --}}
            {{-- </li> --}}

            <li>
                {{-- <i class="fas fa-crutch"></i> --}}
                <a href="/injuries">Injury Records</a>
            </li>

            <li>
                {{-- <i class="fas fa-hospital"></i> --}}
                <a href="/records/nurse_mgmt">Nurse Mgmt</a>
            </li>




         {{-- @elseif (auth()->user()->role == 'pharmacy') --}}
         <li>
            {{-- <i class="fas fa-kit-medical"></i> --}}
            <a href="/inventory">Inventories</a>
        </li>

            <li>
                {{-- <i class="fas fa-kit-medical"></i> --}}
                <a href="/pharmacy">Pharmacy</a>
        </li>

        <li >
            {{-- <i class="fas fa-kit-medical"></i> --}}
            <a href="/records/pharmacy">Requests</a>
        </li>

        {{-- @elseif (auth()->user()->role == 'doctor') --}}

        <li>
            {{-- <i class="fas fa-heart-pulse mr-3"></i> --}}
            <a href="/records/manage">View Records</a>
        </li>

        <li>
            {{-- <i class="fas fa-heart-pulse"></i> --}}
            <a href="/leaves">Sick Leave</a>
        </li>


        {{-- @elseif (auth()->user()->role == 'him') --}}

            <li>

                <a href="/patient">Patients</a>
                    {{-- <i class="fas fa-thermometer"></i></a> --}}
            </li>

            <li>
                {{-- <i class="fas fa-pump-medical"></i> --}}
                <a href="/records/receipt">Receipts</a>
            </li>

            <li>
                {{-- <i class="fas fa-users"></i> --}}
                <a href="/users">Users</a>
            </li>




            <li>
                {{-- <i class="fas fa-users"></i> --}}
                <a href="/clinics">Clinics</a>
            </li>



        {{-- @endif --}}


                <li>
                    {{-- <i class="fas fa-history"></i> --}}
                    <a href="/admin">Medical Admin</a>
                </li>

        <li>
                    {{-- <i class="fas fa-history"></i> --}}
                    <a href="/leaves">History Logs</a>
                </li>
        </ul>


    </div>



    <div class="bottom">
        <form class="inline" method="POST" action="/logout">
            @csrf
            <button type="submit" class="header btn">
                <i class="fa fa-sign-out mr-1" style="font-size: 30;">
                </i>
                <b style="font-size: 15px ml-5">Logout</b>
            </button>
          </form>
    </div>






</div>
