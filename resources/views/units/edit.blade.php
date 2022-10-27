@extends('layout')

@section('content')
{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container-fluid">
    <h3 class="text-dark mb-4">{{ $unit->name }}</h3>
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
                            <p class="text-primary m-0 fw-bold">Unit View</p>
                        </div>
                        <form method="POST" action="/units/{{ $unit->id }}">
                            @csrf
                            @method('PUT')
                        <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Unit Code</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->unit_code }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Custom Code</strong></label>
                                            <input class="form-control" value="{{ $unit->custom_code }}" name="custom_code">
                                            @error('custom_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Unit Name</strong></label>
                                            <input class="form-control" value="{{ $unit->name }}" name="name">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Type</strong></label>
                                            <input class="form-control" value="{{ $unit->type }}" name="type">
                                            @error('type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Block</strong></label>
                                            <input class="form-control" value="{{ $unit->block }}" name="block">
                                            @error('block')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Floor</strong></label>
                                            <input class="form-control" value="{{ $unit->floor }}" name="floor">
                                            @error('floor')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Number</strong></label>
                                            <input class="form-control" value="{{ $unit->number }}" name="number">
                                            @error('number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="bedrooms">
                                            <strong>Bedrooms</strong></label>
                                            <select class="form-select" name="bedrooms">
                                                <option selected value="{{ $unit->bedrooms }}">{{ $unit->bedrooms }}</option>
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
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Post Code</strong></label>
                                            <input class="form-control" value="{{ $unit->postcode }}" name="postcode">
                                            @error('postcode')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Car Spaces</strong></label>
                                            <input class="form-control" value="{{ $unit->car_spaces }}" name="car_spaces">
                                            @error('car_spaces')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Date Available</strong></label>
                                            <input class="form-control" value="{{ $unit->date_available }}" name="date_available">
                                            @error('date_available')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Status</strong></label>
                                            <input class="form-control" value="{{ $unit->status }}" name="status">
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
                                            <textarea class="form-control" id="description" name="description" rows="4">{{ $unit->description }}</textarea>
                                        </div>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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