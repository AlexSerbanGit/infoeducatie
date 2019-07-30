@extends('layouts.restaurant-layout')

@section('content')
<style>
    img{
        max-width: 100%;
    }
</style>
<div class="card" style="text-align: left">
    <div class="card-header card-header-danger">
    <h2>
        <b>Produse</b>
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
            <th>Denumire produs</th>
            <th>Tip produs</th>
            <th class="text-right">Vezi</th>
            <th class="text-right">Actiuni</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $request)
        <tr>
            <td class="text-center">{{$request->id}}</td>
            <td>{{$request->name}}</td>
            <td>@if($request->type == 1)de mancat @else de baut @endif</td>
            <td class="text-right"><button class="btn btn-success" data-toggle="modal" data-target="#edit{{$request->id}}">Vezi</button></td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$request->id}}">
                    <i class="material-icons">close</i>
                </button>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
<button class="btn btn-warning" data-toggle="modal" data-target="#addProduct">Adauga produs</button>
</div>

</div>
</div>
</div>
<!-- Modal add product-->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ url('restaurant/add_product') }}" method="POST" enctype='multipart/form-data'>
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adauga produs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      <div class="form-group">
          <label>Denumirea produsului:</label>
          <input type="text" name="name" required class="form-control" placeholder="denumire produs">
      </div>
      <div class="form-group">
        <label>Descrierea produsului:</label>
        <textarea name="description" cols="30" rows="4" class="form-control"></textarea>
      </div>
      <div class="form-group">
          <label>Greutatea produsului: (in grame)</label>
          <input type="number" min="1" name="weight" required class="form-control" placeholder="in grame">
      </div>
      <div class="form-group">
          <label>Proteine per 100g:</label>
          <input type="number" min="1" name="protein" class="form-control" required placeholder="in grame">
      </div>
      <div class="form-group">
          <label>Grasimi per 100g:</label>
          <input type="number" min="1" name="fat" class="form-control" required placeholder="in grame">
      </div>
      <div class="form-group">
          <label>Carbohidrati per 100g:</label>
          <input type="number" min="1" name="carbo" class="form-control" required placeholder="in grame">
      </div>
      <div class="form-group">
          <label>Calorii per 100g</label>
          <input type="number" min="1" name="kcal" class="form-control" required placeholder="Kcal">
      </div>
      <div class="form-group">
          <label>Cod de bare:</label>
          <input type="number" min="1" class="form-control" name="barcode" required placeholder="Cod de bare" value="">
      </div>
      <div class="form-group">
          <label>Categorie produs:</label>
          <select name="category" class="form-control">
              <option value="1">Sanatoasa</option>
              <option value="2">Intre</option>
              <option value="3">Nesanatoasa</option>
          </select>
      </div>
      <div class="form-group">
          <label>Tip produs:</label>
          <select name="type" class="form-control">
              <option value="1">de mancat</option>
              <option value="2">de baut</option>
          </select>
      </div>
      <div class="form-group">
    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <div class="fileinput-preview fileinput-exists thumbnail img-raised" style="max-width: 100% !important ">
        <img src="https://via.placeholder.com/450" alt="...">
    </div>
    <div style="font-size: 20px">
        Alege:
        <span class="btn btn-raised btn-round btn-default btn-file">
            <!-- <span class="">Selecteaza imagine</span> -->
            <!-- <span class="fileinput-exists">Schimba</span> -->
            
            <input class="fileinput-new" type="file" name="image" style="height: 30px" required/>
        </span>
    </div>
    </div>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <button type="" class="btn btn-primary">Adauga produs</button>
      </div>
    </form>
    </div>
  </div>
</div>

@foreach($products as $request)
<!-- Modal edit product -->
<div class="modal fade" id="edit{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ url('restaurant/edit_product/'.$request->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cerere de adaugare produs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
            <label>Denumirea produsului:</label>
            <input type="text" name="name" required class="form-control" placeholder="denumire produs" value="{{$request->name}}">
        </div>
        <div class="form-group">
            <label>Descrierea produsului:</label>
            <textarea name="description" cols="30" rows="4" class="form-control">{{$request->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Greutatea produsului: (in grame)</label>
            <input type="number" min="1" name="weight" required class="form-control" placeholder="in grame" value="{{$request->weight}}">
        </div>
        <div class="form-group">
            <label>Proteine per 100g:</label>
            <input type="number" min="1" name="protein" class="form-control" required placeholder="in grame" value="{{$request->protein}}">
        </div>
        <div class="form-group">
            <label>Grasimi per 100g:</label>
            <input type="number" min="1" name="fat" class="form-control" required placeholder="in grame" value="{{$request->fat}}">
        </div>
        <div class="form-group">
            <label>Carbohidrati per 100g:</label>
            <input type="number" min="1" name="carbo" class="form-control" required placeholder="in grame" value="{{$request->carbo}}">
        </div>
        <div class="form-group">
            <label>Calorii per 100g</label>
            <input type="number" min="1" name="kcal" class="form-control" required placeholder="Kcal" value="{{$request->kcal}}">
        </div>
        <div class="form-group">
            <label>Cod de bare:</label>
            <input type="number" min="1" class="form-control" name="barcode" required placeholder="Cod de bare" value="{{$request->barcode}}">
        </div>
        <div class="form-group">
            <label>Categorie produs:</label>
            <select name="category" class="form-control">
            @if($request->category == 1)
                <option value="1">Sanatoasa</option>
                <option value="2">Intre</option>
                <option value="3">Nesanatoasa</option>
            @elseif($request->category == 2)
                <option value="2">Intre</option>
                <option value="1">Sanatoasa</option>
                <option value="3">Nesanatoasa</option>
            @else
                <option value="3">Nesanatoasa</option>
                <option value="2">Intre</option>
                <option value="1">Sanatoasa</option>
            @endif
                
            </select>
        </div>
        <div class="form-group">
            <label>Tip produs:</label>
            <select name="type" class="form-control">
                @if($request->type == 1)
                <option value="1">de mancat</option>
                <option value="2">de baut</option>
                @else
                <option value="2">de baut</option>
                <option value="1">de mancat</option>
                @endif
            </select>
        </div>
        <div class="form-group">
        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
        <div class="fileinput-preview fileinput-exists thumbnail img-raised" style="max-width: 100% !important ">
            <img src="{{ asset('/products/'.$request->image) }}" alt="...">
        </div>
        <div style="font-size: 20px">
            Alege:
            <span class="btn btn-raised btn-round btn-default btn-file">
                <!-- <span class="">Selecteaza imagine</span> -->
                <!-- <span class="fileinput-exists">Schimba</span> -->
                
                <input class="fileinput-new" type="file" name="image" style="height: 30px"/>
            </span>
        </div>
        </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <button type="submit" class="btn btn-warning">Editeaza produs</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="delete{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Sterge produs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esti sigur ca doresti sa stergi acest produs?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <a href="{{ url('/restaurant/delete_product/'.$request->id) }}" class="btn btn-danger">
            Sterge produs
        </a>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection