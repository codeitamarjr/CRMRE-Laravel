@extends('layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image"
                                style="background-image: url(/assets/img/Photo_by_Naomi_Hebert_on_Unsplash.jpg);">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form method="POST">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col">
                                            <div class="row g-0">
                                                <div class="card-body text-black">
                                                    <h4 class="mb-3">Basic Information</h4>

                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control" required=""
                                                                placeholder="First Name" name="firstName">
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" required=""
                                                                placeholder="Surname" name="lastName">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" class="form-control" required=""
                                                            placeholder="1234 Main St" name="address">
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-5">
                                                            <label class="form-label">City</label>
                                                            <input type="text" class="form-control" required=""
                                                                name="city">
                                                        </div>

                                                        <div class="mb-3 col-md-3">
                                                            <label class="form-label">Postal Code</label>
                                                            <input type="text" class="form-control"
                                                                data-toggle="input-mask" data-mask-format="A00-AAAA"
                                                                maxlength="7" name="postalCode">
                                                            <span class="font-13 text-muted">e.g "xxx-xxxx"</span><br>
                                                            <span class="font-13 text-muted"><a
                                                                    href="https://finder.eircode.ie/"
                                                                    target="_blank">Find Eircode</a></span>
                                                        </div>
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Date of Birth</label>
                                                            <input type="date" class="form-control" required=""
                                                                name="DOB">
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">PPS Number</label>
                                                            <input type="text" class="form-control"
                                                                data-toggle="input-mask" data-mask-format="0000000-AA"
                                                                maxlength="10" name="ppsNumber">
                                                            <span class="font-13 text-muted">e.g "xxxxxx-xx"</span>
                                                        </div>
                                                        <div class="mb-3 col-md-3">
                                                            <label class="form-label">Childrens</label>
                                                            <input type="text" class="form-control"
                                                                data-toggle="input-mask" maxlength="1" name="children">
                                                            <span class="font-13 text-muted">Any occupant below 18 years
                                                                old?</span>
                                                        </div>
                                                    </div>

                                                    <h4 class="mb-3">Aditional Information</h4>
                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Expected Move-in Date</label>
                                                            <input type="date" class="form-control" required=""
                                                                name="expectedMoveinDate">
                                                        </div>
                                                        <div class="mb-3 col-md-2">
                                                            <label class="form-label">Car Parking</label>
                                                            <select id="inputState" class="form-select" required=""
                                                                name="carParking">
                                                                <option disabled="">Choose</option>
                                                                <option value="0">No</option>
                                                                <option value="1">Yes 1 Car Space</option>
                                                                <option value="2">Yes 2 Car Space</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-2">
                                                            <label class="form-label">Pet</label>
                                                            <select id="inputState" class="form-select" required=""
                                                                name="pet">
                                                                <option disabled="">Choose</option>
                                                                <option value="0">No</option>
                                                                <option value="1">Yes 1 pet</option>
                                                                <option value="2">Yes 2 pets</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Pet Breed</label>
                                                            <input type="text" class="form-control" name="petBreed">
                                                        </div>
                                                    </div>

                                                    <h4 class="mb-3">Contact Details</h4>

                                                    <div class="row g-2">
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Mobile Number</label>
                                                            <input type="text" class="form-control" required=""
                                                                data-toggle="input-mask"
                                                                data-mask-format="+000-00-00000000" maxlength="17"
                                                                name="mobilePhone">
                                                            <span class="font-13 text-muted">e.g
                                                                "+353-xxx-xxxxxxx"</span>
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Contact Number</label>
                                                            <input type="text" class="form-control"
                                                                data-toggle="input-mask"
                                                                data-mask-format="+000-00-00000000" maxlength="17"
                                                                name="contactNumber">
                                                            <span class="font-13 text-muted">e.g
                                                                "+353-xxx-xxxxxxx"</span>
                                                        </div>
                                                        <div class="mb-3 col-md-4">
                                                            <label class="form-label">Alternative Email</label>
                                                            <input type="email" class="form-control"
                                                                name="alternativeEmail">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-md">
                                                        <label class="form-label">Notes</label>
                                                        <textarea class="form-control" id="example-textarea" rows="5"
                                                            name="notes" maxlength="255"></textarea>
                                                    </div>
                                                    <ul class="list-inline wizard mb-0">
                                                        <button type="submit" class="btn btn-primary float-end"
                                                            name="save" value="reference">Next</button>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection