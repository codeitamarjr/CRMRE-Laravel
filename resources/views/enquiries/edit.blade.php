@extends('layout')

@section('content')

{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<x-container>

    {{-- Heading --}}
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">{{ $heading }}</h3>
    </div>

<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">
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
                                            {{-- Input hidden to store email_code as Manual Input --}}
                                            <input type="hidden" name="email_code" value="{{ $enquiry->email_code }}">
                                            {{-- Input hidden to store enquiry_id as unique code numberBetween() --}}
                                            <input type="hidden" name="enquiry_id" value="{{ $enquiry->enquiry_id }}">
                                            {{-- Input hidden to store prs_code as PRS1 --}}
                                            <input type="hidden" name="prs_code" value="{{ $enquiry->prs_code }}">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="mb-0">Property</h6>
                                                    <select class="form-select" name="property_code">
                                                    <option value="PROP1">Property 1</option>
                                                    <option value="PROP2">Property 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                                <p></p>
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="mb-0">First Name</h6>
                                                    <input type="text" class="form-control" name="contact_name" value="{{ $enquiry->contact_name }}">
                                                    @error('contact_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0">Email</h6>
                                                    <input type="email" class="form-control" name="contact_email" value="{{ $enquiry->contact_email }}">
                                                    @error('contact_email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <h6 class="mb-0">Phone</h6>
                                                    <input type="phone" class="form-control" name="contact_phone" value="{{ $enquiry->contact_phone }}"">
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
                                            {{-- Input hidder to store title as Manual Input --}}
                                            <input type="hidden" name="title" value="Manual Enquiry">
                                            {{-- Input hidden to store status as New --}}
                                            <input type="hidden" name="status" value="New">
                                            <div class="row">
                                                <div class="col-sm-1">
                                                <button type="submit" class="btn btn-primary" >Save Changes</button>
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
                                      
