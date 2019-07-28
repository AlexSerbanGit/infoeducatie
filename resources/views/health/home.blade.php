@extends('layouts.app')

@section('content')
<style>
    .header-blue, .footer-basic{
        background: linear-gradient(90deg, #156D27, #A3C239); !important;
    }
</style>
<div class="container" style="margin-top: -50px;">
    <div class="col-xl-12 col-lg-12">
        <div class="card card-stats mb-4 mb-xl-0" style=" min-height: 80vh">
        <div class="card-body">
            <div class="row">
            <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Sanatate</h5>
                <span class="h2 font-weight-bold mb-0"></span>
            </div>
            <div class="col-auto">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                <i class="fas fa-heartbeat"></i>
                </div>
            </div>
            </div>
            <div class="row">

                <div class="col-md-2 col-sm-3 col-xs-12 col-lg-2" style="margin-top: 5px">
                    <button class="btn btn-warning">Cea mai apropiata farmacie</button>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-1" style="margin-top: 5px"></div>
                <div class="col-md-8 col-sm-12 col-xs-8 col-lg-9" style="margin-top: 5px">
                <form class="form-inline">
                    <div class="row" style="width: 100%">
                        <div class="col-sm-10">
                            <input class="form-control mr-sm-2" type="search" placeholder="Farmacii, doctori si medicamente" aria-label="Search" style="width: 100%">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cauta</button>
                        </div>
                    </div>
                </form>
                </div>

            </div>

            <!-- PREZENTARE PRODUSE / FARMACII / DOCTORI  -->
            <div class="row" style="margin-top: 18px">
            <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6">
              <div class="card card-stats mb-4 mb-xl-0" style="height: 100%">
                <div class="card-body">
                  <div class="row">
                    <div class="box" style="width: 100%; height: 200px;text-align: center;  white-space: nowrap;

    text-align: center; margin: 1em 0;">
                    <span style="  display: inline-block;
    height: 100%;
    vertical-align: middle;"></span>
                    <img src="https://getbootstrap.com/docs/4.3/assets/img/bootstrap-themes@2x.png" alt="imagine" style="width: 100%; height:auto ;max-width: 100%; max-height: 100%; display: inline-block;
  vertical-align: middle;">

                    </div>

                    <div class="col">
                      <h3 class="card-title text-uppercass mb-0">Nume farmacie</h5>
                      <h4 class="card-title">Locatie: locatie farmacie</h4>
                      <button class="btn btn-warning">Vezi pe harta</button>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                  </div>


                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-6 col-xs-6">
              <div class="card card-stats mb-4 mb-xl-0"  style="height: 100%">
                <div class="card-body">
                  <div class="row">
                    <div class="box" style="width: 100%; height: 200px;text-align: center;  white-space: nowrap;

    text-align: center; margin: 1em 0;">
                    <span style="  display: inline-block;
    height: 100%;
    vertical-align: middle;"></span>
                    <img src="http://www.pharmasavebroadmead.com/pharmasavebroadmead_com/bank/pageimages/dsc_8314.jpg" alt="imagine" style="width: 100%; height:auto ;max-width: 100%; max-height: 100%; display: inline-block;
  vertical-align: middle;">

                    </div>

                    <div class="col">
                      <h3 class="card-title text-uppercass mb-0">Nume farmacie</h5>
                      <h4 class="card-title">Locatie: locatie farmacie</h4>
                      <button class="btn btn-warning">Vezi pe harta</button>
                      <span class="h2 font-weight-bold mb-0"></span>
                    </div>
                  </div>


                </div>
              </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection
