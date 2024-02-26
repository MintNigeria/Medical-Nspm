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
                          <p class="card-text preview__text">
                                 <div style="display:flex;align-items:center;justify-content:space-between;margin:4px 10px;"><b>Processed By</b> : <span>{{ $management->record->processing_by }} </span></div>
                               
                          </p>
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