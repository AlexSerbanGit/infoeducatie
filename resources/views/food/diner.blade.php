@extends('layouts.app')

@section('content')

<section class="section section-lg pt-lg-0 mt--400">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="row row-grid">
        <div class="col-lg-12">
          <div class="card shadow border-0">
            <div class="card-body py-5">
              <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
              <i class="fas fa-bacon"></i>
              </div>
              <h1 class="text-primary text-uppercase">Cina</h1>

                <h2>Mancaruri sugerate:</h2>
                @if($products->count() > 0)
                @php

                $ok = 0;

                @endphp<div class="row">
                @foreach($products as $product)
                    

                    @if($product->product_type == 3)
                        @php
                            $ok = 1;
                        @endphp
                                <div class="col-lg-4" style="margin-top: 10px">
                                    <div class="card alert-primary shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                        <i style="color: white" class="fas fa-bacon"></i>
                                        </div>
                                        <h2 class="text-uppercase" style="color: white">{{$product->name}}</h2>
                                        <div>
                                        <span class="badge badge-pill badge-primary">produs</span>
                                        </div>
                                            <a class="btn btn-primary mt-4" data-toggle="modal" data-target="#eat-pro1{{$product->id}}">Adauga</a>

                                            <a class="btn btn-success mt-4" data-toggle="modal" data-target="#about-pro1{{$product->id}}">Despre</a>
                                    </div>
                                    </div>
                                </div>        


                                <div class="modal fade" id="about-pro1{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modal-title-default">{{ $product->name }}</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            Proteine: {{$product->protein}}g / 100g <br>
                                            Carbohidrati: {{$product->carbo}}g / 100g <br>
                                            Grasimi: {{$product->fat}}g / 100g <br>
                                            Calorii: {{$product->kcal}}g / 100g <br>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
                                        </div>

                                    </div>
                                </div>
                                </div>

                                <div class="modal fade" id="eat-pro1{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modal-title-default">Adaugi acest produs la target-ul tau?</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <h2>Doresti sa adaugi acest produs la target-ul tau?</h2>
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <a href="{{ url('/add_to_your_target/'.$product->id) }}">
                                                <button type="button" class="btn btn-primary">Da</button>
                                            </a>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Incide</button>
                                        </div>

                                    </div>
                                </div>
                                </div>
             

                    @endif                    

                @endforeach
                </div>

                    @if($ok == 0)

                        Nu sunt produse sugerate

                    @endif

                @else

                    Momentan nu exista produse

                @endif
                
                <h2>Mancaruri:</h2>
                
                @if($products->count() > 0)
                <div class="row">
                @foreach($products as $product)
                   
                @if($product->product_type == 1)
                                <div class="col-lg-4" style="margin-top: 10px">
                                    <div class="card alert-primary shadow border-0">
                                    <div class="card-body py-5">
                                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                        <i style="color: white" class="fas fa-bacon"></i>
                                        </div>
                                        <h2 class="text-uppercase" style="color: white">{{$product->name}}</h2>
                                        <div>
                                        <span class="badge badge-pill badge-primary">produs</span>
                                        </div>
                                            <a class="btn btn-primary mt-4" data-toggle="modal" data-target="#eat-pro{{$product->id}}">Adauga</a>

                                            <a class="btn btn-success mt-4" data-toggle="modal" data-target="#about-pro{{$product->id}}">Despre</a>
                                    </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="about-pro{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modal-title-default">{{ $product->name }}</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            Proteine: {{$product->protein}}g / 100g <br>
                                            Carbohidrati: {{$product->carbo}}g / 100g <br>
                                            Grasimi: {{$product->fat}}g / 100g <br>
                                            Calorii: {{$product->kcal}}g / 100g <br>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
                                        </div>

                                    </div>
                                </div>
                                </div>

                                <div class="modal fade" id="eat-pro{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h2 class="modal-title" id="modal-title-default">Adaugi acest produs la target-ul tau?</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <h2>Doresti sa adaugi acest produs la target-ul tau?</h2>
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <a href="{{ url('/add_to_your_target/'.$product->id) }}">
                                                <button type="button" class="btn btn-primary">Da</button>
                                            </a>
                                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Incide</button>
                                        </div>

                                    </div>
                                </div>
                                </div>
                    @endif
                              

                @endforeach
                </div>
                @else

                    Momentan nu exista produse

                @endif

            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>

@endsection