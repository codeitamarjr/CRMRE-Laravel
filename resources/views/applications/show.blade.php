@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col mb-4">
                <div class="card border-start-primary py-2 shadow">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold mb-1 text-xs">
                                    <span>Summary</span>
                                </div>
                                <p class="fs-6 fw-semibold mb-0">
                                    Source: Daft<br>
                                    E-mail: mail@mail.com<br>
                                    Phone: 00211031<br>
                                    Applicants:02<br>
                                    John Doen(Joint)<br>
                                    May Keen(Guarantor)
                                </p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-address-card fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-start-success py-2 shadow">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold mb-1 text-xs">
                                    <span>Affordability</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-start-warning py-2 shadow">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold mb-1 text-xs">
                                    <span>Property</span>
                                </div>
                                <p class="fs-6 fw-semibold mb-0">
                                    Property: XXXX<br>
                                    Details: 1-bed<br>
                                    Building Name<br>
                                    Rent: €1500<br>
                                    Date Available: 05/06/2000<br>
                                </p>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-building fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Profile Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col">
                                            <div class="row g-0">
                                                <div class="card-body text-black">
                                                    <h4 class="mb-3">Basic Information</h4>
                                                    <div class="row g-2">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label" id="name">First Name</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="name" value="{{ $application['name'] }}"
                                                                id="name">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label" id="surname">Last Name</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="surname" value="{{ $application['surname'] }}"
                                                                id="surname">
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="dob">Date of Birth</label>
                                                            <input type="date" id="dob"
                                                                class="form-control-plaintext" name="dob"
                                                                value="{{ $application['dob'] }}">
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label" id="pps_number">PPS Number</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="pps_number" id="pps_number"
                                                                value="{{ $application['pps_number'] }}">
                                                            <span class="font-13 text-muted">e.g "xxxxxx-xx" or
                                                                "InProgress"</span>
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-label" id="phone">Phone Number</label>
                                                            <input type="number" class="form-control-plaintext"
                                                                name="phone" id="phone"
                                                                value="{{ $application['phone'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="email">E-mail
                                                                Address</label>
                                                            <input type="email" class="form-control-plaintext"
                                                                name="email" id="email"
                                                                value="{{ $application['email'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="alternative_email">Alternative
                                                                E-mail
                                                                Address</label>
                                                            <input type="alternative_email" class="form-control-plaintext"
                                                                name="alternative_email" id="alternative_email"
                                                                value="{{ $application['alternative_email'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3">
                                                            <label class="form-label" id="address">Full Address</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="address" id="address"
                                                                value="{{ $application['address'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="city">City</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="city" id="city"
                                                                value="{{ $application['city'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="country">Country</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="country" id="country"
                                                                value="{{ $application['country'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="postcode">Postal Code</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                data-toggle="input-mask" data-mask-format="A00-AAAA"
                                                                maxlength="7" name="postcode" id="postcode"
                                                                value="{{ $application['postcode'] }}">
                                                            <span class="font-13 text-muted">e.g "xxx-xxxx"</span><br>
                                                            <span class="font-13 text-muted">
                                                                <a href="https://finder.eircode.ie/" target="_blank">Find
                                                                    Eircode</a>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <h4 class="mb-3">Employment Status</h4>

                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label"
                                                                id="employment_status">Status</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                maxlength="7" name="employment_status"
                                                                id="employment_status"
                                                                value="{{ $application['employment_status'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label"
                                                                id="employment_sector">Sector</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="{{ $application['employment_sector'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label"
                                                                id="employment_position">Position</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                id="employment_position" name="employment_position"
                                                                value="{{ $application['employment_position'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label"
                                                                id="employment_company">Company</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                id="employment_company" name="employment_company"
                                                                value="{{ $application['employment_company'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="employment_phone">Phone</label>
                                                            <input type="number" class="form-control-plaintext"
                                                                id="employment_phone" name="employment_phone"
                                                                value="{{ $application['employment_phone'] }}">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="employment_start_date">Start
                                                                Date</label>
                                                            <input type="date" class="form-control-plaintext"
                                                                id="employment_start_date" name="employment_start_date"
                                                                value="{{ $application['employment_start_date'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="income">Income</label>
                                                            <input type="number" class="form-control-plaintext"
                                                                id="income" name="income"
                                                                value="{{ $application['income'] }}">
                                                            <span class="font-13 text-muted">Monthly Income</span>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="extra_income">Extra
                                                                Income</label>
                                                            <input type="number" class="form-control-plaintext"
                                                                id="extra_income" name="extra_income"
                                                                value="{{ $application['extra_income'] }}">
                                                            <span class="font-13 text-muted">Monthly Income</span>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label class="form-label" id="extra_income_source">Extra
                                                                Income
                                                                Details</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                id="extra_income_source" name="extra_income_source"
                                                                value="{{ $application['extra_income_source'] }}">
                                                        </div>

                                                        <h4 class="mb-3">Aditional Information</h4>
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label class="form-label" id="landlord_name">Landlord
                                                                    Name</label>
                                                                <input type="text" class="form-control-plaintext"
                                                                    id="landlord_name" name="landlord_name"
                                                                    value="{{ $application['landlord_name'] }}">
                                                            </div>
                                                            <div class="col mb-2">
                                                                <label class="form-label" id="landlord_phone">Landlord
                                                                    Phone</label>
                                                                <input type="number" class="form-control-plaintext"
                                                                    id="landlord_phone" name="landlord_phone"
                                                                    value="{{ $application['landlord_phone'] }}">
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label class="form-label"
                                                                    id="preferred_move_out_date">Move
                                                                    Out
                                                                    Date</label>
                                                                <input type="date" class="form-control-plaintext"
                                                                    id="preferred_move_out_date"
                                                                    name="preferred_move_out_date"
                                                                    value="{{ $application['preferred_move_out_date'] }}">
                                                            </div>
                                                        </div>

                                                        <h4 class="mb-3">Extra Details</h4>

                                                        <div class="row">
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label" id="children">Children</label>
                                                                <input type="number" class="form-control-plaintext"
                                                                    value="{{ $application['children'] }}">
                                                            </div>
                                                            <div class="col-md-3 mb-2">
                                                                <label class="form-label" id="children_age">Children
                                                                    Age</label>
                                                                <input type="number" class="form-control-plaintext"
                                                                    id="children_age" name="children_age"
                                                                    value="{{ $application['children_age'] }}">
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label" id="car">Car</label>
                                                                <input type="text" class="form-control-plaintext"
                                                                    value="{{ $application['car'] }}">
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label" id="pet">Pet</label>
                                                                <input type="text" class="form-control-plaintext"
                                                                    value="{{ $application['pet'] }}">
                                                            </div>
                                                            <div class="col-md-4 mb-3">
                                                                <label class="form-label" id="pet_breed">Breed</label>
                                                                <input type="text" class="form-control-plaintext"
                                                                    id="pet_breed" name="pet_breed"
                                                                    value="{{ $application['pet_breed'] }}">
                                                            </div>
                                                        </div>

                                                        <h4 class="mb-3">Allowances</h4>

                                                        <div class="row">
                                                            <div class="col">
                                                                <label class="form-label" id="HAP">HAP</label>
                                                                <input type="text" class="form-control-plaintext"
                                                                    value="{{ $application['HAP'] }}">
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label class="form-label" id="HAP_allowance">HAP
                                                                    Allowance</label>
                                                                <input type="number" class="form-control-plaintext"
                                                                    id="HAP_allowance" name="HAP_allowance"
                                                                    value="{{ $application['HAP_allowance'] }}">
                                                            </div>
                                                        </div>


                                                        <div class="col">
                                                            <div class="row mb-3">
                                                                <label class="form-label" id="waiting_list">Waiting List(
                                                                    Do
                                                                    you wish to be placed
                                                                    in the waiting list in case of this property is not
                                                                    available anymore? You will
                                                                    receive an email as soon as one property suitable became
                                                                    available):</label>

                                                                </label>
                                                                <div class="col">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="inlineRadioOptions" value="Yes"
                                                                            name="waiting_list">
                                                                        <label class="form-check-label"
                                                                            for="inlineRadioOptions1">Yes</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="inlineRadioOptions" value="No"
                                                                            name="waiting_list">

                                                                        <label class="form-check-label"
                                                                            for="inlineRadioOptions2">No</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-3">
                                                                <label class="form-label">Notes</label>
                                                                <textarea class="form-control-plaintext" id="tinyTextArea" rows="5" name="notes" maxlength="255">{{ $application['notes'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline">
                                                            <a href="javascript:history.back()"
                                                                class="btn btn-primary btn-sm float-end">Back</a>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: '#tinyTextArea',
            visual: false,
            menubar: false,
            statusbar: false,
            height: 600,
            noneditable_class: ‘uneditable ',
        });
    </script>
@endsection
