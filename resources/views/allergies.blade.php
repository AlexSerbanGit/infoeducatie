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
              <i class="fas fa-allergies"></i>
              </div>
              <h1 class="text-primary text-uppercase">Toate alergiile</h1>
              
              <section class="section section-lg pt-lg-0 mt--400" style="margin-top: 30px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">

            @if($allergies->count() > 0)

                @foreach($allergies as $allergy)
                <div class="col-lg-4">
                    <div class="card card-lift--hover alert-primary shadow border-0">
                    <div class="card-body py-5">
                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                            <i  style="color:white" class="fas fa-allergies"></i>
                        </div>
                        <h2 class="text-uppercase" style="color: white">{{$allergy->name}}</h2>
                        <div>
                        <span class="badge badge-pill badge-primary">alergie</span>
                        </div>

                        @php
                            $ok = 1;
                        @endphp

                        @foreach(Auth::user()->allergies as $allergy2)

                            @if($allergy2->allergy_id == $allergy->id)
                                @php
                                    $ok = 0;
                                @endphp
                            @endif

                        @endforeach

                        @if($ok == 1) 
                            <a href="{{ url('/add_remove_allergy/'.$allergy->id) }}" class="btn btn-primary mt-4">Adauga</a>
                        @else
                            <a href="{{ url('/add_remove_allergy/'.$allergy->id) }}" class="btn btn-danger mt-4">Sterge</a>
                        @endif
                    </div>
                    </div>
                </div>
                @endforeach

            @else

                <h1>Momentan nu exista alergii</h1>

            @endif
            
            </div>
          </div>
        </div>
      </div>
    </section>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

@endsection