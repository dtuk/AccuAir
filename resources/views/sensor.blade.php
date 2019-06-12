@extends('layouts.layout')
<body>
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
            <div class="view" style="background-image: url('https://vrworldnyc.com/wp-content/uploads/2017/06/contact-1-2.jpg'); background-repeat: no-repeat; background-size: cover;">

                <!-- Mask & flexbox options-->
                <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                    <!-- Content -->
                    <div class="text-center white-text mx-5 wow fadeIn">
                        <h1 class="mb-4">
                            <strong>Accuair</strong>
                        </h1>
                        <div class="center"> <img src="/home/img/newlogo.png" width="100px" height="100px" alt="accuair"></div>


                        <p>
                        <h4>"Just Breathing Can Be Such a luxury Somethings"</h4>
                        </p>

                        {{--<p class="mb-4 d-none d-md-block">--}}
                        {{--<strong></strong>--}}
                        {{--</p>--}}


                    </div>
                    <!-- Content -->

                </div>
                <!-- Mask & flexbox options-->

            </div>
        </div>
        <!--/First slide-->


    </div>
    <!--/.Slides-->


</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->

    <div class="container">

        <!--Section: Main info-->
        <section class="mt-5 wow fadeIn">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay">
                            <div id="container"></div>
                                <div class="mask rgba-white-slight"></div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title">Co</h4>
                            <!-- Text -->
                            <p class="card-text">card title and make up the bulk of the card's content.</p>
                            <canvas id="lineChart"></canvas>

                            {{ $readings }}

                            <!-- Button -->
                            <a href="#" class="btn btn-primary">Button</a>

                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">



                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay">
                            <div id="container"></div>
                                <div class="mask rgba-white-slight"></div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title">Card title</h4>
                            <!-- Text -->
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <!-- Button -->
                            <a href="#" class="btn btn-primary">Button</a>

                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay">
                                <div id="container"></div>
                                <div class="mask rgba-white-slight"></div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title">Card title</h4>
                            <!-- Text -->
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <!-- Button -->
                            <a href="#" class="btn btn-primary">Button</a>

                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4">


                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay">
                                <div id="container"></div>
                                <div class="mask rgba-white-slight"></div>

                        </div>

                        <!-- Card content -->
                        <div class="card-body">

                            <!-- Title -->
                            <h4 class="card-title">Card title</h4>
                            <!-- Text -->
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <!-- Button -->
                            <a href="#" class="btn btn-primary">Button</a>

                        </div>

                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Main info-->


    </div>

<!--Main layout-->

</body>
@extends('layouts.footer')

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/home/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/home/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/home/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/home/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>

<script>
    var lbls = [
        @foreach($readings as $reading)
            "{{ $reading->created_at }}",
        @endforeach
            ""
    ];
    lbls.pop();
    console.log("Lables :");
    console.log(lbls);

    var data = [
        @foreach($readings as $reading)
            "{{ $reading->co }}",
        @endforeach
            ""
    ];
    data.pop();
    console.log('data: '+data);

    //co2
    var data2 = [
        @foreach($readings as $reading)
            "{{ $reading->co2 }}",
        @endforeach
            ""
    ];
    data2.pop();
    console.log('data2: '+data2);

    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: lbls,
            datasets: [{
                label: "CO  Air quality level",
                data: data,
                backgroundColor: [
                    'rgba(105, 0, 132, .2)',
                ],
                borderColor: [
                    'rgba(200, 99, 132, .7)',
                ],
                borderWidth: 2
            },
                {
                    label: "CO2  Air quality level",
                    data: data2,
                    backgroundColor: [
                        'rgba(0, 137, 132, .2)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true
        }
    });

</script>



{{--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<script>
    Highcharts.chart('container', {
        chart: {
            type: 'spline',
            animation: Highcharts.svg, // don't animate in old IE
            marginRight: 10,
            events: {
                load: function () {

                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function () {
                        var x = (new Date()).getTime(), // current time
                            y = Math.random();
                        series.addPoint([x, y], true, true);
                    }, 1000);
                }
            }
        },

        time: {
            useUTC: false
        },

        title: {
            text: 'Live random data'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150
        },
        yAxis: {
            title: {
                text: 'Value'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br/>',
            pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
        },
        legend: {
            enabled: false
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'Random data',
            data: (function () {
                // generate an array of random data
                var data = [],
                    time = (new Date()).getTime(),
                    i;

                for (i = -19; i <= 0; i += 1) {
                    data.push({
                        x: time + i * 1000,
                        y: Math.random()
                    });
                }
                return data;
            }())
        }]
    });
</script>--}}