@extends('layouts.admin-layout')

@section('content')
<div class="card" style="text-align: left">
    <div class="card-header card-header-warning">
    <h2>
        <b>Alergii</b>
    </h2>
    </div>
    <div class="card-body">
    <div class="row">
<div class="container-fluid"> 
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Denumire</th>
            <th>Produse pentru aceasta alergie</th>
            <th class="text-right">Actiuni</th>
        </tr>
    </thead>
    <tbody>
    @foreach($allergies as $allergy)
        <tr>
            <td class="text-center">{{$allergy->id}}</td>
            <td>{{$allergy->name}}</td>
            <td>{{$allergy->products->count()}}</td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$allergy->id}}">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$allergy->id}}">
                <i class="material-icons">close</i>
                </button>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
</div>
<button class="btn btn-warning" data-toggle="modal" data-target="#addAllergy">Adauga alergie</button>
</div>
</div>
</div>

<!-- Modal add restaurant -->
<div class="modal fade" id="addAllergy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('/admin/add_allergy') }}" method="POST">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adauga restaurant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        
          <label>Nume alergie:</label>
          <input type="text" class="form-control" required name="name" placeholder="">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <button type="submit" class="btn btn-warning">Adauga alergie</button>
      </div>
      </form>
    </div>
  </div>
</div>

@foreach($allergies as $allergy)

<!-- Modal -->
<div class="modal fade" id="edit{{$allergy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('/admin/edit_allergy/'.$allergy->id) }}" method="POST">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifica datele utilizatorului</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

        <label>Nume:</label>
        <input type="text" name="name" class="form-control" value="{{$allergy->name}}" required>
        
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <button class="btn btn-warning">Salveaza modificarile</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete{{$allergy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Sterge alergie
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esti sigur ca doresti sa stergi aceasta alergie?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
          <a type="button" class="btn btn-danger" href="{{ url('admin/delete_allergy/'.$allergy->id) }}">
            Sterge
          </a>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection