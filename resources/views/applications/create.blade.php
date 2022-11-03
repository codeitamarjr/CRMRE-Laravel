@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image"
                                style="background-image: url(/assets/img/Photo_by_Naomi_Hebert_on_Unsplash.jpg);">
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <x-application-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection