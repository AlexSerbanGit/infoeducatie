@extends('layouts.app')

@section('content')
<div class="container-restaurant">
    <div class="container  card shadow" style="min-height: 90vh;margin-top: -60px;padding: 0px;border-radius: 17px;background: linear-gradient(90deg, #A3732F, #F1AA45) !important; border: 0px">
        <div class="cover" style="height: 300px; width: 100%; background: transparent;border-radius: 17px; background-image: url({{ asset('/images/restaurant-2.jpg') }})">
            <div class="row" style="max-width: 100vw">

                    <div class="profile" style="height: 200px; max-height: 30vw; min-height: 120px; width: 200px; max-width: 30vw; min-width: 120px; margin-top: 170px; margin-left: 10%; background: white; background-image: url({{ asset('/images/logo.png')}}); background-repeat: no-repeat;  background-position: center; ">

                    </div>
                    <div class="mo-mo" style="margin-top: 225px;margin-left: 10px;">

                    <p class="par-1" style="font-size: calc(1em + 2.4vw); font-weight: 600; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">{{ $restaurant -> name }}</p>
                    <p class="par-2" style="font-size: calc(1em + 2vw); margin-top: -35px;  font-weight: 400; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">{{ $restaurant -> city -> name }}</p>

                    </div>
            </div>
        </div>
        <div class="for-ix container-fluid" style="margin-top: 80px; min-height: 60vh">

            <p style="font-size: calc(1em + 1.7vw); font-weight: 300; color: white; font-weight: 400;">Produse vandute de acest restaurant:</p>

            <div class="row">
                <restaurant-products></restaurant-products>
            </div>
        </div>
    </div>
</div>
@endsection
