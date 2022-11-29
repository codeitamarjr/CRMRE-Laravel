@extends('layout')
@php
    use App\Models\Properties;
@endphp

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <x-container>

        {{-- Heading --}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">{{ $heading }}</h3>
        </div>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary fw-bold m-0">
                    Enquiry {{ $enquiry->id }}
                </p>
            </div>

            <form method="POST" action="/enquiries/{{ $enquiry->id }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">Change Property from
                                                {{ Properties::where('property_code', $enquiry->property_code)->first()->name }}
                                                to:
                                            </h6>
                                            {{-- HTML Select listing all clients --}}
                                            <x-select-properties />
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">Name</h6>
                                            <input type="text" class="form-control" name="contact_name"
                                                value="{{ $enquiry->contact_name }}">
                                            @error('contact_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0">Email</h6>
                                            <input type="email" class="form-control" name="contact_email"
                                                value="{{ $enquiry->contact_email }}">
                                            @error('contact_email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0">Phone</h6>
                                            <input type="phone" class="form-control" name="contact_phone"
                                                value="{{ $enquiry->contact_phone }}">
                                            @error('contact_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">Message</h6>
                                            <textarea class="form-control" name="body" id="tinyTextArea">{{ $enquiry->body }}
                                                    </textarea>
                                            @error('body')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </x-container>


    <script>
        tinymce.init({
            selector: '#tinyTextArea',
            //toolbar_location: 'bottom',
            visual: false,
            menubar: false,
            statusbar: false,
            height: 300,
        });
    </script>
@endsection
