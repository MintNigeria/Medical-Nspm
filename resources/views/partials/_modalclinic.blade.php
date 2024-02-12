<!-- Modal -->
<div class="modal fade text-uppercase" id="clinicModal{{$clinic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Clinic Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/clinics/{{ $clinic->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{ $clinic->name }}">
                    @error('name')
                    <p class="text-danger  mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mt-3">tYPE</label>
                    <select name="type" class="text-uppercase form-control" searchable="Search here.." required>
                        <option value="" @if ($clinic->type == "") selected @endif>Choose ...</option>
                        <option value="Internal Lagos" @if ($clinic->type == "Internal Lagos") selected @endif>Internal Lagos</option>
                        <option value="Internal Abuja" @if ($clinic->type == "Internal Abuja") selected @endif>Internal Abuja</option>
                        <option value="General Clinic" @if ($clinic->type == "General Clinic") selected @endif>General Clinic</option>
                        <option value="Dental Clinic" @if ($clinic->type == "Dental Clinic") selected @endif>Dental Clinic</option>
                        <option value="Cardiology Clinic" @if ($clinic->type == "Cardiology Clinic") selected @endif>Cardiology Clinic</option>
                        <option value="Dermatology Clinic" @if ($clinic->type == "Dermatology Clinic") selected @endif>Dermatology Clinic</option>
                        <option value="Orthopedic Clinic" @if ($clinic->type == "Orthopedic Clinic") selected @endif>Orthopedic Clinic</option>
                        <option value="Pediatric Clinic" @if ($clinic->type == "Pediatric Clinic") selected @endif>Pediatric Clinic</option>
                        <option value="Psychiatry Clinic" @if ($clinic->type == "Psychiatry Clinic") selected @endif>Psychiatry Clinic</option>
                        <option value="Urology Clinic" @if ($clinic->type == "Urology Clinic") selected @endif>Urology Clinic</option>
                        <option value="Obstetrics & Gynecology Clinic" @if ($clinic->type == "Obstetrics & Gynecology Clinic") selected @endif>Obstetrics & Gynecology Clinic</option>
                        <option value="Oncology Clinic" @if ($clinic->type == "Oncology Clinic") selected @endif>Oncology Clinic</option>
                        <option value="Gastroenterology Clinic" @if ($clinic->type == "Gastroenterology Clinic") selected @endif>Gastroenterology Clinic</option>
                        <option value="ENT Clinic" @if ($clinic->type == "ENT Clinic") selected @endif>ENT Clinic</option>
                        <option value="Chiropractic Clinic" @if ($clinic->type == "Chiropractic Clinic") selected @endif>Chiropractic Clinic</option>
                        <option value="Geriatric Clinic" @if ($clinic->type == "Geriatric Clinic") selected @endif>Geriatric Clinic</option>
                        <option value="Aesthetic or Cosmetic Clinic" @if ($clinic->type == "Aesthetic or Cosmetic Clinic") selected @endif>Aesthetic or Cosmetic Clinic</option>
                        <option value="Pain Clinic" @if ($clinic->type == "Pain Clinic") selected @endif>Pain Clinic</option>
                        <option value="Holistic or Integrative Medicine Clinic" @if ($clinic->type == "Holistic or Integrative Medicine Clinic") selected @endif>Holistic or Integrative Medicine Clinic</option>
                        <option value="Addiction Treatment Clinic" @if ($clinic->type == "Addiction Treatment Clinic") selected @endif>Addiction Treatment Clinic</option>
                        <option value="Immunization Clinic" @if ($clinic->type == "Immunization Clinic") selected @endif>Immunization Clinic</option>
                        <option value="Genetics Clinic" @if ($clinic->type == "Genetics Clinic") selected @endif>Genetics Clinic</option>
                        <option value="Wound Care Clinic" @if ($clinic->type == "Wound Care Clinic") selected @endif>Wound Care Clinic</option>
                        <option value="Diagnostic Imaging Clinic" @if ($clinic->type == "Diagnostic Imaging Clinic") selected @endif>Diagnostic Imaging Clinic</option>
                        <option value="Pulmonary Clinic" @if ($clinic->type == "Pulmonary Clinic") selected @endif>Pulmonary Clinic</option>
                        <option value="Endocrinology Clinic" @if ($clinic->type == "Endocrinology Clinic") selected @endif>Endocrinology Clinic</option>
                        <option value="Infertility Clinic" @if ($clinic->type == "Infertility Clinic") selected @endif>Infertility Clinic</option>
                    </select>
                    @error('type')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
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
<div class="modal fade text-uppercase" id="eyeclinicModal{{$clinic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-bluedark">
                <h5 class="modal-title" id="exampleModalLabel">Clinic Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/clinics/{{ $clinic->id }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">

                <div class="form-group">
                    <label>Name</label>
                    <h4>{{ $clinic->name }}</h4>
                </div>

                <div class="form-group">
                    <label class="mt-3">tYPE</label>
                    <h4>{{ $clinic->type }}</h4>
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

