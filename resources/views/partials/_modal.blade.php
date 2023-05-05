<!-- Modal -->
<div class="modal fade text-uppercase" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $record->patient->name }}</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert-primary p-2">
                <p >
                    {{ $record->patient->name }}
                </p>
            </div>
            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $record->patient->staff_id }}
                </p>
            </div>
            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $record->patient->address }}
                </p>
            </div>
            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $record->patient->address }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                    {{ $record->patient->contact }}
                </p>
            </div>

            <div class="alert-primary p-2 mt-1">
                <p >
                   No of Records " {{ $record->count() }} "
                </p>
            </div>
        </div>

      </div>
    </div>
  </div>

