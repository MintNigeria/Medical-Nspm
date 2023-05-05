<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $receipt->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">VIEW RECEIPTS</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert-primary p-4 mt-1">
                {{ $receipt->record->clinic_location }}
            </div>
            <div class="alert-primary  p-4 mt-1">
                    {{ $receipt->prescription }}
            </div>

            <div class="alert-primary  p-4 mt-1">
                {{ $receipt->cost }}
        </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
