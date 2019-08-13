@extends('layouts.master')

@section('content')

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average Carbon Monoxide (CO)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ round($co_avg, 2) }} PPM
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Average Carbon Dioxide (CO<sub>2</sub>)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ round($co2_avg, 2) }} PPM
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average Temperature</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ round($tem_avg, 2) }}° C
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-temperature-low fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Average Humidity
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ round($hm_avg, 2) }} %
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-humidity fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-2 mx-auto">
        <div class="col mx-auto">
            <center>
                <h3>
                    Welcome to <strong>AccuAir</strong>

                </h3>

                <p class="lead">An online air quality monitoring system</p>

                <img src="/welcome/img/newlogo.png" width="150px" height="150px" alt="accuair">
            </center>

        </div>

    </div>

    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>--}}
@endsection
