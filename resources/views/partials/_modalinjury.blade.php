<!-- Modal -->
<div class="modal fade text-uppercase" id="injuryModal{{$injury->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">{{$injury->patient->staff_id}} : Injury</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/injuries/{{ $injury->id }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-3">Injury [Type] </label>
                            <textarea
                            type="text"
                            class="form-control text-uppercase"
                            name="injury"
                            placeholder="Example: Broke Her Leg" value="{{old('injury')}}"
                            id=""
                            >{{$injury->injury}}
                        </textarea>
                            @error('injury')
                            <p class="text-danger text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="mt-3">Treatment</label>
                            <textarea
                            type="text"
                            class="form-control text-uppercase"
                            name="treatment"
                            placeholder="Example: Poor " value="{{old('treatment')}}"
                            id=""
                            >{{$injury->treatment}}</textarea>
                            @error('treatment')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Medication</label>
                                <textarea
                                type="text"
                                class="form-control text-uppercase"
                                name="medications"
                                placeholder="" value="{{old('medications')}}"
                                id=""
                                >{{$injury->medications}}</textarea>
                                @error('medications')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mt-3">Cost Total</label>
                                <input
                                type="number"
                                class="form-control text-uppercase"
                                name="cost_total"
                                placeholder="" value="{{$injury->cost_total}}"
                                id=""
                                />
                                @error('cost_total')
                                <p class="text-danger text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
        </form>
            </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade text-uppercase" id="eyeinjuryModal{{$injury->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">{{$injury->patient->staff_id}} : Injury</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mt-3">Injury [Type] </label>
                            <h4>{{$injury->injury}}
                            </h4>

                        </div>
                        <div class="form-group">
                            <label class="mt-3">Treatment</label>
                            <h4>{{ $injury->treatment }}</h4>
                            </div>
                            <div class="form-group">
                                <label class="mt-3">Medication</label>
                                <h4>{{ $injury->medications }}</h4>
                            </div>

                            <div class="form-group">
                                <label class="mt-3">Cost Total</label>
                                <h4>{{$injury->cost_total}}</h4>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                    </div>
        </form>
            </div>
    </div>
  </div>

