<?php

namespace App\Http\Controllers;

use App\Product;
use App\Allergy;
use Illuminate\Http\Request;

class UserAPISearchbarController extends Controller
{
    public function search(Request $request) {

        $products = Product::where('name', 'like', '%'.$request -> queryString.'%') -> get();

        $allergies = Allergy::where('name', 'like', '%'.$request -> queryString.'%') -> get();

        $merged = $products -> merge($allergies);

        return response() -> json($merged);
    }
}
