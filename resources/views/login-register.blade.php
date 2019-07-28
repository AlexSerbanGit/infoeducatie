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
    <link href="{{ URL::asset('/multistepform/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="row">
        <div class="col-md-6 offset-md-3 mt-2">
            <user-login-register-component></user-login-register-component>
        </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="{{ URL::asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('/multistepform/js/msform.js') }}"></script>
</body>
</html>
