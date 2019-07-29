@extends('layouts.app')

@section('content')
<div class="container-restaurant">
<div class="container  card shadow" style="min-height: 90vh;margin-top: -60px;padding: 0px;border-radius: 17px;background: linear-gradient(90deg, #A3732F, #F1AA45) !important; border: 0px">
    <div class="cover" style="height: 300px; width: 100%; background: transparent;border-radius: 17px; background-image: url({{ asset('/images/restaurant-2.jpg') }})">
    <div class="row" style="max-width: 100vw">

            <div class="profile" style="height: 200px; max-height: 30vw; min-height: 120px; width: 200px; max-width: 30vw; min-width: 120px; margin-top: 170px; margin-left: 10%; background: white; background-image: url({{ asset('/images/logo.png')}}); background-repeat: no-repeat;  background-position: center; ">

            </div>
            <div class="mo-mo" style="margin-top: 225px;margin-left: 10px;">
            
            <p class="par-1" style="font-size: calc(1em + 2.4vw); font-weight: 600">Mamma mia</p>  
            <p class="par-2" style="font-size: calc(1em + 2vw); margin-top: -35px;  font-weight: 400;">Iasi, Romania</p>

            </div>

    </div>

    </div>
    <div class="for-ix container-fluid" style="margin-top: 80px; min-height: 60vh">

    <p style="font-size: calc(1em + 1.7vw); font-weight: 300; color: white; font-weight: 400;">Produse vandute de Mamma Mia:</p>

    <div class="row">


    <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto; background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/burger-1.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>

<div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto;  background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/pizza-2.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>

<div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto;  background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/soup-3.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>


<div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto; background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/burger-1.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>

<div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto;  background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/pizza-2.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>

<div class="col-md-4 col-sm-6" style="margin-bottom: 20px">

<div class="card" style="width: 90%; margin: auto;  background-color: #A1712E; color: white">
<img class="card-img-top" src="{{ asset('/products/soup-3.jpg') }}" alt="Card image cap">
<div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <span class="badge badge-pill badge-primary">mic dejun</span>
    <div class="" style="margin-top: 10px">
        <button class="btn btn-warning">
            Vezi
        </button>       
        <button class="btn btn-danger">
            Adauga in cos
        </button>    
    </div>
</div>
</div>

</div>

    </div>
</div>
</div>
@endsection