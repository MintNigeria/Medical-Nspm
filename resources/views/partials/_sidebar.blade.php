
<div class="sidebar" style="flex-direction: column;">
    <div class="top" style="position: absolute; top: 0;padding-top:12px;color:#ffa000;align-items:center;">
      <h4 class="mb-5"><i class="fas fa-dna"></i> Medical Nspm</h4>
    </div>
    @if (auth()->user()->role == 'medical_admin')
         <li class="mt-2" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
            <i class="fas fa-dashboard" style="font-size: 20px;"></i>
            <a href="/home" class="text-white" style="font-size: 20px;">Dashboard</a>
        </li>
    @endif
    <div class="mt-5" style="display: flex;align-items:center;justify-content:center;">
      <ul style="padding:5;">


        @if (auth()->user()->role == 'nurse')
            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-hospital" style="font-size: 20px;"></i>
                <a href="/records" class="text-white" style="font-size: 20px;">Records</a>
            </li>

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-crutch" style="font-size: 20px;"></i>
                <a href="/injuries/create" class="text-white" style="font-size: 20px;">Injury Records</a>
            </li>

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-hospital" style="font-size: 20px;"></i>
                <a href="/records/nurse_mgmt" class="text-white" style="font-size: 20px;">Nurse Mgmt</a>
            </li>




         @elseif (auth()->user()->role == 'pharmacy')
         <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
            <i class="fas fa-kit-medical" style="font-size: 20px;"></i>
            <a href="/inventory" class="text-white" style="font-size: 20px;">Inventories</a>
        </li>

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-kit-medical" style="font-size: 20px;"></i>
                <a href="/pharmacy" class="text-white" style="font-size: 20px;">Pharmacy</a>
        </li>

        <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
            <i class="fas fa-kit-medical" style="font-size: 20px;"></i>
            <a href="/records/pharmacy" class="text-white" style="font-size: 20px;">Requests</a>
        </li>

        @elseif (auth()->user()->role == 'doctor')

        <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
            <i class="fas fa-viruses" style="font-size: 20px;"></i>
            <a href="/records/manage" class="text-white" style="font-size: 20px;">Open Records</a>
        </li>

        <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
            <i class="fas fa-heart-pulse" style="font-size: 20px;"></i>
            <a href="/leaves" class="text-white" style="font-size: 20px;">Sick Leave</a>
        </li>


        @elseif (auth()->user()->role == 'him')

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-thermometer" style="font-size: 20px;"></i>
                <a href="/patient" class="text-white" style="font-size: 20px;">Patient</a>
            </li>

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-pump-medical" style="font-size: 20px;"></i>
                <a href="/records/receipt" class="text-white" style="font-size: 20px;">Receipts</a>
            </li>

            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-users" style="font-size: 20px;"></i>
                <a href="/users" class="text-white" style="font-size: 20px;">Users</a>
            </li>




            <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                <i class="fas fa-users" style="font-size: 20px;"></i>
                <a href="/clinics" class="text-white" style="font-size: 20px;">Clinics</a>
            </li>



        @endif


                <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                    <i class="fas fa-history" style="font-size: 20px;"></i>
                    <a href="/admin" class="text-white" style="font-size: 20px;">Medical Admin</a>
                </li>

        <li class="mt-4" style="display: flex; align-items:center;justify-content:space-between;color:whitesmoke;">
                    <i class="fas fa-history" style="font-size: 20px;"></i>
                    <a href="/leaves" class="text-white" style="font-size: 20px;">History Logs</a>
                </li>


      </ul>
    </div>

    <div class="top mt-4">
      <div class="links display-flex" style="cursor: pointer;font-size: 30px;padding: 10px;">


        <form class="inline" method="POST" action="/logout">
            @csrf
            <button type="submit" class="header btn" style="position: absolute; bottom:2px;">
                <i class="fa fa-sign-out mr-1" style="font-size: 30;">
                </i>
                <b style="font-size: 15px ml-5">Logout</b>
            </button>
          </form>


      </div>
    </div>
  </div>
