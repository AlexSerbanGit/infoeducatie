<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserScannerController extends Controller
{
    public function index() {
        return view('/scanner');
    }

    public function results($barcode) {
        return json_encode($barcode);
    }
}
