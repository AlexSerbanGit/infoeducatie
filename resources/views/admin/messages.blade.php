@extends('layouts.admin-layout')

@section('content')
<div class="card" style="text-align: left">
    <div class="card-header card-header-warning">
    <h2>
        <b>Mesaje</b>
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
            <th>Email</th>
            <th>Mesaj</th>
            <th class="text-right">Raspunde</th>
            <th class="text-right">Actiuni</th>
        </tr>
    </thead>
    <tbody>
    @foreach($messages as $message)
        <tr>
            <td class="text-center">{{$message->id}}</td>
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>
            @php
                echo substr($message->phone_number, 0, 5);
            @endphp
            </td>
            <td class="text-right"><button class="btn btn-success" data-toggle="modal" data-target="#answer{{$message->id}}">Raspunde</button></td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$message->id}}">
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

@foreach($messages as $message)

<!-- Modal -->
<div class="modal fade" id="delete{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Sterge mesajul
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esti sigur ca doresti sa stergi acest mesaj?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
          <a type="button" class="btn btn-danger" href="{{ url('admin/delete_message/'.$message->id) }}">
          Sterge :(
          </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="answer{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('/admin/answer_message/'.$message->id) }}" method="POST">
    @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Raspunde</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            
            <label>Nume destinatar:</label>
            <input type="text" name="name" readonly class="form-control" value="{{$message->name}}">

        </div>
        <div class="form-group">

            <label>Email destinatar:</label>
            <input type="email" name="email" class="form-control" value="{{$message->email}}" readonly>

        </div>
        <div class="form-group">

            <label>Mesaj:</label>
            <textarea name="me" id="" cols="30" rows="10" class="form-control"></textarea>

        </div>
        <div class="form-group">
            <label>Sterge mesajul dupa ce emailul este trimis:</label>
            <input type="checkbox" name="delete">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <button type="submit" class="btn btn-primary">Trimite</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endforeach
@endsection