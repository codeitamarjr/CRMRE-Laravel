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
        <a href="/clients/create" class="btn btn-primary btn-sm float-end"><i class="fas fa-briefcase fa-sm fa-fw me-2 text-gray-400"></i>+Add New Client</a>
    </p>
    </div>
        <div class="card-body">
            {{-- Datatable enquiries --}}
            <table id="dataTable" class="table table-striped dt-responsive nowrap w-100" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Properties</th>
                        <th></th>
                    </tr>
                </thead>
                {{-- Filter just enquiries which the user has access to --}}
                <tbody> @foreach ($clients->where('prs_code', '=', auth()->user()->prs_code ) as $client)

                    <x-row-clients :client="$client" />

                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Properties</th>
                        <th></th>
                    </tr>
                </tfoot>
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