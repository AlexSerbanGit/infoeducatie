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
              <i class="fab fa-product-hunt"></i>
              </div>
              <h1 class="text-primary text-uppercase">Toate produsele</h1>
            @if($products->count() > 0)
            <div class="row">

            @foreach($products as $product)

                <script>
                function readURL{{$product->id}}(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah{{$product->id}}')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                </script>

                <div class="col-lg-4" style="margin-top: 10px">
                    <div class="card alert-primary shadow border-0">
                    <div class="card-body py-5">

                        <img src="{{ asset('/products/'.$product->image) }}" alt="" style="max-width: 100%; margin-top: 10px">

                        <h2 class="text-uppercase" style="color: white">{{$product->name}}</h2>
                        <div>
                        <span class="badge badge-pill badge-primary">produs</span>
                        </div>
                    </div>
                    <div class="buttons" style="position: absolute; top: 5px; right: 10px">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editProduct{{$product->id}}">Editeaza</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct{{$product->id}}">Sterge</button>
                    </div>
                    </div>
                </div>

                <!-- Add product modal -->

                <div class="modal fade" id="editProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                        <form action="{{ url('/admin_edit_product/'.$product->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal-title-default">Adauga produs nou</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <div class="form-group">

                                <label>Numele produsului:</label>
                                <input type="text" name="name" required placeholder="nume" class="form-control" value="{{$product->name}}">

                                <label>Imaginea produsului:</label> <br>
                                <img id="blah{{$product->id}}" src="{{ asset('/products/'.$product->image) }}" alt="your image" style="max-width: 180px; margin: 20px 10%;"/>

                                <input type='file' name="image" onchange="readURL{{$product->id}}(this);" class="form-control-file" style="margin: 10px 0px" />

                                <label>Greutatea(g)</label>
                                <input type="number" name="weight" class="form-control" required placeholder="greutatea" value="{{ $product->weight }}">

                                <label>Proteine(g)</label>
                                <input type="number" name="protein" class="form-control" required placeholder="proteine" value="{{ $product->protein }}">

                                <label>Grasimi(g)</label>
                                <input type="number" name="fat" class="form-control" required placeholder="grasimi"  value="{{ $product->fat }}">

                                <label>Carbohidrati(g)</label>
                                <input type="number" name="carbo" class="form-control" required placeholder="carbohidrati" value="{{ $product->carbo }}">

                                <label>Calorii</label>
                                <input type="number" name="kcal" class="form-control" required placeholder="calorii" value="{{ $product->kcal }}">

                                <label>Cod de bare</label>
                                <input type="text" name="barcode" class="form-control" required placeholder="cod de bare" value="{{ $product->barcode }}">

                                @if($product->category == 1)
                                <label>Categorie aliment</label>
                                <select name="category" required class="form-control">
                                    <option value="1" selected>Mancare sanatoasa</option>
                                    <option value="2">Normala</option>
                                    <option value="3">Mancare nesanatoasa</option>
                                </select>
                                @endif

                                @if($product->category == 2)
                                <label>Categorie aliment</label>
                                <select name="category" required class="form-control">
                                    <option value="1">Mancare sanatoasa</option>
                                    <option value="2" selected>Normala</option>
                                    <option value="3">Mancare nesanatoasa</option>
                                </select>
                                @endif

                                @if($product->category == 3)
                                <label>Categorie aliment</label>
                                <select name="category" required class="form-control">
                                    <option value="1">Mancare sanatoasa</option>
                                    <option value="2">Normala</option>
                                    <option value="3" selected>Mancare nesanatoasa</option>
                                </select>
                                @endif

                                @if($product->type == 1)
                                <label>Tip aliment</label>
                                <select name="type" requried class="form-control">
                                    <option value="1" selected>de mancat</option>
                                    <option value="2">de baut</option>
                                </select>
                                @endif

                                @if($product->type == 2)
                                <label>Tip aliment</label>
                                <select name="type" requried class="form-control">
                                    <option value="1">de mancat</option>
                                    <option value="2" selected>de baut</option>
                                </select>
                                @endif

                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salveaza produs</button>
                            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
                        </div>
                        </form>

                    </div>
                </div>
                </div>

                <!-- Modal delete product -->
                <div class="modal fade" id="deleteProduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="modal-title" id="modal-title-default">Sterge acest produs</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            <h2>Esti sigur ca doresti sa stergi acest produs?</h2>

                        </div>

                        <div class="modal-footer">
                            <a href="{{  url('/admin_delete_product/'.$product->id) }}">
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

                <h2>Momentan nu exista produse</h2>

            @endif

            <button class="btn btn-primary mt-5 ml-3" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus-square" style="font-size:22px;"></i> Adauga produs</button>
            <button class="btn btn-primary mt-5 ml-3" data-toggle="modal" data-target="#addProductByCSV"><i class="fas fa-file-csv" style="font-size:22px;"></i> Adauga fisier</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</section>

<!-- Add product modal -->

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">

        <form action="{{ url('/admin_add_product') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-header">
            <h2 class="modal-title" id="modal-title-default">Adauga produs nou</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">

            <div class="form-group">

                <label>Numele produsului:</label>
                <input type="text" name="name" required placeholder="nume" class="form-control">

                <label>Imaginea produsului:</label> <br>
                <img id="blah" src="http://placehold.it/180" alt="your image" style="max-width: 180px; margin: 20px 10%;"/>

                <input type='file' name="image" onchange="readURL(this);" class="form-control-file" style="margin: 10px 0px"  required/>

                <label>Greutatea(g)</label>
                <input type="number" name="weight" class="form-control" required placeholder="greutatea">

                <label>Proteine(g)</label>
                <input type="number" name="protein" class="form-control" required placeholder="proteine">

                <label>Grasimi(g)</label>
                <input type="number" name="fat" class="form-control" required placeholder="grasimi">

                <label>Carbohidrati(g)</label>
                <input type="number" name="carbo" class="form-control" required placeholder="carbohidrati">

                <label>Calorii</label>
                <input type="number" name="kcal" class="form-control" required placeholder="calorii">

                <label>Cod de bare</label>
                <input type="text" name="barcode" class="form-control" required placeholder="cod de bare">

                <label>Categorie aliment</label>
                <select name="category" required class="form-control">
                    <option value="" hidden>Alege</option>
                    <option value="1">Mancare sanatoasa</option>
                    <option value="2">Normala</option>
                    <option value="3">Mancare nesanatoasa</option>
                </select>

                <label>Tip aliment</label>
                <select name="type" requried class="form-control">
                    <option value="" hidden>Alege</option>
                    <option value="1">de mancat</option>
                    <option value="2">de baut</option>
                </select>

            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salveaza produs</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
        </div>
        </form>

    </div>
</div>
</div>

<div class="modal fade" id="addProductByCSV" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
<div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">

        <form action="{{ url('/admin/add/products/csv') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-header">
            <h2 class="modal-title" id="modal-title-default">Adauga noi produse</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label>Incarca fisier cu extensia</label>
                <input type="file" name="csv-file" required class="form-control">
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Parseaza fisierul</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Inchide</button>
        </div>
        </form>

    </div>
</div>
</div>
@endsection
