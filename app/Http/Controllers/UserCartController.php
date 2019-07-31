<?php

namespace App\Http\Controllers;

use Auth;
use App\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCartController extends Controller
{
    public function get() {

        $user = Auth::user();

        return $user;

        // $cart = $user -> cart;

        return json_encode([
            'success' => true,
            'cart' => $user
        ]);
    }

    public function update() {

        $user = Auth::user();

        $product = Product::find($request -> product);

        if($product == null) {
            return json_encode([
                'success' => false,
                'messge' => 'Produs inexistent!'
            ]);
        }

        $already_in_cart = Cart::where('user_id', $user -> id) -> where('product_id', $product -> id);

        if($already_in_cart) {

            $already_in_cart -> quantity += 1;

            $already_in_cart -> save();

            return json_encode([
                'success' => true,
                'messge' => 'Produsul a fost adaugat!'
            ]);
        }

        $cart_product = new CartProduct();

        $cart_product -> user -> associate($user);

        $cart_product -> product -> associate($product);

        $cart_product -> quantity = 1;

        return json_encode([
            'success' => true,
            'messge' => 'Produsul a fost adaugat!'
        ]);
    }
}
