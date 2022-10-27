@extends('layout')

@section('content')
{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="container-fluid">
    <h3 class="text-dark mb-4">{{ $unit->name }}</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                    @csrf     
                <div class="card-body text-center shadow">
                        <i class="fas fa-10x fa-home rounded-circle mb-3 mt-4 text-gray-400"></i>

                </div>
            </div>
            
            
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Unit View</p>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Unit Code</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->unit_code }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Custom Code</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->custom_code }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Unit Name</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Type</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->type }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Block</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->block }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Floor</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->floor }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Number</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->number }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Bedrooms</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->bedrooms }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Post Code</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->postcode }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Car Spaces</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->car_spaces }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Date Available</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->date_available }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                            <strong>Status</strong></label>
                                            <input class="form-control-plaintext" value="{{ $unit->status }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="description">
                                            <strong>Description</strong></label>
                                            <textarea class="form-control" id="description" name="description" rows="4">{{ $unit->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
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
        noneditable_class: ‘uneditable',
    });
</script>


@endsection