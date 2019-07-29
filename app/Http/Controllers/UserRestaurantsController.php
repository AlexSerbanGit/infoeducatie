<?php

namespace App\Http\Controllers;

use Auth;
use App\City;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRestaurantsController extends Controller
{
    public function restaurants() {

        return view('/pages/restaurants');
    }

    public function getRestaurants(Request $request) {

        // return json_encode(Auth::user());

        $restaruants = User::where('role_id', 3) -> get();

        foreach ($restaruants as $key => $restaruant) {

            $restaruant -> city;
        }

        return json_encode($restaruants);
    }

    public function user(){

        return Auth::user();
    }

    public function getNearRestaurants($city_id) {

        $city = City::find($city_id);

        if($city == null) {
            return json_encode('Nu au fost gasite rezultate conform cautarii!');
        }

        $restaruants = User::where('role_id', 3) -> where('city_id',$city -> id) -> get();

        foreach ($restaruants as $key => $restaruant) {

            $restaruant -> city;
        }

        return json_encode($restaruants);
    }

    public function readRestaurant($restaurant_id) {

        $restaurant = User::find($restaurant_id);

        if($restaurant == null || $restaurant -> role_id != 3) {
            return json_encode('Restaruantul solicitat este inexistent!');
        }

        $restaurant -> city;

        foreach ($restaurant -> products as $key => $product) {

            $product -> allergies;

            $product -> foodType;
        }

        return view('/restaurant/profile', compact('restaurant'));
    }
}
