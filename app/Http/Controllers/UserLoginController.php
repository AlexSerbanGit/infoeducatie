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

    // private function sendSmsCode($phone_number, $code) {
    //
    //     //The message sent to the user
    //     $message = 'BeeScanner.ro   Codul de confirmare este ' . $code;
    //     //The data needed for the post request
    //     $post = [
    //         'phone_number' => $phone_number,
    //         'message' => $message,
    //         'country_code' => 'ro',
    //     ];
    //     //Initializes the request
    //     $ch = curl_init('https://sms.trage-ma.ro/api/send/sms/Dsoftboss21061999SMS@/1');
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    //
    //     // Executes the request
    //     $response = curl_exec($ch);
    //
    //     // close the connection, release resources used
    //     curl_close($ch);
    // }

    public function sendSms(Request $request) {

        return 'gg';

        $user = Administrator::where('phone_number', $request -> phone_number) -> first();

        $user -> expire_code = now() -> addMinutes(30);

        $user -> code = '222222';

        // $user -> code = mt_rand(100000, 999999);

        $user -> save();

        // $this -> sendSmsCode($user -> phone_number, $user -> code);

        return json_encode([
            'succes' => true,
            'message' => 'Urmatorul pas este sa activati contul folosind codul primit in sms',
            'user' => $user
        ]);
    }
}
