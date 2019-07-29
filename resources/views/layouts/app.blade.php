<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>
<<<<<<< HEAD
=======
        @auth
        @if(Auth::user() && isset(Auth::user() -> city_id))
            <meta name="city_id" content="{{ Auth::user() -> city_id}}">
        @endif
        @endauth
>>>>>>> 10f1e5bd2b08bff64f6a207cb2df6e16778aed50

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
        <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/font_awesome/css/all.css') }}">
        <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <meta name="api-base-url" content="{{ url('/') }}" />

        <style>
        html body{
            font-family: 'Oswald', sans-serif;
        }
        </style>
    </head>
    <body>
        <div id="app">
            <div class="header-blue" style="padding-bottom: 100px">
                <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                    <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Bee Scanner') }}
                    </a>
                    <button class="navbar-toggler" data-toggle="modal" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse"
                            id="navcol-1">
                            <div class="modal-header d-lg-none d-md-none">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <ul class="nav navbar-nav">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                                    </li>
                                @endauth
                            </ul>

                            <ul class="nav navbar-nav">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-barcode"></i> Scaneaza</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/restaurants') }}"><i class="fas fa-utensils"></i> Restaurante</a>
                                    </li>
                                    {{-- @if(Auth::user()->role == 2)
                                        <li class="nav-item">
                                            <a href="{{ url('/admin') }}" class="nav-link">Administrare</a>
                                        </li>
                                    @endif --}}
                                @endauth
                            </ul>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 ml-auto justify-content-center">
                               {{-- @include('/parts/searchbar') --}}
                               {{-- <autocomplete-component></autocomplete-component> --}}
                           </div>
                            <ul class="navbar-nav ml-auto">
                            @auth
                            {{-- <profile-or-logout></profile-or-logout> --}}
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login_register') }}">{{ 'Autentificare / Creare cont' }}</a>
                                </li>
                            @else
                                <!-- <li class="nav-item row" style="margin-top: 10px"> -->
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> --}}

                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div> --}}

                                <a class="nav-link" data-toggle="modal" data-target="#profile">
                                    <i class="fas fa-user-edit"></i></i> {{ Auth::user()->name }}
                                </a>
                            @endguest
                        </ul>
                    </div>
                </nav>
                {{-- <scanner-component></scanner-component> --}}
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
            @endif
            @if(Session::has('errors'))
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
    @if(Auth::user())
        @include('/parts/profile-part')
    @endif
    <!-- <script src="{{ asset('/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> -->

    <!-- Optional JS -->
    <script src="{{ asset('/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- Argon JS -->
    <script src="{{ asset('/assets/js/argon.js?v=1.0.0') }}"></script>

    </body>
</html>
