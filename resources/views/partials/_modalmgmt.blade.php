<div class="modal fade text-black-50" id="mgmtModal{{ $management->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Record : {{ $management->record->patient->staff_id }}</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/management/{{ $management->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">
                <div class="alert alert-primary">
                  {{ $management->processing_by }}
                </div>
                <div class="alert alert-primary">
                  {{ $management->processing_by }}
                </div>
                <div class="alert alert-primary">
                  {{ $management->processing_by }}
                </div>
                <div class="alert alert-primary">
                  {{ $management->processing_by }}
                </div>
                <div class="alert alert-primary">
                  {{ $management->processing_by }}
                </div>
            </div>

        </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>