<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRestaurantsController extends Controller
{
    public function restaurants() {

        $restaruants = User::where('role_id', 3) -> get();

        return view('/pages/restaurants', compact('restaruants'));
    }
}
