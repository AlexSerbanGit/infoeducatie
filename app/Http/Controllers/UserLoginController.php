<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Administrator;
use App\UserLoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{

    public function loginOrRegister() {

        return view('/login-register');
    }

    public function find_user_by_phone_number(Request $request) {

        $user = Administrator::where('phone_number', $request -> phone_number) -> first();

        if($user == null) {

            return json_encode([
                'success' => false
            ]);
        }

        return json_encode([
            'success' => true,
            'user' => $user
        ]);
    }

    
}
