<!-- Modal -->
<div class="modal fade text-uppercase" id="feedbackModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label>Type</label>
            <p>{{ $feedback->feedback_type }}</p>
        </div>
        @if($feedback->clinic_doctor)
        <div class="form-group">
            <label>Doctor</label>
            <p>{{ $feedback->clinic_doctor }}</p>
        </div>
        @endif
        @if($feedback->clinic_location)
        <div class="form-group">
            <label>Clinic Location</label>
            <p>{{ $feedback->clinic_location }}</p>
        </div>
        @endif
        @if($feedback->observation)
        <div class="form-group">
            <label>Observation</label>
            <p>{{ $feedback->observation }}</p>
        </div>
        @endif
        @if($feedback->detected_illness)
        <div class="form-group">
            <label>Detected illness</label>
            <p>{{ $feedback->detected_illness }}</p>
        </div>
        @endif
        @if($feedback->consultation)
        <div class="form-group">
            <label>Consultation</label>
            <p>{{ $feedback->consultation }}</p>
        </div>
        @endif
        @if($feedback->next_action)
        <div class="form-group">
            <label>Next Action</label>
            <p>{{ $feedback->next_action }}</p>
        </div>
        @endif
        <div class="form-group">
            <label>Date Created</label>
            <p>{{ $feedback->created_at }}</p>
        </div>








        </div>

      </div>
    </div>
  </div>
