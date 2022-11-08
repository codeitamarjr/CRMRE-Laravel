@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
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
