@extends('layouts.app')

@section('content')

    <search-component></search-component>

    {{-- <div class="container">
        <div class="header-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@if($user -> stats)
<!-- Header -->
<div class="header pb-1 pt-2 ">
      <div class="container">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">

          @if($user -> targets()->count() > 0)
          @php

          $id = 1;

          @endphp
          @php

          $rev = $user -> targets->reverse();

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
          @endif
          <!-- Recalcularea in functie de target -->
          @if($target->type == 1)
            @php
              $kcal = $user -> stats->kcal - 500;
              $fat = $kcal*3/10/9;

              $kcalcarbo = $kcal - $fat*9 - $user -> stats->protein*4;
              $carbo = $kcalcarbo/4;
            @endphp
          @endif

          @if($target->type == 2)
            @php
              $kcal = $user -> stats->kcal;
              $fat = $user -> stats->fat;
              $carbo = $user -> stats->carbo;
            @endphp
          @endif

          @if($target->type == 3)
            @php
              $kcal = $user -> stats->kcal + 200;
              $fat = $kcal*3/10/9;

              $kcalcarbo = $kcal - $fat*9 - $user -> stats->protein*4;
              $carbo = $kcalcarbo/4;
            @endphp
          @endif

            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Proteine</h5>
                      <span class="h2 font-weight-bold mb-0">{{$user -> stats->protein}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Carbohidrati</h5>
                      <span class="h2 font-weight-bold mb-0">@php echo (int)$carbo @endphp</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0"style="margin-top: 30px">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Grasimi</h5>
                      <span class="h2 font-weight-bold mb-0">@php echo (int)$fat @endphp</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0"style="margin-top: 30px">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Calorii</h5>
                      <span class="h2 font-weight-bold mb-0">@php echo (int)$kcal @endphp</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            @endforeach
            @else


            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Proteine</h5>
                      <span class="h2 font-weight-bold mb-0">{{$user -> stats->protein}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Carbo</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $user -> stats->carbo }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0"style="margin-top: 30px">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Grasimi</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $user -> stats->fat }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-lift--hover  card-stats mb-4 mb-xl-0"style="margin-top: 30px">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Calorii</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $user -> stats->kcal }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Fata de ieri</span>
                  </p>
                </div>
              </div>
            </div>


            @endif
          </div>
        </div>
      </div>
    </div>

<section class="section section-lg pt-lg-0 mt--400" style="margin-top: 30px">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="row row-grid">
        <div class="col-lg-12">
          <div class="card card-lift--hover shadow border-0">
            <div class="card-body py-5">
              <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
              <i class="fas fa-allergies"></i>
              </div>
              <h1 class="text-primary text-uppercase">Alergiile tale</h1>
              @if($user -> allergies->count() > 0)
                <div class="row">

                  @foreach($user -> allergies as $allergy)

                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="alert alert-primary">
                        {{$allergy->allergy->name}}

                        <div class="buttons" style="position: absolute; top: 5px; right: 10px">
                          <a data-toggle="modal" data-target="#removeAllergy{{$allergy->id}}" class="btn btn-danger">X</a>
                        </div>
                      </div>
                    </div>

                  @endforeach

                </div>
              @else
                <h2>Momentan nu ati declarat nicio alergie</h2>
              @endif

              <a href="{{ url('all_allergies') }}">
                <button class="btn btn-danger">Adauga</button>
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@if($user -> allergies->count() > 0)

    @foreach($user -> allergies as $allergy)
    <div class="modal fade" id="removeAllergy{{$allergy->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default"><h1>Elimini alergia din lista ta?</h1></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <h2>Aceasta alergie va fi stearsa din contul tau!</h2>

            </div>

            <div class="modal-footer">
                <a href="{{ url('add_remove_allergy/'.$allergy->allergy_id) }}">
                  <button type="button" class="btn btn-danger">Sterge</button>
                </a>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
            </div>

        </div>
    </div>
    </div>
    @endforeach

@endif

    <section class="section section-lg pt-lg-0 mt--400" style="margin-top: 30px">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-12">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="fas fa-bullseye"></i>
                    </div>
                    <h1 class="text-primary text-uppercase">Progres</h1>
                    @if($user -> targets()->count() > 0)
                        @php

                        $id = 1;

                        @endphp
                        @php

                        $rev = $user -> targets->reverse();

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

                            Tip:
                            @if($target->type == 1)
                              Slabire
                            @elseif($target->type == 2)
                              Mentinere
                            @elseif($target->type == 3)
                              Punere masa
                            @endif
                            @if($user -> dailyProgresses->count() > 0)

                            @php

                            $rev2 = $user -> dailyProgresses->reverse();

                            @endphp

                            @foreach($rev2 as $progress)
                              @php
                              $currentProtein = $progress->protein/$user -> stats->protein*100;
                              $currentCarbo = $progress->carbo/$carbo*100;
                              $currentKcal = $progress->kcal/$kcal*100;
                              $currentFat = $progress->fat/$fat*100;


                                break;
                              @endphp

                            @endforeach

                            <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Proteine</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>{{(int)$currentProtein}}%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="{{$user -> protein}}" style="width: {{$currentProtein}}%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Carbohidrati</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>{{(int)$currentCarbo}}%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{(int)$currentCarbo}}%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Grasimi</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>{{(int)$currentFat}}%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{(int)$currentFat}}%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Calorii</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>{{(int)$currentKcal}}%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{(int)$currentKcal}}%;"></div>
                            </div>
                          </div>


                            @else

                            <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Proteine</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>0%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Carbohidrati</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>0%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Grasimi</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>0%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                            </div>
                          </div>

                          <div class="progress-wrapper">
                            <div class="progress-info">
                              <div class="progress-label">
                                <span><h3>Calorii</h3></span>
                              </div>
                              <div class="progress-percentage">
                                <span>0%</span>
                              </div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                            </div>
                          </div>

                            @endif
                        @endif
                        @endforeach
                    @else
                      Nu aveti target-uri active
                    @endif
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-lg pt-lg-0 mt--350">
      <div class="container">
        <div class="row justify-content-center" style="margin-top: 30px">
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
                    @if($user -> targets()->count() > 0)

                    @php

                      $id = 1;

                    @endphp
                    @php

                      $rev = $user -> targets->reverse();

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
                            // document.write(days[date.getDay()]+', ');
                            document.write(date.toString().slice(8,11)+' ');
                            document.write(months[date.getMonth()]+' ');
                            document.write(date.getFullYear());
                            </script>
                            </button>
                          </div>

                        </div>

                      @endif

                    @endforeach

                    @else

                    <h3>Momentan nu aveti niciun target</h3>

                    @endif

                    <h1 class="text-primary text-uppercase">Ultimele target-url</h1>
                    <h2>Mai jos sunt ultimele tale target-uri.</h2>

                    @if($user -> targets()->count() > 0)

                      @php

                        $id = 1;

                      @endphp
                      @php

                        $rev = $user -> targets->reverse();

                      @endphp

                      @foreach($rev as $target)

                        @if($id > 5)
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
                              // document.write(days[date.getDay()]+', ');
                              document.write(date.toString().slice(8,11)+' ');
                              document.write(months[date.getMonth()]+' ');
                              document.write(date.getFullYear());
                              </script>
                              </button>
                            </div>

                          </div>

                        @endif

                      @endforeach

                    @else

                      <h3>Momentan nu aveti niciun target</h3>

                    @endif

                    <a href="#" class="btn btn-primary mt-4" data-toggle="modal" data-target="#add-target">Adauga target nou</a>
                    <a href="{{ url('your_targets')}}" class="btn btn-primary mt-4">Vezi istoricul target-urilor tale</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Add new target - modal -->
<div class="modal fade" id="add-target" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">

      <form action="{{ url('/add_target') }}" method="POST">
      @csrf

        <div class="modal-header">
            <h2 class="modal-title" id="modal-title-default">Adauga un nou target</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">

            Alege tipul target-ului:
            <select name="type" id="" class="form-control" required style="margin: 10px 0px">
                <option value="" hidden>Alege</option>
                <option value="1">Slabit</option>
                <option value="2">Mentinere</option>
                <option value="3">Punere masa</option>
            </select>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Creaza</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
        </div>

      </form>

    </div>
</div>
</div>

@else
    <div class="container">
    <tag-random style="color: white;">Nu ati introdus datele. Va rugam le introduceti dand click pe butonus de mai jos:</tag-random>
    <br>
    <button class="btn btn-warning as-button-data" style="margin-top: 10px" data-toggle="modal" data-target="#modal-notification">Introdu datele</button>
    </div>

    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <form action="{{ url('update_user') }}" method="POST">
            @csrf

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Obligatoriu</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Te rugam sa-ti introduci datele intai!</h4>

                    <div class="form-group">
                        <label>Sexul:</label>
                        <select name="gender" id="" class="form-control" required>
                            <option value="" hidden>Alege</option>
                            <option value="1">Barbat</option>
                            <option value="2">Femeie</option>
                        </select>

                        <label>Varsta(ani)</label>
                        <input type="number" min="1" class="form-control" required name="age" placeholder="varsta">

                        <label>Greutate(kg)</label>
                        <input type="number" min="1" class="form-control" required name="weight" placeholder="greutatea">

                        <label>Inaltimea(cm)</label>
                        <input type="number" min="1" class="form-control" required name="height" placeholder="inaltimea">

                        <label>Stil de viata:</label>
                        <select name="lifestyle" class="form-control" required>
                            <option value="">Alege</option>
                            <option value="1">Sedentar</option>
                            <option value="2">Normal</option>
                            <option value="3">Activ</option>
                            <option value="4">Sportiv</option>
                        </select>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-white">Salveaza</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Inchide</button>
            </div>

            </form>

        </div>
    </div>
</div>
@endif

<section class="section section-lg pt-lg-0 mt--400" style="margin-top: 30px">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="fas fa-bacon"></i>
                    </div>
                    <h2 class="text-primary text-uppercase">Mic dejun</h2>
                    <p class="description mt-3">Meniuri si produse recomandate pentru micul dejun.</p>
                    <div>
                      <span class="badge badge-pill badge-primary">mancare</span>
                      <span class="badge badge-pill badge-primary">mic dejun</span>
                    </div>
                    <a href="{{ url('/breakfast') }}" class="btn btn-primary mt-4">Vezi</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                      <i class="fas fa-utensils"></i>
                    </div>
                    <h2 class="text-success text-uppercase">Masa de pranz</h2>
                    <p class="description mt-3">Meniuri si produse recomandate pentru pranz.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">mancare</span>
                      <span class="badge badge-pill badge-warning">cina</span>

                    </div>
                    <a href="{{ url('/meal') }}" class="btn btn-success mt-4">Vezi</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                      <i class="fas fa-drumstick-bite"></i>
                    </div>
                    <h2 class="text-warning text-uppercase">Cina</h2>
                    <p class="description mt-3">Meniuri si produse recomandate pentru cina.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">mancare</span>
                      <span class="badge badge-pill badge-warning">cina</span>
                    </div>
                    <a href="{{ url('/dinner') }}" class="btn btn-warning mt-4">Vezi</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0" style="margin-top: 30px">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                    <i class="fas fa-cookie-bite"></i>
                    </div>
                    <h2 class="text-warning text-uppercase">Gustare</h2>
                    <p class="description mt-3">Meniuri si produse recomandate pentru o gustare.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">mancare</span>
                      <span class="badge badge-pill badge-warning">gustare</span>
                    </div>
                    <a href="{{ url('/snack') }}" class="btn btn-warning mt-4">Vezi </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
