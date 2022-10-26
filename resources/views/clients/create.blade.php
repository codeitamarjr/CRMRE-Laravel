@extends('layout')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">New Client</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <form method="POST" action="/clients/logo" enctype="multipart/form-data">
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
                            <p class="text-primary m-0 fw-bold">Client Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/clients">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name">
                                            <strong>Client Name</strong></label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email">
                                            <strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}"></div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
                                        <div class="mb-3"><label class="form-label" for="country" >
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
                                        <div class="mb-3"><label class="form-label" for="phone">
                                            <strong>Phone Number</strong></label>
                                            <input class="form-control" type="phone" id="phone" name="phone" value="{{ old('phone') }}"></div>
                                            @error('phone')
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

@endsection