@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="card o-hidden my-5 border-0 shadow-lg">
            <form method="POST" action="/profiles/{{ $profile->id }}">
                @csrf
                @method('PUT')
                <x-profile-edit :profile="$profile" />
            </form>
        </div>
    </div>
@endsection
