@extends('layouts.app')

@section('content')

    <div class="container">
    <tag-random style="color: white;">Nu ati introdus datele. Va rugam le introduceti dand click pe butonus de mai jos:</tag-random>
    <br>
    <button class="btn btn-warning as-button-data" style="margin-top: 10px" data-toggle="modal" data-target="#modal-notification">Introdu datele</button>
    </div>

    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <form action="{{ url('update_user') }}" method="POST">
            @csrf

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Obligatoriu</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Te rugam sa-ti introduci datele intai!</h4>

                    <div class="form-group">
                        <label>Sexul:</label>
                        <select name="gender" id="" class="form-control" required>
                            <option value="" hidden>Alege</option>
                            <option value="1">Barbat</option>
                            <option value="2">Femeie</option>
                        </select>

                        <label>Varsta(ani)</label>
                        <input type="number" min="1" class="form-control" required name="age" placeholder="varsta">

                        <label>Greutate(kg)</label>
                        <input type="number" min="1" class="form-control" required name="weight" placeholder="greutatea">

                        <label>Inaltimea(cm)</label>
                        <input type="number" min="1" class="form-control" required name="height" placeholder="inaltimea">

                        <label>Stil de viata:</label>
                        <select name="lifestyle" class="form-control" required>
                            <option value="">Alege</option>
                            <option value="1">Sedentar</option>
                            <option value="2">Normal</option>
                            <option value="3">Activ</option>
                            <option value="4">Sportiv</option>
                        </select>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-white">Salveaza</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Inchide</button>
            </div>

            </form>

        </div>
    </div>
@endsection
