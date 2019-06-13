<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Allergy;

class FoodController extends Controller
{
    public function breakfast(){
        $products = Product::all();
        $allergies = Allergy::all();

        $data = [
            'products' => $products,
            'allergies' => $allergies
        ];

        return view('food.breakfast')->with($data);
    }

    public function meal(){
        $products = Product::all();
        $allergies = Allergy::all();

        $data = [
            'products' => $products,
            'allergies' => $allergies
        ];

        return view('food.meal')->with($data);
    }

    public function dinner(){
        $products = Product::all();
        $allergies = Allergy::all();

        $data = [
            'products' => $products,
            'allergies' => $allergies
        ];

        return view('food.diner')->with($data);
    }

    public function snack(){
        $products = Product::all();
        $allergies = Allergy::all();

        $data = [
            'products' => $products,
            'allergies' => $allergies
        ];

        return view('food.snack')->with($data);
    }
}
