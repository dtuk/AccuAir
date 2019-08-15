@extends('layouts.master')


@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-11">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row mx-auto">
                        <div class="col">
                            CO <div class="squre1"></div>
                        </div>
                        <div class="col">
                            CO<sub>2</sub> <div class="squre2"></div>
                        </div>
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary"> </h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                    <strong>The Variation of CO & CO<sub>2</sub> PPM</strong>
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

        </div>
    </div>

@endsection

@section('scripts')

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <script>

        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

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

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: lbls,
                datasets: [{
                    label: "CO",
                    lineTension: 0.1,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 2,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: data,


                },
                    {
                        label: "CO2",
                        lineTension: 0.1,
                        backgroundColor: "rgba(217, 30, 24, 0.05)",
                        borderColor: "rgba(217, 30, 24, 1)",
                        pointRadius: 2,
                        pointBackgroundColor: "rgba(217, 30, 24, 1)",
                        pointBorderColor: "rgba(217, 30, 24, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(217, 30, 24, 1)",
                        pointHoverBorderColor: "rgba(217, 30, 24, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: data2,
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 100,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return  number_format(value) + " PPM";
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+" PPM";
                        }
                    }
                }
            }
        });


    </script>

@endsection
