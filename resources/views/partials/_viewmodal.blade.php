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
            {{ $receipt->record->patient->name }}
            </div>
            <div class="alert-primary p-4 mt-1">
              {{ $receipt->record->patient->staff_id }}
          </div>
          <div class="alert-primary p-4 mt-1">
            {{ $receipt->record->patient->email }}
        </div>
            <div class="alert-primary p-4 mt-1">
              @if ($receipt->record && $receipt->record->management)
                  @foreach ($receipt->record->management as $management)
                    @if($management->clinic)
                      <p>Clinic</p>
                    <p> {{ $management->clinic }} </p>
                    @endif
                    @if($management->labtest)
                      <p>Labtest</p>
                      <p>{{ $management->labtest }} </p>
                      @endif
                  @endforeach
              @else
                  No management records found
              @endif
          </div>
            <div class="alert-primary  p-4 mt-1">
              N{{ number_format($receipt->cost) }}
        </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
