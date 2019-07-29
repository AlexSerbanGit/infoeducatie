{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

    {{-- <scanner-component></scanner-component> --}}

{{-- @endsection --}}

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <link rel="stylesheet" href="{{ asset('/css/app.css')}}"> --}}

        {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css')}}"> --}}
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
        {{-- <link type="text/css" href="{{ asset('assets/css/argon.css?v=1.0.0') }}" rel="stylesheet"> --}}
        <meta name="api-base-url" content="{{ url('/') }}" />

    </head>
    <body>

        <div id="app">
            <scanner-component></scanner-component>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>

    </body>
</html>
