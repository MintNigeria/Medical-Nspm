@extends("layout")
@section("content")

<body>
    <div class="dashboard">
        @include('partials._sidebar')
        <div class="content px-5 mb-4" id="content__overflow">
            <div
              class="font-weight-bold"
              style="
                  display: flex;
                  align-items: center;
                  justify-content: space-between;
                  margin:10px 0;
              "
            >
            <h4 class="header-title">Listings</h4>
            </div>

            @unless (count($management) === 0)
                <div class="preview__grid">
                    @foreach ($management as $management)
                    <div class="card my-2">
                        <div class="card-body">
                          <a href="/management/{{ $management->id }}/edit" style="position:absolute;top:2px;right:3px;color:#000;">
                            <i class="fas fa-edit"></i>
                          </a>
                          @include('partials._modalmgmt')
                          <p class="card-text preview__text">
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><b>Processed By</b> : <span>{{ $management->processing_by }} </span></div>
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><b>Nurse Management</b> : <span><x-nurse-mgmt :nurse_mgmtCsv="$management->nurse_mgmt" /> </span></div>
                              <hr />
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><b>Prescription</b> : <span><x-prescription-list :drugs_mgmtCsv="$management->prescription" /> </span></div>
                              <hr />
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><b>Referrals</b></div>
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><span>TEST</span><span>{{ $management->labtest }}</span></div>
                              <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><span>Retainer Hospital</span><span>{{ $management->clinic }}</span></div>
                          </p>
                        </div>

                        <div class="card-footer">
                          @if($management->flag_nurse)
                            <p class="text-black text-capitalize">Nurse: </p>
                            
                            <div class="alert alert-primary">
                                <p> Note: {{ $management->nurse_notes }}</p>
                                <p>State: {{ $management->flag_nurse }}</p>
                            </div>

                            @endif

                            @if($management->flag_prescription)
                            <p class="text-black text-capitalize">Prescription: </p>
                            
                            <div class="alert alert-primary">
                                <p> Note: {{ $management->pharmacy_notes }}</p>
                                <p>State: {{ $management->flag_prescription }}</p>
                            </div>
                            @endif
                        </div>
                      </div>
                    @endforeach
                </div>



            @endunless
            <div class="mt-5">
                {{-- {{ $management->links() }} --}}
            </div>

    </div>


@endsection