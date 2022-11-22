@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card o-hidden my-5 border-0 shadow-lg">
                    {{-- Load TinyMCE --}}
                    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
                        referrerpolicy="origin"></script>

                    <form method="POST" action="/profiles/{{ $profile->id }}">
                        @csrf
                        @method('PUT')
                        <div class="container-fluid">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col">
                                    <div class="row g-0">
                                        <div class="card-body text-black">
                                            <h4 class="mb-3">Basic Information</h4>

                                            <div class="row g-2">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" id="name">First Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $profile['name'] }}" id="name">
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label" id="surname">Last Name</label>
                                                    <input type="text" class="form-control" name="surname"
                                                        value="{{ $profile['surname'] }}" id="surname">
                                                    @error('surname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-3">
                                                    <label class="form-label" id="dob">Date of Birth</label>
                                                    <input type="date" id="dob" class="form-control" name="dob"
                                                        value="{{ $profile['dob'] }}">
                                                    @error('dob')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label class="form-label" id="pps_number">PPS Number</label>
                                                    <input type="text" class="form-control" name="pps_number"
                                                        id="pps_number" value="{{ $profile['pps_number'] }}">
                                                    @error('pps_number')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <span class="font-13 text-muted">e.g "xxxxxx-xx" or "InProgress"</span>
                                                </div>
                                                <div class="col">
                                                    <label class="form-label" id="phone">Phone Number</label>
                                                    <input type="number" class="form-control" name="phone" id="phone"
                                                        value="{{ $profile['phone'] }}">
                                                    @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label class="form-label" id="email">E-mail Address</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        value="{{ $profile['email'] }}">
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="alternative_email">Alternative E-mail
                                                        Address</label>
                                                    <input type="alternative_email" class="form-control"
                                                        name="alternative_email" id="alternative_email"
                                                        value="{{ $profile['alternative_email'] }}">
                                                    @error('alternative_email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="form-label" id="address">Full Address</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                        value="{{ $profile['address'] }}">
                                                    @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="city">City</label>
                                                    <input type="text" class="form-control" name="city" id="city"
                                                        value="{{ $profile['city'] }}">
                                                    @error('city')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="country">Country</label>
                                                    <input type="text" class="form-control" name="country"
                                                        id="country" value="{{ $profile['country'] }}">
                                                    @error('country')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="postcode">Postal Code</label>
                                                    <input type="text" class="form-control" data-toggle="input-mask"
                                                        data-mask-format="A00-AAAA" maxlength="7" name="postcode"
                                                        id="postcode" value="{{ $profile['postcode'] }}">
                                                    @error('postcode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
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
                                                    <label class="form-label" id="employment_status">Status</label>
                                                    <select class="form-select" name="employment_status"
                                                        id="employment_status">
                                                        <option value="{{ $profile['employment_status'] }}">
                                                            {{ $profile['employment_status'] ? $profile['employment_status'] : 'Select' }}
                                                        </option>
                                                        <option value="Employed">Employed</option>
                                                        <option value="Unemployed">Unemployed</option>
                                                        <option value="Student">Student</option>
                                                        <option value="Retired">Retired</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    @error('employment_status')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="employment_sector">Sector</label>
                                                    <select class="form-select" name="employment_sector"
                                                        id="employment_sector">
                                                        {{-- 'Accounting', 'Banking', 'Construction', 'Education', 'Engineering', 'Finance', 'Healthcare', 'Hospitality', 'IT', 'Legal', 'Manufacturing', 'Marketing', 'Media', 'Property', 'Retail', 'Sales', 'Science', 'Transport', 'Other' --}}
                                                        <option value="{{ $profile['employment_sector'] }}">
                                                            {{ $profile['employment_sector'] ? $profile['employment_sector'] : 'Select' }}
                                                        </option>
                                                        <option value="Accounting">Accounting</option>
                                                        <option value="Banking">Banking</option>
                                                        <option value="Construction">Construction</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Healthcare">Healthcare</option>
                                                        <option value="Hospitality">Hospitality</option>
                                                        <option value="IT">IT</option>
                                                        <option value="Legal">Legal</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Media">Media</option>
                                                        <option value="Property">Property</option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="Science">Science</option>
                                                        <option value="Transport">Transport</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    @error('employment_sector')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="employment_position">Position</label>
                                                    <input type="text" class="form-control" id="employment_position"
                                                        name="employment_position"
                                                        value="{{ $profile['employment_position'] }}">
                                                    @error('employment_position')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label class="form-label" id="employment_company">Company</label>
                                                    <input type="text" class="form-control" id="employment_company"
                                                        name="employment_company"
                                                        value="{{ $profile['employment_company'] }}">
                                                    @error('employment_company')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="employment_phone">Phone</label>
                                                    <input type="number" class="form-control" id="employment_phone"
                                                        name="employment_phone"
                                                        value="{{ $profile['employment_phone'] }}">
                                                    @error('employment_phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="employment_start_date">Start
                                                        Date</label>
                                                    <input type="date" class="form-control" id="employment_start_date"
                                                        name="employment_start_date"
                                                        value="{{ $profile['employment_start_date'] }}">
                                                    @error('employment_start_date')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label class="form-label" id="income">Income</label>
                                                    <input type="number" class="form-control" id="income"
                                                        name="income" value="{{ $profile['income'] }}">
                                                    <span class="font-13 text-muted">Monthly Income</span>
                                                    @error('income')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="extra_income">Extra Income</label>
                                                    <input type="number" class="form-control" id="extra_income"
                                                        name="extra_income" value="{{ $profile['extra_income'] }}">
                                                    <span class="font-13 text-muted">Monthly Income</span>
                                                    @error('extra_income')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label" id="extra_income_source">Extra Income
                                                        Details</label>
                                                    <input type="text" class="form-control" id="extra_income_source"
                                                        name="extra_income_source"
                                                        value="{{ $profile['extra_income_source'] }}">
                                                    @error('extra_income_source')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <h4 class="mb-3">Aditional Information</h4>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label class="form-label" id="landlord_name">Landlord Name</label>
                                                        <input type="text" class="form-control" id="landlord_name"
                                                            name="landlord_name" value="{{ $profile['landlord_name'] }}">
                                                        @error('landlord_name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col mb-2">
                                                        <label class="form-label" id="landlord_phone">Landlord
                                                            Phone</label>
                                                        <input type="number" class="form-control" id="landlord_phone"
                                                            name="landlord_phone"
                                                            value="{{ $profile['landlord_phone'] }}">
                                                        @error('landlord_phone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="form-label" id="preferred_move_out_date">Move Out
                                                            Date</label>
                                                        <input type="date" class="form-control"
                                                            id="preferred_move_out_date" name="preferred_move_out_date"
                                                            value="{{ $profile['preferred_move_out_date'] }}">
                                                        @error('preferred_move_out_date')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <h4 class="mb-3">Extra Details</h4>

                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label" id="children">Children</label>
                                                        <select class="form-select" id="children" name="children">
                                                            <option value="{{ $profile['children'] }}">
                                                                {{ $profile['children'] != null ? $profile['children'] : 'Select' }}
                                                            </option>
                                                            <option value="0">No</option>
                                                            <option value="1">Yes</option>
                                                        </select>
                                                        @error('children')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 mb-2">
                                                        <label class="form-label" id="children_age">Children Age</label>
                                                        <input type="number" class="form-control" id="children_age"
                                                            name="children_age" value="{{ $profile['children_age'] }}">
                                                        @error('children_age')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label" id="car">Car</label>
                                                        <select class="form-select" id="car" name="car">
                                                            <option value="{{ $profile['car'] }}">
                                                                {{ $profile['car'] != null ? $profile['car'] : 'Select' }}
                                                            </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        @error('car')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label" id="pet">Pet</label>
                                                        <select class="form-select" id="pet" name="pet">
                                                            <option value="{{ $profile['pet'] }}">
                                                                {{ $profile['pet'] != null ? $profile['pet'] : 'Select' }}
                                                            </option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        @error('pet')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label" id="pet_breed">Breed</label>
                                                        <input type="text" class="form-control" id="pet_breed"
                                                            name="pet_breed" value="{{ $profile['pet_breed'] }}">
                                                        @error('pet_breed')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <h4 class="mb-3">Allowances</h4>

                                                <div class="row">
                                                    <div class="col">
                                                        <label class="form-label" id="HAP">HAP</label>
                                                        <select class="form-select" id="HAP" name="HAP">
                                                            <option value="{{ $profile['HAP'] == '1' ? '1' : '0' }}">
                                                                {{ $profile['HAP'] == '1' ? 'Yes' : 'No' }}</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        @error('HAP')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="form-label" id="HAP_allowance">HAP Allowance</label>
                                                        <input type="number" class="form-control" id="HAP_allowance"
                                                            name="HAP_allowance" value="{{ $profile['HAP_allowance'] }}">
                                                        @error('HAP_allowance')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <label class="form-label" id="waiting_list">Waiting List( Do you
                                                            wish to be placed
                                                            in the waiting list in case of this property is not available
                                                            anymore? You will
                                                            receive an email as soon as one property suitable became
                                                            available):</label>

                                                        </label>
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="inlineRadioWaitingList" value="Yes"
                                                                    name="waiting_list"
                                                                    {{ $profile['waiting_list'] == 'yes' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="inlineRadioWaitingList1">Yes</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    id="inlineRadioWaitingList" value="No"
                                                                    name="waiting_list"
                                                                    {{ $profile['waiting_list'] == 'yes' ? '' : 'checked' }}>

                                                                <label class="form-check-label"
                                                                    for="inlineRadioWaitingList2">No</label>
                                                            </div>
                                                        </div>
                                                        @error('waiting_list')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label class="form-label">Notes</label>
                                                        <textarea class="form-control" id="tinyTextArea" rows="5" name="notes" maxlength="255">{{ $profile['notes'] }}</textarea>
                                                    </div>
                                                </div>
                                                <ul class="list-inline">
                                                    <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                                                    <button type="submit" class="btn btn-primary float-end">Save</button>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <script>
                        tinymce.init({
                            selector: '#tinyTextArea',
                            //toolbar_location: 'bottom',
                            visual: false,
                            menubar: false,
                            statusbar: false,
                            height: 300,
                        });
                    </script>

                </div>
            </div>
        </div>

    </div>
@endsection
