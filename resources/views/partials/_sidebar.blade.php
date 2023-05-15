

<div class="sidebar">
    <div class="top">
        <i class="fas fa-dna sidebar_header"></i>
    </div>

    <div class="sidebar_central">
        <ul class="">
            @if (auth()->user()->role == 'nurse')
            <li>
                <a href="/records" class="text-white">
                    <i class="fas fa-hospital"></i></a>
            </li>

            <li>
                <i class="fas fa-crutch"></i>
                <a href="/injuries/create" class="text-white">Injury Records</a>
            </li>

            <li>
                <i class="fas fa-hospital"></i>
                <a href="/records/nurse_mgmt" class="text-white">Nurse Mgmt</a>
            </li>




         @elseif (auth()->user()->role == 'pharmacy')
         <li>
            <i class="fas fa-kit-medical"></i>
            <a href="/inventory" class="text-white">Inventories</a>
        </li>

            <li>
                <i class="fas fa-kit-medical"></i>
                <a href="/pharmacy" class="text-white">Pharmacy</a>
        </li>

        <li >
            <i class="fas fa-kit-medical"></i>
            <a href="/records/pharmacy" class="text-white">Requests</a>
        </li>

        @elseif (auth()->user()->role == 'doctor')

        <li>
            <i class="fas fa-heart-pulse mr-3"></i>
            <a href="/records/manage">View Records</a>
        </li>

        <li>
            <i class="fas fa-heart-pulse"></i>
            <a href="/leaves">Sick Leave</a>
        </li>


        @elseif (auth()->user()->role == 'him')

            <li>

                <a href="/patient" class="text-white">
                    <i class="fas fa-thermometer"></i></a>
            </li>

            <li>
                <i class="fas fa-pump-medical"></i>
                <a href="/records/receipt" class="text-white">Receipts</a>
            </li>

            <li>
                <i class="fas fa-users"></i>
                <a href="/users" class="text-white">Users</a>
            </li>




            <li>
                <i class="fas fa-users"></i>
                <a href="/clinics" class="text-white">Clinics</a>
            </li>



        @endif


                <li>
                    <i class="fas fa-history"></i>
                    <a href="/admin" class="text-white">Medical Admin</a>
                </li>

        <li>
                    <i class="fas fa-history"></i>
                    <a href="/leaves" class="text-white">History Logs</a>
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
