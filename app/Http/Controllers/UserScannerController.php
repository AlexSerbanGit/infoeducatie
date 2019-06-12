<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class UserScannerController extends Controller
{
    public function index() {
        return view('/scanner');
    }

    public function results($barcode) {

        $product = Product::where('barcode', '=', $barcode) -> first();

        if($product) {

            $product -> foodType;

            $product -> allergies;

            foreach ($product -> allergies as $key => $allergy) {

                $allergy -> allergy;
            }
        }

        return view('/results', compact('product'));
    }
}
