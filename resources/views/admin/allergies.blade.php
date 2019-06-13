@extends('layouts.app-admin')

@section('content')

<section class="section section-lg pt-lg-0">
<div class="container">
  <div class="row justify-content-center" style="padding-top: 10px">
    <div class="col-lg-12">
      <div class="row row-grid">
        <div class="col-lg-12">
          <div class="card shadow border-0">
            <div class="card-body py-5">
              <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
              <i class="fas fa-allergies"></i>
              </div>
              <h1 class="text-primary text-uppercase">Toate alergiile</h1>
                @if($allergies->count() > 0)
                <div class="row">
                @foreach($allergies as $allergy)

                <div class="col-lg-4" style="margin-top: 10px">
                    <div class="card alert-primary shadow border-0">
                    <div class="card-body py-5">
                        <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                        <i style="color: white" class="fas fa-bacon"></i>
                        </div>
                        <h2 class="text-uppercase" style="color: white">{{$allergy->name}}</h2>
                        <div>
                        <span class="badge badge-pill badge-primary">alergie</span>
                        </div>
                    </div>
                    </div>
                </div>

                @endforeach
                </div>
                @else

                    <h2>Momentan nu ati aduagat nicio alergie</h2>

                @endif

                <button class="btn btn-primary" style="margin-top: 10px">Adauga alergie</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>

<!-- Add allergy modal -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Adauga alergie noua</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

               <div class="form-group">
                    <label>Alege titlul alergiei:</label>
                    <input type="text" class="form-control">
               </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@endsection