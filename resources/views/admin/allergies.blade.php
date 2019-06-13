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
                        <i style="color: white" class="fas fa-allergies"></i>
                        </div>
                        <h2 class="text-uppercase" style="color: white">{{$allergy->name}}</h2>
                        <div>
                        <span class="badge badge-pill badge-primary">alergie</span>
                        </div>
                    </div>
                    <div class="buttons" style="position: absolute; top: 5px; right: 10px">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editAllergy{{$allergy->id}}">Editeaza</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteAllergy{{$allergy->id}}">Sterge</button>
                    </div>
                    </div>
                </div>

                <!-- Modal edit allergy -->
                <div class="modal fade" id="editAllergy{{$allergy->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                    <form action="{{ url('/admin_edit_allergy/'.$allergy->id) }}" method="POST">
                    @csrf
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal-title-default">Editeaza alergia</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">
                            
                                <label>Modifica titlul</label>
                                <input type="text" name="name" class="form-control" required value="{{$allergy->name}}" placeholder="nume">

                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salveaza</button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
                        </div>
                    </form>

                    </div>
                </div>
                </div>

                <div class="modal fade" id="deleteAllergy{{$allergy->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="modal-title" id="modal-title-default">Sterge alergie</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <h2>Doresti sa stergi aceasta alergie?</h2>
                            
                        </div>

                        <div class="modal-footer">
                            <a href="{{ url('admin_delete_allergy/'.$allergy->id) }}">
                                <button type="button" class="btn btn-danger">Sterge</button>
                            </a>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Nu</button>
                        </div>

                    </div>
                </div>
                </div>

                @endforeach
                </div>
                @else

                    <h2>Momentan nu ati aduagat nicio alergie</h2>

                @endif

                <button class="btn btn-primary" style="margin-top: 10px" data-toggle="modal" data-target="#addAllergy">Adauga alergie</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</section>

<!-- Add allergy modal -->
<div class="modal fade" id="addAllergy" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <form action="{{ url('/admin_add_allergy') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-default">Adauga alergie noua</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

               <div class="form-group">
                    <label>Alege titlul alergiei:</label>
                    <input type="text" class="form-control" name="name" required placeholder="nume">
               </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salveaza alergie</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection