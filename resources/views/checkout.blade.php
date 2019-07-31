@extends('layouts.app')

@section('content')

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
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
            <h4 class="my-0">Produs1</h4>
            <small class="text-muted">Nume restaurant</small>
            </div>
            <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
            <h4 class="my-0">Produs1</h4>
            <small class="text-muted">Nume restaurant</small>
            </div>
            <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
            <h4 class="my-0">Produs1</h4>
            <small class="text-muted">Nume restaurant</small>
            </div>
            <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$35</strong>
        </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h1 class="mb-3">Datele tale:</h1>
        <p style="font-size: 20px">Asigura-te ca ai introdus datele bine. Daca datele nu sunt introduse bine te rugam sa le editezi din meniul lateral!</p>
        <form action="{{ url('/to_checkout') }}" method="POST">
        @csrf
        <hr class="mb-4">

        <p style="font-size: 20px"><b>Numele tau:</b> <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"></p>
        <p style="font-size: 20px"><b>Adresa ta:</b> <input type="text" name="adress" value="{{ Auth::user()->adress }}" class="form-control"></p>
        <p style="font-size: 20px"><b>Numarul tau de telefon:</b> <input type="text" value="{{ Auth::user()->phone_number }}" name="adress" class="form-control"></p>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Confirma datele si du-ma la pagina de plata</button>
        </form>
    </div>
    </div>

</div>

@endsection