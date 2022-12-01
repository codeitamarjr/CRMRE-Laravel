@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Profile Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="card mb-3">
                            <x-profile-view :profile="$profile" />
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
            height: 600,
            noneditable_class: ‘uneditable ',
        });
    </script>
@endsection
