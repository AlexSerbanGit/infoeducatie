<?php

namespace App\Http\Controllers;

use Cookie;
use App\User;
use Carbon\Carbon;
use App\UserLoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    public function register(Request $request) {

        $validator = Validator::make($request -> all(), [
            'name' => 'required',
            'phone_number' => 'required|unique:users,phone_number'
        ], [
            'name.required' => 'Numele este necesar!',
            'phone_number.required' => 'Numarul de telefon este necesar!',
            'phone_number.unique' => 'Numarul de telefon este deja asociat cu un cont de utilizator!'
        ]);

        if($validator -> fails()) {
            return json_encode([
                'success' => false,
                'message' => $validator -> errors()
            ]);
        }

        $user = new User();

        $user -> name = $request -> name;

        $user -> phone_number = $request -> phone_number;

        $user -> save();

        $coordinates = explode(",", json_decode(file_get_contents("http://ipinfo.io/")) -> loc);

        $token = new UserLoginToken();

        $token -> user() -> associate($user);

        $token -> token = str_random(65);

        $token -> user_agent = $_SERVER['HTTP_USER_AGENT'];

        $token -> expire_date = now() -> addMonth(3);

        $token -> ip = $request -> getClientIp();

        $token -> latitude = $coordinates[0];

        $token -> longitude = $coordinates[1];

        $token -> sms_code = '666666';

        $token -> save();

        return json_encode([
            'succes' => true,
            'message' => 'Urmatorul pas este sa activati contul folosind codul primit in sms.
                          Codul este activ 30 de minute, daca nu va fi confirmat contul va fi sters!',
            'user' => $user
        ]);
    }

    public function confirm(Request $request) {

        $validator = Validator::make($request -> all(), [
            'sms_code' => 'required|numeric',
            'user_id' => 'required|exists:users,id'
        ], [
            'sms_code.required' => 'Codul de confirmare este necesar!',
            'sms_code.numeric' => 'Codul de confirmare trebuie sa fie format din cifre!',
            'sms_code.min' => 'Codul de confirmare trebuie sa contina fix 6 cifre!',
            'sms_code.max' => 'Codul de confirmare trebuie sa contina fix 6 cifre!',
            'user_id.required' => 'Utilizator invalid!',
            'user_id.exists' => 'Utilizator invalid!'
        ]);

        if($validator -> fails()) {
            return json_encode([
                'success' => false,
                'message' => $validator -> errors()
            ]);
        }

        $user = User::find($request -> user_id);

        $token = $user -> tokens -> last();

        if($token == null) {
            return json_encode([
                'success' => false,
                'message' => 'Nu ati solicitat operatiunea de autentificare!'
            ]);
        }

        if($token -> confirmed == 1) {
            return json_encode([
                'success' => false,
                'message' => 'Sunteti deja autentifcat!'
            ]);
        }

        if($token -> created_at -> addMinutes(30) < Carbon::now()) {

            $user -> delete();

            $user -> tokens() -> delete();

            return json_encode([
                'success' => false,
                'message' => 'Codul sms a expirat! Contul a fost sters!'
            ]);
        }

        if($request -> sms_code == $token -> sms_code) {

            // Cookie::queue('token', $token -> token, 43800);

            $token -> confirmed = true;

            $token -> save();

            $user -> token = $token;

            $user -> makeHidden('tokens');

            return json_encode([
                'success' => true,
                'message' => 'Inregistrarea a fost realizata cu succes!',
                'user' => $user
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Codul de verificare este invalid!'
            ]);
        }
    }
}
