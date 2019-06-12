<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
        <style>
        html body{
            font-family: 'Oswald', sans-serif;
        }
        </style>
    </head>
    <body>


<div id="app">
        <div class="header-blue" style="padding-bottom: 0px">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'GoalsScanner') }}
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                                </li>
                            @endauth
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-barcode"></i> Scaneaza</a>
                            </li>
                        </ul>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 ml-auto">
                           {{-- @include('/parts/searchbar') --}}
                           {{-- @include('/scanner') --}}

                           <style>
                               .twitter-typeahead,
                               .tt-hint,
                               .tt-input {
                                 width: 140% !important;
                                 border-bottom: 1px solid #218838;
                               }
                               .tt-menu{
                                 width: 140% !important;
                                 font-weight: normal;
                                 height:50vh;
                                 overflow-y: scroll;
                                 margin-left: 0px;
                                 margin-top: 20px;
                                 margin-bottom: 50px;
                               }
                           </style>

                         
                           {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
                           {{-- <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> --}}

                           <div class="form-group">
                               <form action="" method="post" class="input-group mb-4">
                                   @csrf
                                   {{-- <div class="input-group-prepend mt-3">
                                       <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                   </div> --}}
                                    <div class="col w-100">
                                       <input id="search" class="form-control mt-3" type="search" data-provide="typeahead" placeholder="Search" type="text" required autocomplete="off"/>
                                   </div>
                                   <div class="input-group-prepend mt-3">
                                       <button class="btn btn-primary"><i class=""></i> Cauta </button>
                                   </div>
                               </form>
                           </div>
                       </div>
                        <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <li class="nav-item dropdown" style="margin-top: 10px">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                </div>
            </nav>
            {{-- <scanner-component></scanner-component> --}}
        </div>
    </div>
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

        @yield('content')
        </div>
        <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">GoalsScanner © 2019</p>
        </footer>
    </div>

            <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
           
            <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Optional JS -->
            <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
            <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>

            <!-- Argon JS -->
            <script src="./assets/js/argon.js?v=1.0.0"></script> 

            <script src="{{ asset('js/app.js') }}"></script>

            

       	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

         	<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

            <script>
               $(document).ready(function() {
                   var bloodhound = new Bloodhound({
                       datumTokenizer: Bloodhound.tokenizers.whitespace,
                       queryTokenizer: Bloodhound.tokenizers.whitespace,
                       remote: {
                           url: '/api/get/items',
                           wildcard: '%QUERY%'
                       },
                   });

                   $('#search').typeahead({
                       hint: true,
                       highlight: true,
                       minLength: 3,
                   }, {
                       name: '',
                       limit: 1000,
                       source: bloodhound,
                       display: function(data) {
                           return data.name  //Input value to be set when you select a suggestion.
                       },
                       templates: {
                           empty: [
                               '<div class="list-group search-results-dropdown"><div class="list-group-item"> Nu au fost găsite rezultate.</div></div>'
                           ],
                           header: [
                               '<div class="list-group search-results-dropdown col-md-12">'
                           ],
                           suggestion: function(data) {
                               return '<div style="font-weight:normal! important;" class="list-group-item">' + data.name + '</div></div>'
                           }
                       }
                   });
                 });
            </script>

    </body>
</html>
