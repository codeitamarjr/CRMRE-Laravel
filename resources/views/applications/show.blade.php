@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <div class="container-fluid">

        <!-- Page Heading -->
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
                                    E-mail: {{ $mainProfile->email }}<br>
                                    Phone: {{ $mainProfile->phone }}<br>
                                    Main Applicant: {{ $mainProfile->name }}
                                    {{ $mainProfile->surname }}<br>
                                    {{ $otherProfiles->count() == 0 ? 'Single Applicant' : 'Other Applicants(' . $otherProfiles->count() . '):' }}
                                    @foreach ($otherProfiles as $otherApplication)
                                        {{ $otherApplication->name }} {{ $otherApplication->surname }}(
                                        {{ $otherApplication->type }})
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
                                <div class="text-dark fw-bold h5 mb-0">
                                    @if ($otherProfiles->count() > 0)
                                        <span>Household Income
                                            €{{ number_format(
                                                $otherProfiles->sum('income') +
                                                    $otherProfiles->sum('extra_income') +
                                                    $otherProfiles->sum('HAP_allowance') +
                                                    $mainProfile->income +
                                                    $mainProfile->extra_income +
                                                    $mainProfile->HAP_allowance,
                                                2,
                                            ) }}</span>
                                        <div class="fw-normal text-xs text-gray-600">
                                            <span>€{{ number_format($mainProfile->income + $mainProfile->extra_income + $mainProfile->HAP_allowance, 2) }}
                                                (Main Applicant)</span>
                                        </div>
                                        <div class="fw-normal text-xs text-gray-600">
                                            <span>€{{ number_format($otherProfiles->sum('income') + $otherProfiles->sum('extra_income') + $otherProfiles->sum('HAP_allowance'), 2) }}
                                                (Other Applicants)</span>
                                        </div>
                                    @else
                                        <br>
                                        <span>Other
                                            €{{ number_format($mainProfile->income + $mainProfile->extra_income, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown no-arrow">
                                    <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                                        data-bs-toggle="dropdown" type="button">
                                        <div class="btn btn-outline-primary"><i class="fas fa-check text-success"></i>
                                            Evaluate
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
                                    {{-- Edit buttom to open a modal #editPropertyModal --}}
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editPropertyModal">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{ $property == null ? 'N/A' : $property->name }}<br>

                                    {{-- Edit buttom to open a modal #editUnitModal --}}
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editUnitModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    {{ $unit == null ? 'N/A' : $unit->type }}:
                                    {{ $unit == null ? 'N/A' : $unit->number }}<br>
                                    Block:
                                    {{ $unit == null ? 'N/A' : $unit->block }}<br>
                                    Floor:
                                    {{ $unit == null ? 'N/A' : $unit->floor }}<br>
                                    Bedrooms:
                                    {{ $unit == null ? 'N/A' : $unit->bedrooms }}<br>
                                    Car Spaces:
                                    {{ $unit == null ? 'N/A' : $unit->car_spaces }}<br>
                                    Date Available:
                                    {{ $unit == null ? 'N/A' : $unit->date_available }}
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

        <!-- Content Row -->
        <div class="row">
            <div class="col">
                <div class="card mb-4 shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Profile Details</h6>
                    </div>
                    {{-- Navitagion Tabs --}}
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">{{ $mainProfile->name }}
                                {{ $mainProfile->surname }}( {{ $mainProfile->type }})
                                <a class="btn btn-sm btn-outline-secondary" href="/profiles/{{ $mainProfile->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </button>
                            {{-- Loop through other applications and add a button for each one --}}
                            @foreach ($otherProfiles as $otherApplication)
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile{{ $otherApplication->id }}" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">{{ $otherApplication->name }}
                                    {{ $otherApplication->surname }}( {{ $otherApplication->type }})
                                    <a class="btn btn-sm btn-outline-secondary"
                                        href="/profiles/{{ $otherApplication->id }}/edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </button>
                            @endforeach
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <x-profile-view :profile="$mainProfile" />
                        </div>
                        {{-- Loop through other applications and add a tab for each --}}
                        @foreach ($otherProfiles as $otherApplication)
                            <div class="tab-pane fade" id="nav-profile{{ $otherApplication->id }}" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <x-profile-view :profile="$otherApplication" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- #editPropertyModal modal --}}
    <div class="modal fade" id="editPropertyModal" tabindex="-1" aria-labelledby="editPropertyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/applications/{{ $application->id }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Select New Property</p>
                        <x-select-properties />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- #editUnitModal Modal --}}
    <div class="modal fade" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/applications/{{ $application->id }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Unit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Select New
                            {{ $unit == null ? 'N/A' : $unit->type }}
                        </p>
                        <x-select-units :property_code="$application->property_code" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
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
