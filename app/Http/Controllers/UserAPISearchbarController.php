<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class UserAPISearchbarController extends Controller
{
    public function search() {

        $products = Product::all();

        // $items = [];
        // $customKey = 0;
        // foreach ($products as $key => $product) {
        //     $items[$customKey++] = $product;
        // }
        //
        // foreach ($allergies as $key => $allergy) {
        //     $items[$customKey++] = $allergy;
        // }

        return response() -> json($products);
    }
}
