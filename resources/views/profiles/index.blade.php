@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- Load Ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/r-2.3.0/sb-1.3.4/sr-1.1.1/datatables.min.js">
    </script>

    <x-container>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary fw-bold m-0">
                    {{-- Buttom to add profile --}}
                    <a href="/profiles/create" class="btn btn-primary btn-sm float-end">Add profile</a>
                </p>
            </div>
            <div class="card-body">
                {{-- Datatable profiles --}}
                <table id="dataTable" class="table-striped dt-responsive nowrap w-100 table" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Property</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Employement Sector</th>
                            <th>Employement Position</th>
                            <th>Income</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <x-row-profiles :profile="$profile" />
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Property</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Employement Sector</th>
                            <th>Employement Position</th>
                            <th>Income</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

                {{-- End Datatable profiles --}}
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
