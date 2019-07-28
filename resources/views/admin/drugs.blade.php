@extends('layouts.admin-layout')

@section('content')
<div class="card" style="text-align: left">
    <div class="card-header card-header-warning">
    <h2>
        <b>Medicamente</b>
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
            <th>Adaugat de</th>
            <th>Numar de telefon</th>
            <th class="text-right">Vezi</th>
            <th class="text-right">Actiuni</th>
        </tr>
    </thead>
    <tbody>
    @foreach($drugs as $drug)
        <tr>
            <td class="text-center">{{$drug->id}}</td>
            <td>{{$drug->name}}</td>
            <td>Doctor</td>
            <td>{{$drug->phone_number}}</td>
            <td class="text-right"><button class="btn btn-success" data-toggle="modal" data-target="#viewCategory">Vezi</button></td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="modal" data-target="#editUser{{$user->id}}">
                    <i class="material-icons">edit</i>
                </button>
                  @if($drug->banned == 0)
                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#banUser{{$user->id}}">
                    <i class="material-icons">close</i>
                  @else
                    <button type="button" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#banUser{{$user->id}}">
                    <i class="material-icons">check</i>
                  @endif
                </button>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
</div>

</div>
</div>
</div>
@foreach($drugs as $drug)

<!-- Modal -->
<div class="modal fade" id="editUser{{$drug->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('/admin/update_user/'.$drug->id) }}" method="POST">
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
        <input type="text" name="name" class="form-control" value="{{$drug->name}}" required>
        
        </div>
        <div class="form-group">
        
        <label>Numar de telefon:</label>
        <input type="number" name="phone_number" class="form-control" value="{{$drug->phone_number}}" required>
        
        </div>
        <div class="form-group">

        <label>Rol:</label>
        <select name="role_id" class="form-control">
          <option value="1">Doctor</option>
          <option value="0">Utilizator</option>
          <option value="3">Farmacie</option>
          <option value="4">Moderator</option>
        </select>

        </div>
        <div class="form-group">

        <label>Limba:</label>
        <select name="language" class="form-control">
          @if($drug->language == 'Romanian')
            <option value="Romanian">Romana</option>
            <option value="English">Engleza</option>
          @else
            <option value="English">Engleza</option>
            <option value="Romanian">Romana</option>   
          @endif
        </select>

        </div>
        <div class="form-group">
        
        <label>Email:</label>
        <input type="text" name="email" class="form-control" value="{{$drug->email}}">
        
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
<div class="modal fade" id="banUser{{$drug->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        @if($user->banned == 0)
          Baneaza acest utilizator
        @else
          Opreste ban-ul acestui utilizator
        @endif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($user->banned == 0)
          Esti sigur ca doresti sa banezi utilizatorul {{$drug->name}}?
        @else
          Esti sigur ca doresti sa opresti banul utilizatorului {{$drug->name}}?
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        @if($user->banned == 0)
          <a type="button" class="btn btn-danger" href="{{ url('admin/ban_user/'.$user->id) }}">
          Baneaza :(
        @else
          <a type="button" class="btn btn-success" href="{{ url('admin/ban_user/'.$user->id) }}">
          De-baneaza :)
        @endif
        </a>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection