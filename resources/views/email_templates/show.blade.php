@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Action(s) using this template</h6>
            </div>
            <div class="card-body">
                <p class="form-label">Actions Group where this templates will be available</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="SYSTEM"
                        {{ $email_template['SYSTEM'] == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineCheckbox1">System</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="ENQ"
                        {{ $email_template['ENQ'] == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineCheckbox2">Enquiries</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="APP"
                        {{ $email_template['APP'] == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineCheckbox2">Applications</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="TEN"
                        {{ $email_template['TEN'] == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="inlineCheckbox2">Tenancy</label>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow">
            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Template Name</h6>
                                <div class="col-sm-9 text-secondary">
                                    {{ $email_template['name'] }}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="mb-0">Template Subject</h6>
                                <div class="col-sm-9 text-secondary">
                                    {{ $email_template['subject'] }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Message</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="email-content">
                                    <textarea class="form-control" rows="13" id="formatHTML">{{ $email_template['body'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            tinymce.init({
                selector: '#formatHTML',
                visual: false,
                menubar: false,
                statusbar: false,
                height: 600,
                noneditable_class: 'uneditable',
            });
        </script>
    @endsection
