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
}
