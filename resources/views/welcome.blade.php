<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Accuair web</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="home/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="home/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="home/css/style.min.css" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .carousel {
            height: 60vh;
        }

        @media (max-width: 740px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            header,
            .carousel {
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #929FBA !important;
            }
        }



        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;

        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
        }

    </style>


</head>

<body>

<header>



    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->

            <strong class="navbar-brand">Accuair</strong>


            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About Accuair</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank">Gas Pollution</a>
                    </li>

                </ul>

               {{-- <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>

                </ul>--}}

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">



        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
                <div class="view" style="background-image: url('https://cms.qz.com/wp-content/uploads/2017/12/cross-state-air-pollution-e1514482881707.jpg'); background-repeat: no-repeat; background-size: cover;">

                    <!-- Mask & flexbox options-->
                    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                        <!-- Content -->
                        <div class="text-center white-text mx-5 wow fadeIn">
                            <h1 class="mb-4">
                                <strong>Accuair</strong>
                            </h1>

                            <p>
                                <strong>Air pollution  identification
                                    System</strong>
                            </p>

                            <p class="mb-4 d-none d-md-block">
                                <strong>Our System is based on measurement of Carbon Dioxide(CO2), Carbon Monoxide(CO), Temperature,Humidity emissions.So How polluted is the air today? Check out the real-time air pollution map.</strong>
                            </p>


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




</header>


<br>

<div id="map"></div>

<!--Section: Main info-->
<section class="mt-5 wow fadeIn">
    <hr class="my-5">
    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <img src="home/img/Screenshot.png" class="img-fluid z-depth-1-half"
                 alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!-- Main heading -->
            <h3 class="h3 mb-3">How To Use This Web Application</h3>
            <p>To get more information about a specific city, move your move over any of the
                the icon in the above map, then click to get the full air pollution historical data.
            </p>
            <p>Our System is based on measurement of Carbon Dioxide(CO2), Carbon Monoxide(CO), Temperature,Humidity emissions.All measurements are based on hourly readings</p>
            <!-- Main heading -->

            <hr>



        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Section: Main info-->



{{--<!--Main layout-->--}}
{{--<main>--}}
    {{--<div class="container">--}}
        {{----}}
        {{--<!-- Section: Main features & Quick Start-->--}}
        {{--<section>--}}

            {{--<h3 class="h3 text-center mb-5">About Accuair mobile Application</h3>--}}

            {{--<!--Grid row-->--}}
            {{--<div class="row wow fadeIn">--}}

                {{--<!--Grid column-->--}}
                {{--<div class="col-lg-6 col-md-12 px-4">--}}

                    {{--<!--First row-->--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-1 mr-3">--}}
                            {{--<i class="fas fa-code fa-2x indigo-text"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-10">--}}
                            {{--<h5 class="feature-title">Bootstrap 4</h5>--}}
                            {{--<p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--/First row-->--}}

                    {{--<div style="height:30px"></div>--}}

                    {{--<!--Second row-->--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-1 mr-3">--}}
                            {{--<i class="fas fa-book fa-2x blue-text"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-10">--}}
                            {{--<h5 class="feature-title">Detailed documentation</h5>--}}
                            {{--<p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help--}}
                                {{--you to implement your ideas--}}
                                {{--easily.--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--/Second row-->--}}

                    {{--<div style="height:30px"></div>--}}

                    {{--<!--Third row-->--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-1 mr-3">--}}
                            {{--<i class="fas fa-graduation-cap fa-2x cyan-text"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-10">--}}
                            {{--<h5 class="feature-title">Lots of tutorials</h5>--}}
                            {{--<p class="grey-text">We care about the development of our users. We have prepared numerous tutorials,--}}
                                {{--which allow you to learn--}}
                                {{--how to use MDB as well as other technologies.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--/Third row-->--}}

                {{--</div>--}}
                {{--<!--/Grid column-->--}}

                {{--<!--Grid column-->--}}
                {{--<div class="col-lg-6 col-md-12">--}}

                    {{--<p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>--}}
                    {{--<div class="embed-responsive embed-responsive-16by9">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--/Grid column-->--}}

            {{--</div>--}}
            {{--<!--/Grid row-->--}}

        {{--</section>--}}
        {{--<!--Section: Main features & Quick Start -->--}}

        {{--<hr class="my-5">--}}



    {{--</div>--}}
{{--</main>--}}
{{--<!--Main layout-->--}}


<!-- Footer -->
<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">
    <!-- Footer Links -->
    <hr class="my-4">
    <div class="container-fluid text-center text-md-center">


        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">


                <!-- Content -->
                <h5 class="text-uppercase">Accuair Web Application</h5>
                <p>Air pollution  identification System.</p>


            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
                <div class="text-left">
                    <!-- Links -->
                    <h5 class="text-uppercase">Useful Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">About Accuair</a>
                        </li>
                        <li>
                            <a href="#!">Gas Pollution</a>
                        </li>

                    </ul>
                </div>



            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
                <div class="text-left">

                <!-- Links -->
                <h5 class="text-uppercase">Find Us</h5>

                <ul class="list-unstyled">

                    <li>
                        <a href="https://dribbble.com/mdbootstrap" target="_blank">
                            <i class="fab fa-google-plus-g mr-3"></i>Google Plus
                        </a>

                    </li>

                    <li>
                        <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                            <i class="fab fa-facebook-f mr-3"></i>Facebook
                        </a>
                    </li>

                    <li>
                        <a href="https://twitter.com/MDBootstrap" target="_blank">
                            <i class="fab fa-twitter mr-3"></i>Twitter
                        </a>
                    </li>




                </ul>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <a href="https://mdbootstrap.com/education/bootstrap/"> </a>
    </div>
    <!-- Copyright -->

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="home/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="home/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="home/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="home/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>



<script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 7.873054, lng: 80.771797},
            zoom: 7.5,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6dnjTHHpUV7dWHTFB9ks33sx2dvzINpE&libraries=places&callback=initAutocomplete"
        async defer></script>




</body>



</html>
