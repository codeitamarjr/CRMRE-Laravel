@extends('layout')
@php
    use App\Models\Properties;
    use App\Models\Profiles;
    $mainApplication = Profiles::where('application_id', $application->application_id)->first();
    $otherApplications = Profiles::where('application_id', $application->application_id)
        ->where('id', '!=', $mainApplication->id)
        ->get();
@endphp

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col mb-4">
                <div class="card border-start-primary py-2 shadow">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold mb-1 text-xs">
                                    <span>Summary</span>
                                </div>
                                <p class="fs-6 fw-semibold mb-0">
                                    Source: Daft<br>
                                    E-mail: {{ $mainApplication->email }}<br>
                                    Phone: {{ $mainApplication->phone }}<br>
                                    Main Applicant: <a href="{{ $mainApplication->id }}">{{ $mainApplication->name }}
                                        {{ $mainApplication->surname }}</a><br>
                                    Other
                                    Applicants({{ $otherApplications->count() == 0 ? 'None' : $otherApplications->count() }}):
                                    @foreach ($otherApplications as $otherApplication)
                                        <a href="{{ $mainApplication->id }}/{{ $otherApplication->id }}">
                                            {{ $otherApplication->name }} {{ $otherApplication->surname }} </a>
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-address-card fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-start-success py-2 shadow">

                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold mb-1 text-xs">
                                    <span>Affordability</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            <div class="col-auto">

                                <div class="dropdown no-arrow">
                                    <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                                        data-bs-toggle="dropdown" type="button">
                                        <div class="btn btn-outline-primary"><i
                                                class="fas fa-check text-success"></i>Evaluate
                                        </div>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end animated--fade-in shadow" style="">
                                        <p class="dropdown-header text-center">Outcome:</p>
                                        <a class="dropdown-item" href="#">&nbsp;Approve</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">&nbsp;Deny</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-start-warning py-2 shadow">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold mb-1 text-xs">
                                    <span>Property</span>
                                </div>
                                <p class="fs-6 fw-semibold mb-0">
                                    {{ $application->property_code }}<br>
                                    {{ $application->unit_code }} <br>
                                    Details: 1-bed<br>
                                    Rent: €1500<br>
                                    Date Available: 05/06/2000<br>
                                </p>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-building fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Profile Details</h6>
                    </div>
                    <x-profile-details :profile="$mainApplication" />
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
            noneditable_class: ‘uneditable‘,
        });
    </script>
@endsection
