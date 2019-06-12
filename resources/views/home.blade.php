@extends('layouts.app')

@section('content')

@if(Auth::user()->stats)
<!-- Header -->
<div class="header pb-8 pt-5 ">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Proteine</h5>
                      <span class="h2 font-weight-bold mb-0">{{Auth::user()->stats->protein}}</span>
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
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Carbo</h5>
                      <span class="h2 font-weight-bold mb-0">{{ Auth::user()->stats->carbo }}</span>
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
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Grasimi</h5>
                      <span class="h2 font-weight-bold mb-0">{{ Auth::user()->stats->fat }}</span>
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
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Calorii</h5>
                      <span class="h2 font-weight-bold mb-0">{{ Auth::user()->stats->kcal }}</span>
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
          </div>
        </div>
      </div>
    </div>
   
    <section class="section section-lg pt-lg-0 mt--350">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row row-grid">
              <div class="col-lg-12">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                      <i class="ni ni-check-bold"></i>
                    </div>
                    <h6 class="text-primary text-uppercase">Download Argon</h6>
                    <p class="description mt-3">Argon is a great free UI package based on Bootstrap 4 that includes the most important components and features.</p>
                    <div>
                      <span class="badge badge-pill badge-primary">design</span>
                      <span class="badge badge-pill badge-primary">system</span>
                      <span class="badge badge-pill badge-primary">creative</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Learn more</a>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    
    
   
@else
    <div class="container">
    <tag-random style="color: white;">Nu ati introdus datele. Va rugam le introduceti dand click pe butonus de mai jox:</tag-random>
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
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
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
                    <h6 class="text-primary text-uppercase">Mic dejun</h6>
                    <p class="description mt-3">Prima masa a zilei.</p>
                    <div>
                      <span class="badge badge-pill badge-primary">mancare</span>
                      <span class="badge badge-pill badge-primary">mic dejun</span>
                    </div>
                    <a href="#" class="btn btn-primary mt-4">Vezi</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                      <i class="fas fa-utensils"></i>
                    </div>
                    <h6 class="text-success text-uppercase">Masa de pranz</h6>
                    <p class="description mt-3">Mancare.</p>
                    <div>
                      <span class="badge badge-pill badge-success">business</span>
                      <span class="badge badge-pill badge-success">vision</span>
 
                    </div>
                    <a href="#" class="btn btn-success mt-4">Vezi</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                      <i class="ni ni-planet"></i>
                    </div>
                    <h6 class="text-warning text-uppercase">Prepare Launch</h6>
                    <p class="description mt-3">Argon is a great free UI package based on Bootstrap 4 that includes the most important components and features.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">marketing</span>
                      <span class="badge badge-pill badge-warning">product</span>
                      <span class="badge badge-pill badge-warning">launch</span>
                    </div>
                    <a href="#" class="btn btn-warning mt-4">Learn more</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-lift--hover shadow border-0" style="margin-top: 30px">
                  <div class="card-body py-5">
                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                    <i class="fas fa-cookie-bite"></i>
                    </div>
                    <h3 class="text-warning text-uppercase">Snack</h3>
                    <p class="description mt-3">Gustari dintre mese.</p>
                    <div>
                      <span class="badge badge-pill badge-warning">mancare</span>
                      <span class="badge badge-pill badge-warning">gustare</span>
                    </div>
                    <a href="#" class="btn btn-warning mt-4">Vezi </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection
