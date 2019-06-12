@extends('layouts.app')

@section('content')

<section class="section section-lg pt-lg-0 mt--350">
      <div class="container">
        <div class="row justify-content-center" style="padding-top: 30px">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-12">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>

                    <h1 class="text-primary text-uppercase"> 
                      Target-curent:
                    </h1>
                    @if(Auth::user()->targets()->count() > 0)

                    @php 

                      $id = 1;

                    @endphp
                    @php

                      $rev = Auth::user()->targets->reverse();

                    @endphp

                    @foreach($rev as $target)

                      @if($id > 1)
                        @php
                          break;
                        @endphp
                      @else
                      @php
                        $id++;
                      @endphp
                        <div class="alert alert-primary">

                          Tip:
                          @if($target->type == 1)
                            Slabire
                          @elseif($target->type == 2)
                            Mentinere
                          @elseif($target->type == 3)
                            Punere masa
                          @endif

                          <div class="abolute-right" style="position: absolute; top: 5px; right: 10px">
                            <button class="btn btn-info">
                            <script>
                            var date = new Date('{{$target->created_at}}');
                            var days = ['Duminica', 'Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata'];
                            var months = ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie','Iulie','August','Septembrie','Octombrie','Novimbrie','Decembrie'];
                            document.write(days[date.getDay()]+', ');
                            document.write(date.toString().slice(8,11)+' ');
                            document.write(months[date.getMonth()]+' ');
                            document.write(date.getFullYear());
                            if(date.getHours() < 10){
                                document.write(' la: 0'+date.getHours()+':');
                            }else{
                                document.write(' la: '+date.getHours()+':');
                            }
                            if(date.getMinutes() < 10){
                                document.write('0'+date.getMinutes());
                            }else{
                                document.write(date.getMinutes());
                            }
                            </script>
                            </button>
                          </div>

                        </div>

                      @endif

                    @endforeach

                    @else

                    <h3>Momentan nu aveti niciun target</h3>

                    @endif

                    <h1 class="text-primary text-uppercase">Istoric target-url</h1>
                    <h2>Mai jos sunt istoricul target-urilor.</h2>

                    @if(Auth::user()->targets()->count() > 0)
                      @php

                        $rev = Auth::user()->targets->reverse();

                      @endphp

                      @foreach($rev as $target)

                          <div class="alert alert-primary">

                            Tip:
                            @if($target->type == 1)
                              Slabire
                            @elseif($target->type == 2)
                              Mentinere
                            @elseif($target->type == 3)
                              Punere masa
                            @endif

                            <div class="abolute-right" style="position: absolute; top: 5px; right: 10px">
                              <button class="btn btn-info">
                              <script>
                              var date = new Date('{{$target->created_at}}');
                              var days = ['Duminica', 'Luni', 'Marti', 'Miercuri', 'Joi', 'Vineri', 'Sambata'];
                              var months = ['Ianuarie','Februarie','Martie','Aprilie','Mai','Iunie','Iulie','August','Septembrie','Octombrie','Novimbrie','Decembrie'];
                              document.write(days[date.getDay()]+', ');
                              document.write(date.toString().slice(8,11)+' ');
                              document.write(months[date.getMonth()]+' ');
                              document.write(date.getFullYear());
                              if(date.getHours() < 10){
                                  document.write(' la: 0'+date.getHours()+':');
                              }else{
                                  document.write(' la: '+date.getHours()+':');
                              }
                              if(date.getMinutes() < 10){
                                  document.write('0'+date.getMinutes());
                              }else{
                                  document.write(date.getMinutes());
                              }
                              </script>
                              </button>
                            </div>

                          </div>


                      @endforeach

                    @else

                      <h3>Momentan nu aveti niciun target</h3>

                    @endif
                    <a href="{{ url('/home') }}" class="btn btn-primary mt-4">Inapoi</a>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection