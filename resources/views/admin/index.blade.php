@extends('layouts.master')


@section('content')

    <div class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active m-2 p-1"><a class="active btn btn-primary" data-toggle="tab" href="#orders">Orders</a></li>
                        <li class="m-2 p-1"><a class="btn btn-primary" data-toggle="tab" href="#users">Users</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <br>
        <hr>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="tab-content">
                                    <div id="orders" class="tab-pane fade in active">
                                        <div class="card hoverable shadow">
                                            <div class="card-header">
                                                Orders
                                            </div>
                                            <div class="card-body">
                                                @foreach($orders as $order)

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card shadow-lg">
                                                                <div class="row">
                                                                    <div class="col-md-1">
                                                                        <strong>ID: #</strong>{{ $order->id }}
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <strong>Ordered by:</strong> {{ $order->user->name }}
                                                                        <br>
                                                                        <a class="btn btn-warning" href="/invoices/{{ $order->user->id }}">
                                                                            View Invoices
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <strong>Ship to:</strong>
                                                                        <br>
                                                                        {{ $order->name }}, <br>
                                                                        {{ $order->address }} <br>
                                                                        {{ $order->number }}
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <strong>Quantity:</strong> {{ $order->quantity }}
                                                                        <br>
                                                                        <strong>Total:</strong> $ {{ $order->getTotal() }}
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <strong>Status:</strong> {{ $order->getStatus() }}
                                                                        <br>
                                                                        @if($order->status < 2)
                                                                            <form action="/orderupdate/{{ $order->id }}" method="post">
                                                                                @csrf
                                                                                <button type="submit" class="btn btn-outline-info">
                                                                                    Mark as Complete
                                                                                </button>
                                                                            </form>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <strong>Ordered at:</strong> {{ $order->created_at }}
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade in " id="users">
                                        <div class="card  hoverable shadow">
                                            <div class="card-header">
                                                Users
                                            </div>
                                            <div class="card-body">
                                                @foreach($users as $user)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card shadow-lg">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <strong>ID: #</strong> {{ $user->id }}
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <strong>Name:</strong> {{ $user->name }}
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <strong>Email: </strong> {{ $user->email }}
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <a class="btn btn-warning" href="/invoices/{{ $user->id }}">
                                                                                    View Invoices
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection
