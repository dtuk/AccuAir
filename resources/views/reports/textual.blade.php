@extends('layouts.master')


@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>CO (PPM)</th>
                        <th>CO2 (PPM)</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>CO (PPM)</th>
                        <th>CO2 (PPM)</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($readings as $reading)
                            <tr>
                                <td>{{ $reading->id }}</td>
                                <td>{{ $reading->created_at }}</td>
                                <td>{{ $reading->lat }}° N, {{ $reading->lng }}° E</td>
                                <td>{{ $reading->co }}</td>
                                <td>{{ $reading->co2 }}</td>
                                <td>{{ $reading->tem }}</td>
                                <td>{{ $reading->humidity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@endsection