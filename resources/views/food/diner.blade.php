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
              <i class="fas fa-drumstick-bite"></i>
              </div>
              <h1 class="text-primary text-uppercase">Cina</h1>

                <h2>Mancaruri sugerate:</h2>
                @if($products->count() > 0)
                @php

                $ok = 0;

                @endphp<div class="row">
                @foreach($products as $product)
                    

                    @if($product->foodType->count() > 0)
                        
                        @foreach($product->foodType as $type)

                            @if($type->type == 3)

                                @php
                                    $ok = 1;
                                @endphp

                                @if($product->category == 1)
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
                                            <a href="" class="btn btn-primary mt-4">Adauga</a>
                                    </div>
                                    </div>
                                </div>
                                @endif

                            @endif

                        @endforeach
                        

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
                   
                @if($product->foodType->count() > 0)
                       
                        @foreach($product->foodType as $type)
                        @if($type -> type == 3)
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
                                            <a href="" class="btn btn-primary mt-4">Adauga</a>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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