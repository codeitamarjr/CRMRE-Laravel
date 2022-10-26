@extends('layout')

@section('content')
{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container-fluid">
    <h3 class="text-dark mb-4">Add a New Property</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <form method="POST" action="/properties/logo" enctype="multipart/form-data">
                    @csrf     
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                        src="/assets/img/briefcase-solid.svg" width="160" height="160">
                    <div class="mb-3">
                        <input class="form-control" type="file" name="logo" id="logo">
                    </div>
                    @error('logo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">Update Photo</button>
                    </div>
                </div>
                </form>
            </div>
            
            
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Property Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/properties }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="type">
                                            <strong>Property Type</strong></label>
                                            <select class="form-select" name="type">
                                                <option selected>Select an Option</option>
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
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="status">
                                            <strong>Property Status</strong></label>
                                            <select class="form-select" name="status">
                                                <option selected>Select a Status</option>
                                                <option value="Sell">Sell</option>
                                                <option value="Rent">Rent</option>
                                              </select>
                                            @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name">
                                            <strong>Property Name</strong></label>
                                            <input class="form-control" type="text" id="name" name="name">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="address">
                                            <strong>Address</strong></label>
                                            <input class="form-control" type="text" id="address" name="address"></div>
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="city">
                                            <strong>City</strong></label>
                                            <input class="form-control" type="city" id="city" name="city"></div>
                                            @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="country">
                                            <strong>Country</strong></label>
                                            <input class="form-control" type="country" id="country" name="country"></div>
                                            @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="website">
                                            <strong>Website</strong></label>
                                            <input class="form-control" type="text" id="website" name="website"></div>
                                            @error('website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                            <strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" name="email">
                                        </div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="phone">
                                            <strong>Phone Number</strong></label>
                                            <input class="form-control" type="phone" id="phone" name="phone">
                                        </div>
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="description">
                                            <strong>Description</strong></label>
                                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                                        </div>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Sate</button>
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