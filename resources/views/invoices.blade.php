


<!DOCTYPE html>
<html>
<head>
    <title>Invoice for payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body>

<div class="container">

    <br><br><br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <div class="row" >
                        <h3 class="panel-title">...................................................Invoice Details.............................................</h3>
                        <div class="display-td" >
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <table>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->date()->toFormattedDateString() }}</td>&nbsp;
                                <td>&nbsp;{{ $invoice->total() }}</td>&nbsp;
                                <td><a href="/user/invoice/{{ $invoice->id }}" class="btn btn-sm btn-block left">Download</a></td>
                            </tr>
                        @endforeach
                    </table>



                </div>
            </div>
            <td><a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Back to Home</a></td>

        </div>

    </div>

</div>

</body>
