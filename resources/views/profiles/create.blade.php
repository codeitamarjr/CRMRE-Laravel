@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card o-hidden my-5 border-0 shadow-lg">
                    <form method="POST" action="/profiles">
                        @csrf
                        <x-profile-new />
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
