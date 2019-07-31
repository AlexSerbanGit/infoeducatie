<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Product;
use App\CartProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserCartController extends Controller
{
    public function get() {

        // $user = Auth::user();

        $user = User::find(18);

        $cart = $user -> cart;

        foreach ($cart as $key => $value) {

            $value -> product;
        }

        return json_encode([
            'success' => true,
            'cart' => $cart
        ]);
    }

    public function update(Request $request) {

        // $user = Auth::user();

        $user = User::find(18);

        $product = Product::find($request -> product);

        if($product == null) {
            return json_encode([
                'success' => false,
                'messge' => 'Produs inexistent!'
            ]);
        }

        $already_in_cart = CartProduct::where('user_id', $user -> id) -> where('product_id', $product -> id) -> first();

        if($already_in_cart) {

            $already_in_cart -> quantity += 1;

            $already_in_cart -> save();

            return json_encode([
                'success' => true,
                'messge' => 'Produsul a fost adaugat!'
            ]);
        }

        $cart_product = new CartProduct();

        $cart_product -> user_id = $user -> id;

        $cart_product -> product_id = $product -> id;

        $cart_product -> quantity = 1;

        $cart_product -> save();

        return json_encode([
            'success' => true,
            'messge' => 'Produsul a fost adaugat!'
        ]);
    }

    public function deleteItem() {


    }
}
