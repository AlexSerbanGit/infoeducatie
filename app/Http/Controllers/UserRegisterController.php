<?php

namespace App\Http\Controllers;

use Cookie;
use Carbon\Carbon;
use App\Administrator;
use App\UserLoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{

    private function sendSmsCode($phone_number, $code) {

        //The message sent to the user
        $message = 'BeeScanner.ro   Codul de confirmare este ' . $code;
        //The data needed for the post request
        $post = [
            'phone_number' => $phone_number,
            'message' => $message,
            'country_code' => 'ro',
        ];
        //Initializes the request
        $ch = curl_init('https://sms.trage-ma.ro/api/send/sms/Dsoftboss21061999SMS@/1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // Executes the request
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);
    }

    public function adddAcount(Request $request) {

        $validator = Validator::make($request -> all(), [
            'name' => 'required',
            'phone_number' => 'required|unique:administrators,phone_number'
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

        $user = new Administrator();

        $user -> name = $request -> name;

        $user -> phone_number = $request -> phone_number;

        $user -> expire_code = now() -> addMinutes(30);

        // $user -> code = '666666';

        $user -> code = mt_rand(100000, 999999);

        $user -> save();

        $this -> sendSmsCode($user -> phone_number, $user -> code);

        return json_encode([
            'succes' => true,
            'message' => 'Urmatorul pas este sa activati contul folosind codul primit in sms.
                          Codul este activ 30 de minute, daca nu va fi confirmat contul va fi sters!',
            'user' => $user
        ]);
    }
}
