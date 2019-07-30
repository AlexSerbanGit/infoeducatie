<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantOrdersController extends Controller
{
    public function activeOrders() {

        $restaurant = Auth::user();

        $orders = Order::where('restaurant_id', $restaurant -> id) -> get();

        return view('/restaurant/active-orders', compact('orders'));
    }

    public function historyOrders() {

        $restaurant = Auth::user();

        $orders = Order::onlyTrashed() -> where('restaurant_id', $restaurant -> id) -> get();

        return view('/restaurant/history-orders', compact('orders'));
    }

    public function completeOrder($order_id) {

        $order = Order::find($order_id);

        if($order == null) {
            return back() -> withErrors('Comanda solicitata este invalida!');
        }

        if($order -> restaurant_id != Auth::user() -> id) {
            return back() -> withErrors('Comanda solicitata este asociata altui restaurant!');
        }

        $order -> delete();

        return back() -> with('Comanda a fost finalizata si adaugata la istoric!');
    }

    public function deleteOrder($order_id) {

        $order = Order::onlyTrashed() -> find($order_id);

        if($order == null) {
            return back() -> withErrors('Comanda solicitata este invalida!');
        }

        if($order -> restaurant_id != Auth::user() -> id) {
            return back() -> withErrors('Comanda solicitata este asociata altui restaurant!');
        }

        if($order -> deleted_at == null) {
            return back() -> withErrors('Comanda solicitata este activa!');
        }

        $order -> forceDelete();

        return back() -> with('Comanda a fost eliminata din istoric!');
    }
}
