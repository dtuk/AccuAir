@extends('layout2')


@section('content')

    <!-- Content Row -->
    <div class="row">
    <div class="container-fluid">
        <div class="card-body">
            <h5 class="card-title">Enter your details here..</h5>
            <br>
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                      <form action="{{ url('/store') }}" method="post">
                      @csrf
                      @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                       @endif


                <div class="md-form">
                    <label for="name">Your Name (required)*</label><br>
                    <input class="form-control" type="text" id="name" name="name" ><br>

                </div>

                <div class="md-form">
                    <label for="address">Delivery Address (required)*</label><br>
                    <input class="form-control" type="text" id="address" name="address" ><br>

                </div>

                <div class="md-form">
                    <label for="number">Telephone Number (required)*</label><br>
                    <input class="form-control" type="text" id="number" name="number"><br>

                </div>



                <input type="submit" value="Submit" class="form-control btn btn-primary">
            </form>

            <!-- /.panel-body -->
             </div>
                </div>
                {{--<a href="{{ url('/stripe') }}" class="btn btn-primary btn-lg left"><i class="fa fa-angle-right"></i> Pay</a>--}}

            </div>

        </div>

    </div>

    </div>

    
@endsection
