@extends('layouts.master')


@section('content')

    {{--<!-- Page Heading -->--}}
    {{--<h1 class="h3 mb-2 text-gray-800">Tables</h1>--}}
    {{--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CO</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>

                        <th>Date</th>
                        <th>CO (PPM)</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>CO (PPM)</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr>
                        <td>{{$date }}</td>
                        <td>{{ $co }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col"><h5>CO continuous expoure safty level in PPM</h5></div>
            <div class="col"><h5>CO<sub>2</sub> continuous expoure safty level in PPM</h5></div>
            <div class="w-100"></div>

            <div class="col"><img src="/img/co.png" alt="co" height="300px" width="500px"></div>
            <div class="col"><img src="/img/co2.png" alt="co2" height="300px" width="500px"></div>
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
