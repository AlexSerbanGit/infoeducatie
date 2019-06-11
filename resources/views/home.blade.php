@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if(Auth::user()->stats)

                    @else
                        <tag-random class="text-danger">Nu ati introdus datele. Va rugam le introduceti dand click pe butonus de mai jox:</tag-random>
                        <br> 
                        <button class="btn btn-info as-button-data">Introdu datele</button>
                    @endif   
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
