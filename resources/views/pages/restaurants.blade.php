@extends('layouts.app')

@section('content')

    <style>
        .header-blue,
        .footer-basic {
            /* background: linear-gradient(90deg, #156D27, #A3C239); !important; */
        }
    </style>

    <div class="container">
        <div class="col-xl-12 col-lg-12">
            <div class="card card-stats mb-4 mb-xl-0" style=" min-height: 80vh">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Restaurante</h5>
                            <span class="h2 font-weight-bold mb-0"></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                        </div>
                    </div>
                    <restaurants-search></restaurants-search>
                </div>
            </div>
        </div>
    </div>
@endsection
