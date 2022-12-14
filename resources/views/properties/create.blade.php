@extends('layout')

@section('content')
{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container-fluid">
    <h3 class="text-dark mb-4">Add a New Property</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                    @csrf     
                <div class="card-body text-center shadow">
                    <i class="fa-10x fa-regular fa-building rounded-circle mb-3 mt-4 text-gray-400"></i>
                </div>
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
                            <form method="POST" action="/properties">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="client_code">
                                            <strong>Client</strong></label>
                                            <x-select-clients />
                                            @error('client_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
                                        <div class="mb-3"><label class="form-label" for="email_code">
                                            <strong>Enquiries Source</strong></label>
                                                <x-select-emails />
                                            @error('email_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name">
                                            <strong>Property Name</strong></label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
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
                                            <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}"></div>
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="city">
                                            <strong>City</strong></label>
                                            <input class="form-control" type="city" id="city" name="city" value="{{ old('city') }}"></div>
                                            @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="country">
                                            <strong>Country</strong></label>
                                            <input class="form-control" type="country" id="country" name="country" value="{{ old('country') }}"></div>
                                            @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="website">
                                            <strong>Website</strong></label>
                                            <input class="form-control" type="text" id="website" name="website" value="{{ old('website') }}"></div>
                                            @error('website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                            <strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                                        </div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="phone">
                                            <strong>Phone Number</strong></label>
                                            <input class="form-control" type="phone" id="phone" name="phone" value="{{ old('phone') }}">
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
                                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
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