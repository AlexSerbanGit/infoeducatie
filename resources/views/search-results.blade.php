@extends('layouts.app')

@section('content')

    @if(isset($product) && $product != null)
        @include('results')
    @endif
    <div class="header pb-1 pt-5 mb-5">
        @if(isset($allergy) && $allergy !== null)
            <section class="section section-lg pt-lg-0 mt--400" style="margin-top: 30px">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-6">
                        <div class="row row-grid">
                            <div class="col-lg-12">
                              <div class="card card-lift--hover shadow border-0">
                                  <div class="card-body py-5">
                                    <div class="px-0">
                                      <img src="../assets/img/theme/team-1-800x800.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 150px;">
                                    </div>
                                    <h2 class="text-success text-uppercase text-center mt-3">{{ $allergy -> name }}</h2>
                                    @if(isset($allergy -> description))
                                        <p class="description mt-3">{{ $allergy -> allergy -> description }}</p>
                                    @endif
                                    {{-- <div>
                                      <span class="badge badge-pill badge-warning">mancare</span>
                                      <span class="badge badge-pill badge-warning">cina</span>
                                    </div> --}}
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
                                        <a href="{{ url('/add_remove_allergy/'.$allergy->id) }}" class="btn btn-primary mt-4 w-100">Adauga la profil</a>
                                    @else
                                        <a href="{{ url('/add_remove_allergy/'.$allergy->id) }}" class="btn btn-danger mt-4 w-100">Sterge de la profil</a>
                                    @endif                              </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </section>
        @endif
    </div>
@endsection
