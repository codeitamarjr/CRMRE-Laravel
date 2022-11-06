@extends('layout')

@section('content')

<div class="container-fluid">
    <h3 class="text-dark mb-4">{{auth()->user()->name}} {{auth()->user()->surname}}'s Profile</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <form method="POST" action="/users/avatar" enctype="multipart/form-data">
                    @csrf
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                        src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : asset('img/avatars/noavatar.webp') }}" width="160" height="160">
                    <div class="mb-3">
                        <input class="form-control" type="file" name="avatar" id="avatar">
                    </div>
                    @error('avatar')
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
                            <p class="text-primary m-0 fw-bold">User Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/users/update">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="username">
                                            <strong>Username</strong></label>
                                            <input class="form-control" type="text" id="username" value="{{ auth()->user()->username }}" name="username">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="email">
                                            <strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" value="{{ auth()->user()->email }}" name="email"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="first_name">
                                            <strong>First Name</strong></label>
                                            <input class="form-control" type="text" id="first_name" value="{{ auth()->user()->name }}" name="name"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="last_name">
                                            <strong>Last Name</strong></label>
                                            <input class="form-control" type="text" id="last_name" value="{{ auth()->user()->surname }}" name="surname"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="password">
                                            <strong>Password</strong></label>
                                            <input class="form-control" type="password" id="password" name="password"></div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="password_confirmation">
                                            <strong>Password Confirmation</strong></label>
                                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"></div>
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