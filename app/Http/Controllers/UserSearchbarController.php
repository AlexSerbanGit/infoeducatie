<?php

namespace App\Http\Controllers;

use App\Product;
use App\Allergy;
use Illuminate\Http\Request;

class UserSearchbarController extends Controller
{
    public function search(Request $request) {

        $products = [];

        $allergies = [];

        $products = Product::where('name', 'like', '%'.$request -> queryString.'%') -> orWhere('barcode', 'like', '%'.$request -> queryString.'%') -> get();

        $allergies = Allergy::where('name', 'like', '%'.$request -> queryString.'%') -> get();

        $merged = $allergies -> merge($products);

        return response() -> json($merged);
    }
}
