<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home One || Kenne</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description"
        content="Kenne is a stunning html template for an expansion eCommerce site that suitable for any kind of fashion store. It will make your online store look more impressive and attractive to viewers. ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/user/images/favicon.png') }}">

    <!-- CSS
 ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/bootstrap.min.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/font-awesome.min.css') }}">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/fontawesome-stars.min.css') }}">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/ion-fonts.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/slick.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/animate.min.css') }}">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/jquery-ui.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/nice-select.css') }}">
    <!-- Timecircles -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/timecircles.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/style.css') }}">


</head>

<body class="template-color-1">

    <div class="main-wrapper">
        <!-- Begin Main Header Area -->
        @include('user::layouts.header')
        <!-- Main Header Area End Here -->


        {{-- main --}}
        @yield('content')



        <!-- Begin Kenne's Footer Area -->
        @include('user::layouts.footer')
        <!-- Kenne's Footer Area End Here -->


    </div>

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{ asset('theme/user/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('theme/user/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('theme/user/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('theme/user/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick Slider JS -->
    <script src="{{ asset('theme/user/js/plugins/slick.min.js') }}"></script>
    <!-- Barrating JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery.barrating.min.js') }}"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery.counterup.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery.nice-select.js') }}"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery.sticky-sidebar.js') }}"></script>
    <!-- Jquery-ui JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('theme/user/js/plugins/jquery.ui.touch-punch.min.js') }}"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ asset('theme/user/js/plugins/theia-sticky-sidebar.min.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('theme/user/js/plugins/waypoints.min.js') }}"></script>
    <!-- jQuery Zoom JS -->
    <script src="{{ asset('theme/user/js/plugins/jquery.zoom.min.js') }}"></script>
    <!-- Timecircles JS -->
    <script src="{{ asset('theme/user/js/plugins/timecircles.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('theme/user/js/main.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York
                // How you would like to style the map.
                // This is where you would paste any style found on
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "useristrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "useristrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.740610, -73.935242),
                map: map,
                title: 'Kenne',
                animation: google.maps.Animation.BOUNCE
            });
        }
    </script>
    <!-- Kenne's Google Map Area End Here -->
</body>


<!-- Mirrored from htmldemo.net/kenne/kenne/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:13:14 GMT -->

</html>
