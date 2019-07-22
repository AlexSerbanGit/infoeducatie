<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLoginToken;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function find_user_by_phone_number(Request $request) {

        $user = User::where('phone_number', $request -> phone_number) -> first();

        if($user == null) {

            return json_encode([
                'success' => false
            ]);
        } else {

            $user -> lastToken = $user -> tokens -> last();

            $user -> makeHidden('tokens');

            return json_encode([
                'success' => true,
                'user' => $user
            ]);
        }
    }

    public function login(Request $request, $user_id) {

        $user = User::find($user_id);

        if($user == null) {

            return json_encode([
                'success' => false,
                'message' => 'Utilizator inexistent!'
            ]);
        }

        $last_token = $user -> tokens -> last();

        if($last_token != null) {

            $last_token -> delete();
        }

        $coordinates = explode(",", json_decode(file_get_contents("http://ipinfo.io/")) -> loc);

        $token = new UserLoginToken();

        $token -> user() -> associate($user);

        $token -> token = str_random(65);

        $token -> expire_date = now() -> addMonth(3);

        $token -> ip = $request -> getClientIp();

        $token -> latitude = $coordinates[0];

        $token -> longitude = $coordinates[1];

        $token -> save();

        return json_encode([
            'success' => true,
            'user_id' => $user -> id
        ]);
    }
}
