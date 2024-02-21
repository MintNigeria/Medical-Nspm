            @extends('layout')

            @section('content')

            <body>
            <div class="dashboard">
            @include('partials._sidebar')
            <div class="content p-3">
            <div style="display: flex; align-items:center; justify-content:space-between;">
            <h4>RECORDS [Receipts Needed]</h4>
            <a href="/receipts" class="btn btn-success">

            View Receipts

            </a>
            </div>

            <div class="">
            <div class="">
            <div class="card">
            <div class="card-header bg-color">
            CREATE NEW RECORD
            </div>
            <div class="card-body">
            <form method="POST" action="/receipts/{record}/">
            @csrf
            <div>
            <div class="form-group">
            <label>Staff ID</label>
            <select class="js-example-basic-single text-uppercase form-control" searchable="Search Here .." data-filter="true" name="patient_id">
            <option value="">Choose ...</option>
            @unless (count($records) === 0)
            @foreach ($records as $record)
            <option value="{{ $record->patient->id }}">{{ $record->patient->staff_id }}</option>
            @endforeach
            @endunless
            </select>
            @error('patient_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>


            <div class="form-group">
            <label class="my-3">Is Dependent </label>
            <!-- Default radio -->
            <div class="form-check">
            <input class="form-check-input" type="radio"name="is_dependent" value="yes" />
            <label class="form-check-label" for="flexRadioDefault1"> Yes, Is Dependent</label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio"name="is_dependent" value="no" />
            <label class="form-check-label" for="flexRadioDefault1"> No, Not A Dependent</label>
            </div>

            @error('is_dependent')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group">
            <label class="mt-4">Cost</label>
            <input
            type="number"
            class="form-control text-uppercase"
            name="cost"
            id=""
            />
            @error('cost')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>


            <button  class="mt-5 btn btn-success">
            RECORD Receipt
            </button>

            </div>
            </div>
            </div>
            </form>

            <div class="card-footer"></div>

            </div>
            </div>

            </div>
            </div>
            </body>

            @endsection
