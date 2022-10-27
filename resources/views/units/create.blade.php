@extends('layout')

@section('content')
{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container-fluid">
    <h3 class="text-dark mb-4">Add a New Unit</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                    @csrf     
                <div class="card-body text-center shadow">
                    <i class="fas fa-10x fa-home rounded-circle mb-3 mt-4 text-gray-400"></i>
                </div>
            </div>
            
            
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Unit Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/units">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="property_code"><strong>Property</strong></label>
                                            <x-select-properties />
                                            @error('property_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="custom_code">
                                            <strong>Custom Code</strong></label>
                                            <input class="form-control" type="text" id="custom_code" name="custom_code" value="{{ old('custom_code') }}">
                                            @error('custom_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name">
                                            <strong>Unit Name</strong></label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="type">
                                            <strong>Unit Type</strong></label>
                                            <select class="form-select" name="type">
                                                <option selected value="">Select an Option</option>
                                                <option value="House">House</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Flat">Flat</option>
                                                <option value="Studio">Studio</option>
                                                <option value="Mix">Mix</option>
                                              </select>
                                            @error('type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="block">
                                            <strong>Block</strong></label>
                                            <input class="form-control" type="text" id="block" name="block" value="{{ old('block') }}">
                                            @error('block')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="floor">
                                            <strong>Floor</strong></label>
                                            <input class="form-control" type="text" id="floor" name="floor" value="{{ old('floor') }}">
                                            @error('floor')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="number">
                                            <strong>Number</strong></label>
                                            <input class="form-control" type="text" id="number" name="number" value="{{ old('number') }}">
                                            @error('number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="bedrooms">
                                            <strong>Bedrooms</strong></label>
                                            <select class="form-select" name="bedrooms">
                                                <option selected value="">Select an Option</option>
                                                <option value="1 Bedroom">1 Bedroom</option>
                                                <option value="2 Bedrooms">2 Bedrooms</option>
                                                <option value="3 Bedrooms">3 Bedrooms</option>
                                                <option value="4 Bedrooms">4 Bedrooms</option>
                                                <option value="1 Double Bedroom">1 Double Bedroom</option>
                                                <option value="2 Double Bedrooms">2 Double Bedrooms</option>
                                                <option value="3 Double Bedrooms">3 Double Bedrooms</option>
                                                <option value="4 Double Bedrooms">4 Double Bedrooms</option>
                                              </select>
                                            @error('bedrooms')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="postcode">
                                            <strong>Postcode</strong></label>
                                            <input class="form-control" type="text" id="postcode" name="postcode" value="{{ old('postcode') }}">
                                            @error('postcode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="car_spaces">
                                            <strong>Car Spaces</strong></label>
                                            <input class="form-control" type="number" id="car_spaces" name="car_spaces" value="{{ old('car_spaces') }}">
                                            @error('car_spaces')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="date_available">
                                            <strong>Date Available</strong></label>
                                            <input class="form-control" type="date" id="date_available" name="date_available" value="{{ old('date_available') }}"></div>
                                            @error('date_available')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="status">
                                            <strong>Status</strong></label>
                                            <select class="form-select" name="status">
                                                <option selected>Select an Option</option>
                                                <option value="Available">Available</option>
                                                <option value="Unavailable">Unavailable</option>
                                                <option value="Under Offer">Under Offer</option>
                                                <option value="Sold">Sold</option>
                                            </select>
                                            @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="description">
                                            <strong>Description</strong></label>
                                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                        </div>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#description',
        //toolbar_location: 'bottom',
        visual: false,
        menubar: false,
        statusbar: false,
        height: 300,
    });
</script>


@endsection