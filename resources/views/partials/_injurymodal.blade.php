<!-- Modal -->
<div class="modal fade text-uppercase" id="injury{{ $injury->id }}Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $injury->patient->name }}</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert-primary p-2">
                <p >
                  <b>PATIENT'S NAME - </b>  {{ $injury->patient->name }}
                </p>
            </div>
            <div class="alert-primary p-2 mt-1">
                <p >
                    <b>PATIENT'S Staff_ID - </b>  {{ $injury->patient->staff_id }}
                </p>
            </div>
            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $injury->patient->address }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $injury->injury }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $injury->treatment }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $injury->medications }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                    N {{ $injury->cost_total }}
                </p>
            </div>


        </div>

      </div>
    </div>
  </div>

