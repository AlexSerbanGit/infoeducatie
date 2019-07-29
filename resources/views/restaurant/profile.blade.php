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
                    @foreach ($restaurant -> products as $key => $product)
                        <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                            <div class="card" style="width: 90%; margin: auto; background-color: #A1712E; color: white">
                                <img class="card-img-top" src="{{ asset('/products/' . $product -> image) }}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-text">{{ $product -> description }}</p>
                                    @if($product -> type == 1)
                                        <span class="badge badge-pill badge-dark">Mic dejun</span>
                                    @elseif($product -> type == 2)
                                        <span class="badge badge-pill badge-dark">Pranz</span>
                                    @elseif($product -> type == 3)
                                        <span class="badge badge-pill badge-dark">Cina</span>
                                    @elseif($product -> type == 4)
                                        <span class="badge badge-pill badge-dark">Gustare</span>
                                    @endif
                                    <span class="badge badge-pill badge-danger">{{ $product -> weight }} (g)</span>
                                    <span class="badge badge-pill badge-danger">{{ $product -> protein }} proteine</span>
                                    <span class="badge badge-pill badge-danger">{{ $product -> fat }} grasimi</span>
                                    <span class="badge badge-pill badge-danger">{{ $product -> carbo }} carbo</span>
                                    <span class="badge badge-pill badge-danger">{{ $product -> kcal }} kcal</span>
                                    @foreach ($product -> allergies as $key => $allergy)
                                        <span class="badge badge-pill badge-primary">{{ $allergy -> name }}</span>
                                    @endforeach
                                    <div class="" style="margin-top: 10px">
                                        {{-- <button class="btn btn-warning">
                                            Vezi
                                        </button> --}}
                                        <button class="btn btn-danger w-100">
                                            Adauga in cos
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
