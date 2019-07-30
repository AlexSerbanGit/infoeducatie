<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantOrdersController extends Controller
{
    public function activeOrders() {

        $orders = Order::where('active', true) -> get();

        return view('/restaurant/active-orders', compact('orders'));
    }
}
