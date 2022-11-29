@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <x-container>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary fw-bold m-0">
                    Create New Enquiry
                </p>
            </div>

            <form method="POST" action="/enquiries">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">Property</h6>
                                            {{-- HTML Select listing all clients --}}
                                            <x-select-properties />
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">First Name</h6>
                                            <input type="text" class="form-control" name="contact_name">
                                            @error('contact_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0">Email</h6>
                                            <input type="email" class="form-control" name="contact_email">
                                            @error('contact_email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <h6 class="mb-0">Phone</h6>
                                            <input type="phone" class="form-control" name="contact_phone">
                                            @error('contact_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0">Message</h6>
                                            <textarea class="form-control" name="body" id="tinyTextArea">
                                                    </textarea>
                                            @error('body')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <button type="submit" class="btn btn-primary">Insert</button>
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
