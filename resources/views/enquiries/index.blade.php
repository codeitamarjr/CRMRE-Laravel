@extends('layout')

@section('content')

{{-- Load TinyMCE --}}
<script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
{{-- Load Ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.js"></script>

<x-container>

    {{-- Heading --}}
<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">{{ $heading }}</h3>
</div>

<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">
            {{ $heading }}
        {{-- Buttom to add enquiry --}}
        <a href="/enquiries/create" class="btn btn-primary btn-sm float-end">Add Enquiry</a>
    </p>
    </div>
        <div class="card-body">
            {{-- Datatable enquiries --}}
            <table id="dataTable" class="table table-striped dt-responsive nowrap w-100" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Property</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Title</th>
                        <th></th>
                        <th>Date Received</th>
                        <th>Status</th>
                    </tr>
                </thead>
                {{-- Filter just enquiries which the user has access to --}}
                @php
                    $enquiries = DB::table('enquiries')
                    ->join('properties', 'enquiries.property_code', '=', 'properties.property_code')
                    ->where('enquiries.prs_code','=', Auth::user()->prs_code)
                    ->select('enquiries.*', 'properties.name as property_name')
                    ->limit(1000)
                    ->orderBy('enquiries.created_at', 'desc')
                    ->get();
                @endphp
                <tbody>
                    @foreach ($enquiries as $enquiry)
                    <x-row-enquiries :enquiry="$enquiry" />
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Property</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Title</th>
                        <th></th>
                        <th>Date Received</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>

            {{-- End Datatable enquiries --}}
        </div>
    </div>

</x-container>

<style>
    tr:hover {
        cursor: pointer;
    }
</style>

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