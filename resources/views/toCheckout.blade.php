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

    <title>BeeScanner</title>
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
    <meta name="api-base-url" content="{{ url('/') }}" />
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
    <div id="">
        <div class="header-blue" style="padding-bottom: 100px">
        
        </div>
        <div class="header-blue" style="min-height: 100vh">
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
       
        <div class="container card">
            <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ asset('/images/beescanner.png') }}" alt="" width="200" height="auto">
            <h2>Cos de cumparaturi</h2>
            <p class="lead">Plateste comanda cu PayPal sau cardul. Intai asigura te ca preodusele de mai jos sunt cele dorite de tine:</p>
            </div>

            <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Cosul tau</span>
                <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                @php
                    $total = 0;
                @endphp
                @foreach(Auth::user()->cart as $product)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                    <h4 class="my-0">{{$product->product->name}}</h4>
                    <small class="text-muted">{{ $product->product->restaurant->name }}</small>
                    </div>
                    <span class="text-muted">{{$product->product->price * $product->quantity}} lei</span>
                    @php
                        $total += $product->product->price * $product->quantity;
                    @endphp
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                    <h4 class="my-0">Transport</h4>
                    </div>
                    <span class="text-muted">15 lei</span>
                    @php
                        $total += 15;
                    @endphp
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total </span>
                    <strong>{{$total}} lei</strong>
                </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <p class="lead" class="mb-3">{{ Auth::user()->name }}, comanda ta va fi livrata la adresa: {{ Auth::user()->adress }} imediat dupa ce platesti comanda. O factura va fi trimisa pe adresa ta de email: {{ Auth::user()->email }} <br> Curierul te va contacta la numarul: {{ Auth::user()->phone_number }} cand este aproape de resedinta ta.</p>
                <div class="links">
                    <div id="paypal-button"></div>
                </div>
            </div>
            </div>

        </div>
        </div>
    </div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      paypal.Button.render({
        env: 'sandbox', // sau 'production'
        style: {
          size: 'large',
          color: 'gold',
          shape: 'pill',
          fundingicons: true,
        },
        payment: function(data, actions) {

          return actions.request.post(" {{url('/api/create-payment/'.Auth::user()->id)}} ")
            .then(function(res) {
              return res.id;
            });
        },        


        onAuthorize: function(data, actions) {
          return actions.request.post("{{ url('api/execute-payment/'.Auth::user()->id)}}", {
            paymentID: data.paymentID,
            payerID:   data.payerID,
          })
            .then(function(res) {
              console.log(res);
              alert('Plata realizata cu succes!!');
            })
            .catch(function(res) {
                alert('Te rugam sa finalizazi plata!');
            });
        }
      }, '#paypal-button');
    </script>
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
