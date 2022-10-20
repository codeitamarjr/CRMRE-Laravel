@extends('layout')

@section('content')

    <div class="listing">
        <h2>{{ $listing['title'] }}</h2>
        <p>{{ $listing['description'] }}</p>
    </div>

@endsection