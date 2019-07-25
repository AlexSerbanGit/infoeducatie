<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\UserLoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{

    public function loginOrRegister() {

        return view('/login-register');
    }

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

        $token -> user_agent = $_SERVER['HTTP_USER_AGENT'];

        $token -> expire_date = now() -> addMonth(1);

        $token -> ip = $request -> getClientIp();

        $token -> latitude = $coordinates[0];

        $token -> longitude = $coordinates[1];

        $token -> sms_code = '666666';

        $token -> save();

        return json_encode([
            'success' => true,
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

            $user -> tokens() -> delete();

            return json_encode([
                'success' => false,
                'message' => 'Codul sms a expirat! Contul a fost sters!'
            ]);
        }

        if($request -> sms_code == $token -> sms_code) {

            $token -> confirmed = true;

            $token -> save();

            $user -> token = $token;

            $user -> makeHidden('tokens');

            return json_encode([
                'success' => true,
                'message' => 'Autentificarea a fost realizata cu succes!',
                'user' => $user
            ]);
        } else {
            return json_encode([
                'success' => false,
                'message' => 'Codul de verificare este invalid!'
            ]);
        }
    }

    public function logout() {
        
        $user = User::find($_GET['user_id']);

        if($user == null) {
            return json_encode([
                'success' => false,
                'message' => 'User id-ul este necesar!'
            ]);
        }

        $token = $_GET['token'];

        if($token == null) {
            return json_encode([
                'success' => false,
                'message' => 'Token-ul este necesar!'
            ]);
        }

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        if($user_agent == null) {
            return json_encode([
                'success' => false,
                'message' => 'User agent invalid!'
            ]);
        }

        $token = $user -> tokens -> where('token', $_GET['token']) -> where('user_agent', $_SERVER['HTTP_USER_AGENT']) -> first();

        if($token == null) {
            return json_encode([
                'success' => false,
                'message' => 'Nu sunteti logat!'
            ]);
        }

        $token -> delete();

        return json_encode([
            'success' => true,
            'message' => 'Ati fost delogat cu succes!'
        ]);
    }
}
