<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRestaurantsController extends Controller
{
    public function restaurants() {

        return view('/pages/restaurants');
    }

    public function getRestaurants(Request $request) {

        $restaruants = User::where('role_id', 3) -> get();

        return json_encode($restaruants);
    }
}
