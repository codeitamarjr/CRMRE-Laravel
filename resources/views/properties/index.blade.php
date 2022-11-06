@extends('layout')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.js"></script>

<x-container>

<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">
            {{ $heading }}
        {{-- Buttom to add enquiry --}}
        <a href="/properties/create" class="btn btn-primary btn-sm float-end"><i class="fas fa-building fa-sm fa-fw me-2 text-gray-400"></i>+Add New Propertie</a>
    </p>
    </div>
        <div class="card-body">
            {{-- Datatable enquiries --}}
            <table id="dataTable" class="table table-striped dt-responsive nowrap w-100" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Client</th>
                        <th>Property Name</th>
                        <th>Units</th>
                        <th>Property Type</th>
                        <th>Type</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                {{-- Filter just enquiries which the user has access to --}}
                <tbody>
                    @php
                        // Innerjoin the Clients(client_code) with Properties(client_code) table where the prs_code is the same as the user's prs_code and show Properties Name
                        $properties = DB::table('properties')
                            ->join('clients', 'clients.client_code', '=', 'properties.client_code')
                            ->where('clients.prs_code', '=', auth()->user()->prs_code)
                            ->select('properties.id','properties.name','properties.client_code' ,'properties.property_code', 'properties.type', 'properties.status', 'properties.address', 'properties.website', 'properties.logo','clients.name as client_name')
                            ->get();
                    @endphp
                    @foreach ($properties as $property)
                        <x-row-properties :property="$property" />
                    @endforeach
                </tbody>
            </table>

            {{-- End Datatable enquiries --}}
        </div>
    </div>

</x-container>

<!-- Datatables script -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            pageLength: 15,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection