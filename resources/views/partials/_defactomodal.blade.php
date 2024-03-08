 <!-- Modal -->
 {{-- @if($doctor_defacto) --}}
 <div class="modal fade text-uppercase" id="changeDoctorModal{{ $record->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
       <div class="modal-content">
         <div class="modal-header listing-header">
           <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">
             Add Defacto Doctor
         </h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <form  action="/record/{{ $record->id }}/add_defacto" method="POST">
                 @csrf
                 @method("PUT")
                     <div class="modal-body">
                         <div class="form-group mt-3" style="display: flex; flex-direction:column;">
                             @foreach($users as $user)
                             <div>
                             <input class="form-check-input" type="radio" name="processed_defacto" value="{{ $user->name }}" 
                             @if ($record->processed_defacto === $user->name)
                                 checked
                             @endif />
                                 <label class="form-check-label" for="flexRadioDefault1"> {{ strtoupper($user->name) }}</label>
                             @endforeach
                             </div>
                             @error('processed_defacto')
                             <p class="text-danger text-xs mt-1">{{$message}}</p>
                             @enderror
                     </div>
                     <div class="modal-footer">
                       <button type="submit" class="btn btn-success">Save changes</button>
                         <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">Close</button>
                     </div>
         </form>
 
         </div>
 
       </div>
     </div>
   </div>
 {{-- @endif --}}