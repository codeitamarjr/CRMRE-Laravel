@extends('layout')
@php
    use App\Models\Properties;
@endphp

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <div class="container-fluid">
        {{-- Heading --}}
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">View Enquiry</h3>
        </div>
        <div class="card mb-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary fw-bold m-0">Enquirie Details</h6>

                <div class="dropdown no-arrow">
                    <div class="btn-group">
                        <form method="POST" action="/enquiries/{{ $enquiry->id }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-secondary btn-sm" href="/enquiries/{{ $enquiry->id }}/edit"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                    <button class="btn btn-primary btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown"
                        type="button"><i class="fa-solid fa-reply"></i> Auto-reply
                    </button>
                    <div class="dropdown-menu dropdown-menu-end animated--fade-in shadow">
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
                                {{ Properties::where('property_code', $enquiry->property_code)->first()->name }}
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
                                    <textarea class="form-control" name="body" id="tinyTextArea" rows="13">
                                        {{ $enquiry['body'] }}
                                    </textarea>
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
            visual: false,
            menubar: false,
            statusbar: false,
            height: 300,
        });
    </script>
@endsection
