<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeeScanner - Login / Register</title>

    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    </script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/font_awesome/css/all.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('/css/preloader.css') }}">
    <link href="{{ URL::asset('/multistepform/css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="overlayer" style="width: 100vw; z-index: 99998;position: fixed; top: 0; left: 0; right: 0; bottom: 0; height: 100%;"></div>
    <span class="loader">
        <span class="loader-inner"></span>
    </span>
    <div id="app" class="">
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
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: white;" href="{{ route('login_register') }}">Autentificare / Creare cont</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <scanner-component></scanner-component>
        <div class="col-md-6 offset-md-3 mt-2">
            <user-login-register-component></user-login-register-component>
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="{{ URL::asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('/multistepform/js/msform.js') }}"></script>

    <script>
    $(".loader").delay(500).fadeOut("slow");
    $("#overlayer").delay(500).fadeOut("slow");
  </script>
</body>
</html>
