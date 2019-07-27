@extends('layouts.admin-layout')

@section('content')

<div class="card" style="text-align: left">
    <div class="card-header card-header-warning">
    <h2>
        <b>Utilizatori</b>
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
            <th>Nume</th>
            <th>Tip utilizator</th>
            <th>Numar de telefon</th>
            <th class="text-right">Vezi</th>
            <th class="text-right">Actiuni</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>@if($user->role_id == 1) doctor @elseif($user->role_id == 0) utilizator @endif</td>
            <td>{{$user->phone_number}}</td>
            <td class="text-right"><button class="btn btn-success" data-toggle="modal" data-target="#viewCategory">Vezi</button></td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="modal" data-target="#editUser{{$user->id}}">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#deleteCategory">
                    <i class="material-icons">close</i>
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
@foreach($users as $user)

<!-- Modal -->
<div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('/admin/update_user/'.$user->id) }}" method="POST">
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
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
        
        </div>
        <div class="form-group">
        
        <label>Numar de telefon:</label>
        <input type="text" name="phone_number" class="form-control" value="{{$user->phone_number}}" required>
        
        </div>
        <div class="form-group">

        <label>Limba:</label>
        <select name="language" class="form-control">
          @if($user->language == 'Romanian')
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
        <input type="text" name="phone_number" class="form-control" value="{{$user->email}}">
        
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

@endforeach
@endsection