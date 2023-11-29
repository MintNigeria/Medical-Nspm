
  <!-- Modal -->
<div class="modal fade text-uppercase" id="modalNotify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf
            <div class="modal-body">
                <div>
                    @if ($notifications->count() > 0)
    <div class="">
        <ul class="notify-list w-100">
            @foreach ($notifications as $notification)
                <li class="alert-info my-1 alert font-italic font-weight-light">
                    {{ $notification->data['message'] }}
                    <a href="{{ $notification->data['url'] }}">View Details</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                </div>
        </form>
            </div>
    </div>
  </div>



