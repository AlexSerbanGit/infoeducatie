<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Allergy;

class AdminController extends Controller
{
    
    public function menu(){
        return view('admin.menu');
    }

    public function allergies(){

        $allergies = Allergy::all();

        return view('admin.allergies')->with('allergies', $allergies);
    }

}
