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
                        @if ($emailTemplates == null || $emailTemplates->count() == 0)
                            <a class="dropdown-item alert alert-warning d-flex align-items-center"
                                href="/email-templates/create">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0" viewBox="0 0 16 16"
                                    role="img" aria-label="Warning:">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <div>
                                    No email templates
                                    found. Click here to
                                    create one.
                                </div>
                            </a>
                        @else
                            @foreach ($emailTemplates as $emailTemplate)
                                @if ($emailTemplate->property_code == $enquiry->property_code || $emailTemplate->property_code == null)
                                    <a class="dropdown-item"
                                        href="/email-templates/{{ $emailTemplate->id }}/enquiry-reply/{{ $enquiry->id }}">{{ $emailTemplate->name }}</a>
                                @endif
                            @endforeach
                        @endif
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
