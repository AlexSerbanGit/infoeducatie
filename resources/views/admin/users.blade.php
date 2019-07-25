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
                <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="modal" data-target="#editCategory">
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
@endsection