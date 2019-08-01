<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function toCheckout(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'adress' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('message', 'Datele introduse gresit! Te rugam sa incerci din nou');
        }
        $user = Auth::user();
        $user->name = $request->name;
        $user->adress = $request->adress;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->save();

        return view('toCheckout');
    }

    public function final(){
        return redirect('/home')->with('message', 'Multumim pentru ca ati cumparat de la noi! Curierul va va suna cand este in propierea resedintei dumneavoastra!');
    }
}
