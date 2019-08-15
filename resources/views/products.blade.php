@extends('layout2')
 
@section('title', 'Products')
 
@section('content')
 
    <div class="container products">
 
        <div class="row">
 
            @foreach($products as $product)
                <div class="col-xs-18 col-md-6">
                    <div class="thumbnail">
                        <img src="{{ $product->photo }}" width="500" height="300">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>Consist with CO, CO<sub>2</sub> Humidity and Temperature sensors.</p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="col-xs-18 col-md-6">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>The hardware product consist with CO, CO<sub>2</sub> Humidity and Temperature sensors. If you wish to
                                set up the product in your working area school hospital etc. Please place an order with necessary
                                details.our support team will install the device after payment done. </p>

                        </div>
                    </div>
                </div>
        </div><!-- End row -->
 
    </div>
 
@endsection
