@extends('layout')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">{{ $client->name }}</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <form method="POST" action="/clients/logo" enctype="multipart/form-data">
                    @csrf     
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                        src="{{ $client->logo ? asset($client->logo) : '/assets/img/briefcase-solid.svg' }}" width="160" height="160">
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
                            <form method="POST" action="/clients/{{ $client->id }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="name">
                                            <strong>Client Name</strong></label>
                                            <input class="form-control" type="text" id="name" value="{{ $client->name }}" name="name">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email">
                                            <strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" value="{{ $client->email }}" name="email"></div>
                                            @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="address">
                                            <strong>Address</strong></label>
                                            <input class="form-control" type="text" id="address" value="{{ $client->address }}" name="address"></div>
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="city">
                                            <strong>City</strong></label>
                                            <input class="form-control" type="city" id="city" value="{{ $client->city }}" name="city"></div>
                                            @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="country">
                                            <strong>Country</strong></label>
                                            <input class="form-control" type="country" id="country" value="{{ $client->country }}" name="country"></div>
                                            @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="website">
                                            <strong>Website</strong></label>
                                            <input class="form-control" type="text" id="website" value="{{ $client->website }}" name="website"></div>
                                            @error('website')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="phone">
                                            <strong>Phone Number</strong></label>
                                            <input class="form-control" type="phone" id="phone" value="{{ $client->phone }}" name="phone"></div>
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
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