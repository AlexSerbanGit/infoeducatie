@extends('layouts.admin-layout')

@section('content')
<style>
    img{
        max-width: 100%;
    }
</style>
<div class="card" style="text-align: left">
    <div class="card-header card-header-warning">
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
            <td class="text-right"><button class="btn btn-success" data-toggle="modal" data-target="#view{{$request->id}}">Vezi</button></td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#banUser{{$request->id}}">
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

<form action="{{ url('/send_request') }}" method="POST">
                                @csrf
                                <u><h2 class="text-primary text-center">Cerere de adaugare produs</h2></u>
                                <div class="form-group">
                                    <label>Denumirea produsului:</label>
                                    <input type="text" name="name" required class="form-control" placeholder="denumire produs">
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
                                    <input type="number" min="1" class="form-control" name="barcode" required placeholder="Cod de bare" value="{{$barcode}}">
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

                                <button class="btn btn-warning">Trimite cerere</button>
                                </form>
@foreach($products as $request)
<!-- Modal view -->
<div class="modal fade" id="view{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{ url('admin/add_product') }}" method="POST" enctype='multipart/form-data'>
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
            <input type="text" name="id" value="{{$request->id}}" style="display:none">
        </div>
        <div class="form-group">
            <label>Descrierea produsului:</label>
            <textarea name="description" cols="30" rows="4" class="form-control">{{$request->name}}</textarea>
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
        <button type="submit" class="btn btn-success">Aproba produs</button>
        <button type="button" class="btn btn-danger">Refuza produs</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
function readURL{{$request->id}}(input) {
    if (input.files && input.files[0]) {
        var reader{{$request->id}} = new FileReader();

        reader.onload = function (e) {
            $('#blah{{$request->id}}')
                .attr('src', e.target.result);
        };

        reader{{$request->id}}.readAsDataURL(input.files[0]);
    }
}
</script>


<!-- Modal -->
<div class="modal fade" id="banUser{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Sterge cerere</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Esti sigur ca doresti sa stergi aceasta cerere?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
        <a href="{{ url('/delete_request/'.$request->id) }}" class="btn btn-danger">
            Sterge cerere
        </a>
      </div>
    </div>
  </div>
</div>

@endforeach
@endsection