@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="app" class="card">
                <div class="card-header">Scanner</div>
                <div class="card-body">
                    <scanner-component></scanner-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
