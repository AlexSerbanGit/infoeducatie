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

    public function addAllergy(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);

        $allergy = new Allergy;
        $allergy->name = $request->name;
        $allergy->save();

        return redirect()->back()->with('message', 'Alergie adaugata!');
    }

    public function editAllergy(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
        ]);

        $allergy = Allergy::find($id);

        if($allergy){

            $allergy->name = $request->name;
            $allergy->save();
    
            return redirect()->back()->with('message', 'Alergie editata cu succes!');

        }else{

            return redirect()->back()->with('message', 'Alergie invalida!');

        }
       
    }

    public function deleteAllergy($id){
        
        $allergy = Allergy::find($id);

        if($allergy){
            $allergy->delete();
            return redirect()->back()->with('message', 'Alergie stearsa cu succes!');
        }

        return redirect()->back()->with('message', 'Alergie invalida!');

    }

}
