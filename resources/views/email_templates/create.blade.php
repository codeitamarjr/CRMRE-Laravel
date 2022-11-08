@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <div class="container-fluid">
        <form method="POST" action="/email-templates">
            @csrf
            <div class="card mb-4 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Select a Property</h6>
                </div>
                <div class="card-body">
                    <label for="hierarchy" class="form-label">Select a Hierarchy</label>
                    <select class="form-select" id="hierarchy" name="property_code">
                        <option value="{{ old('property_code') ? old('property_code') : '' }}">
                            {{ old('property_code') ? old('property_code') : 'Open this select menu' }}
                        </option>
                        <option value="">General(To use across the clients)</option>
                        {{-- List all properties that belongs to the client that the users access --}}
                        @php
                            $properties = DB::table('properties')
                                ->join('clients', 'clients.client_code', '=', 'properties.client_code')
                                ->where('clients.prs_code', '=', auth()->user()->prs_code)
                                ->select('properties.name', 'properties.client_code', 'properties.property_code')
                                ->get();
                        @endphp
                        @foreach ($properties as $property)
                            <option value="{{ $property->property_code }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                    @error('property_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card mb-4 shadow">

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="subjectFormControl" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subjectFormControl" name="subject"
                                value="{{ old('subject') }}">
                        </div>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="nameFormControl" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameFormControl" name="name"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-body">
                    <label for="tinyTextArea" class="form-label">Message Body</label>
                    <textarea name="body" id="tinyTextArea">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

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
