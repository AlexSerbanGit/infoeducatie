<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FoodController extends Controller
{
    public function breakfast(){
        $products = Product::all();

        return view('food.breakfast')->with('products', $products);
    }

    public function meal(){
        $products = Product::all();

        return view('food.meal')->with('products', $products);
    }

    public function dinner(){
        $products = Product::all();

        return view('food.diner')->with('products', $products);
    }

    public function snack(){
        $products = Product::all();

        return view('food.snack')->with('products', $products);
    }
}
