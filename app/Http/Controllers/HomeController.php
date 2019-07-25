<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = User::find($_GET['user_id']);

        $user -> stats;

        $user -> targets;

        $user -> dailyProgresses;

        $user -> allergies;

        // $token = UserLoginToken::where('user_id', $user -> id) -> where('token', $_GET['token']) -> first();

        return view('home', compact('user'));
    }
}
