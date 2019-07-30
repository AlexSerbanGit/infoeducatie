<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        }
    </script>

    {{-- @auth @if(Auth::user() && isset(Auth::user() -> city_id))
    <meta name="city_id" content="{{ Auth::user() -> city_id}}"> @endif @endauth --}}

    <title>Infoeducatie | Scanner</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/Contact-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Features-Boxed.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Basic.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Header-Blue.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/Highlight-Clean.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/font_awesome/css/all.css') }}">
    <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
    <meta name="api-base-url" content="{{ url('/') }}" />
    <link rel="stylesheet" href="{{ asset('/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/cart.css') }}">
    <style>
        html body {
            font-family: 'Oswald', sans-serif;
        }
        .header-blue, .footer-basic{
            background: linear-gradient(90deg, #9e6f2d, #f7ae47) !important;
        }
    </style>
</head>

<body>
<div id="overlayer" style="width: 100vw; z-index: 99998;
position: fixed; top: 0; left: 0; right: 0; bottom: 0; height: 100%;
"></div>
<span class="loader">
<span class="loader-inner"></span>
</span>
    <div id="app">
        <div class="header-blue" style="padding-bottom: 100px">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Bee Scanner') }}
                    </a>
                    <button class="navbar-toggler" data-toggle="modal" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <div class="modal-header d-lg-none d-md-none">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <ul class="nav">
                            @auth
                            <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                            </li>
                            </ul>
                            @endauth
                      
                            @auth
                            <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-barcode"></i> Scaneaza</a>
                            </li>
                            </ul>
                            <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/restaurants') }}"><i class="fas fa-utensils"></i> Restaurante</a>
                            </li>
                            </ul>
                            @endauth
                        </ul>
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 ml-auto justify-content-center">
                            {{-- @include('/parts/searchbar') --}} {{--
                            <autocomplete-component></autocomplete-component> --}}
                        </div> -->
                        <ul class="navbar-nav ml-auto">
                            @guest
                            <li class="nav-item">
                                <i class="fas fa-user-edit"></i>dadaada     
                            </li>
                            @else
                         
                        
                            <ul class="navbar-nav align-items-center d-none d-md-flex">
                                <li class="nav-item dropdown">
                                <span class="fa-stack has-badge" data-count="5"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                </span>  
                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" style="margin-top: 10px">
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Carucior cu rotile!</h6>
                                </div>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>ITEM1</span>
                                </a>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>ITEM2</span>
                                </a>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>ITEM3</span>
                                </a>
                                <a href="./examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>ITEM4</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <span class="btn btn-success btn-block">CART</span>
                                </a>
                                </div>
                                </li>
                            </ul>
                           
                            <li class="nav-item" data-toggle="modal" data-target="#profile">
                                <i class="fas fa-user-edit"></i> {{ Auth::user()->name }}      
                            </li>
                            @endguest
                            </ul>
                    </div>
                </div>
            </nav>
            <scanner-component></scanner-component> 
        </div>
        <div class="header-blue" style="min-height: 75vh">
            @if(Session::has('message'))
                <div class="container">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="far fa-star"></i></span>
                        <span class="alert-inner--text"><strong></strong>{{Session::get('message')}}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif @if(Session::has('errors'))
                <div class="container">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="far fa-star"></i></span>
                        <span class="alert-inner--text"><strong></strong>{{ Session::get('errors') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @yield('content')
        </div>
        <div class="footer-basic">
            <footer>
                <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ url('/') }}">Acasa</a></li>
                    <li class="list-inline-item"><a href="{{ url('/register')}}">Creare cont</a></li>
                    <li class="list-inline-item"><a href="{{ url('/login') }}">Inregistrare</a></li>
                </ul>
                <p class="copyright">GoalsScanner © 2019</p>
            </footer>
        </div>
    </div>
    @if(Auth::user()) @include('/parts/profile-part') @endif
    {{-- <script src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Optional JS -->
    <script src="{{ asset('/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>

    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>
    <script>
    $(".loader").delay(500).fadeOut("slow");
    $("#overlayer").delay(500).fadeOut("slow");
  </script>
</body>

</html>
