@extends('layouts.admin-layout')

@section('content')

<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/search?q=restaurant&key=AIzaSyBN1eg2qUIItovi63eEpwjrVa4HWCfXcm4" allowfullscreen></iframe>
<div class="container">
        {!! $chart->container() !!}
        {!! $chart->script() !!}
    </div>
@endsection