@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
        {{-- Heading --}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">{{ $heading }}</h3>
        </div>
        <div class="card mb-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Enquirie Details</h6>
                <div class="dropdown no-arrow">
                    <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                        type="button">
                        <i class="fas fa-ellipsis-v text-gray-400"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end animated--fade-in shadow">
                        <h6 class="dropdown-header text-center">Change Status</h6>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeProperty">&nbsp;Change
                            Property</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal">&nbsp;Delete</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sendModal">&nbsp;Send Welcome
                            E-mail</a>
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#sendViewing">&nbsp;Send Viewing
                            E-mail</a>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Property</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $enquiry['property_code'] }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $enquiry['contact_email'] }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $enquiry['contact_phone'] }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Received on:</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $enquiry['date'] }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Welcome E-mail Sent on</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                sssss
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Viewing E-mail Sent on</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                sssss
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Message</h6>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="email-content">
                                    <textarea class="form-control" rows="13" id="tinyTextArea">{{ $enquiry['body'] }}</textarea>
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
            selector: '#tinyTextArea',
            //toolbar_location: 'bottom',
            visual: false,
            menubar: false,
            statusbar: false,
            height: 600,
            noneditable_class: ‘uneditable ',
        });
    </script>
@endsection
