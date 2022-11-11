@extends('hub-applications.layout')

@section('content')
    <div class="my-5 px-4 py-5 text-center">
        <h1 class="display-5 fw-bold">Dear Applicant</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Welcome to the Application HUB {{ auth()->user()->name }}</p>
            <p class="lead mb-0">Click on the tabs above to navigate through
                the
                application process. Here you can manage your application, add occupants, upload documents and
                follow up the status of your application.</p>
            <p class="lead mb-0">Please note that you will need to complete all the tabs before you can submit your
                application.</p>
        </div>
    </div>
@endsection
