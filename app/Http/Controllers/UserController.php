<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\UserStats;
use App\Target;
use App\Allergy;
use App\UserToAllergy;
use App\DailyProgress;
use App\Product;

class UserController extends Controller
{
    public function updateUser(Request $request){
        
        $request->validate([
            'gender' => 'required|min:1|max:2|numeric',
            'age' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'lifestyle' => 'required|numeric|min:1|max:4',
        ]);  

        $user = Auth::user();
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->weight = $request->weight;
        $user->height = $request->height;
        $user->lifestyle = $request->lifestyle;
        $user->save();

        // rata metabolica pentru barbati
        if($user->gender == 1){
            
            // rata metabolica 
            $rate = 10*$user->weight + 6.25*$user->height - 5*$request->age + 5;

            // Factor metabolica + proteine recomandate
            switch( $user->lifestyle ) {
                case 1:
                    $factor = 1.2;
                    $protein = 0.9*$user->weight;
                    break;
                case 2:
                    $factor = 1.375;
                    $protein = 1.2*$user->weight;
                    break;
                case 3: 
                    $factor = 1.5;
                    $protein = 1.8*$user->weight;
                    break;
                case 4:
                    $factor = 1.75;
                    $protein = 2.5*$user->weight;
                    break;
            }

            // total kcal
            $kcal = $rate * $factor;

            $kcalfat = $kcal*3/10;
            
            // grame grasime recomandate
            $fat = $kcalfat/9;

            $kcalpro = $protein * 4;
            
            $kcalcarbo = $kcal - $kcalpro - $kcalfat;

            // grame carbo
            $carbo = $kcalcarbo/4;

          

        }else {
            
        // rata metabolica 
            $rate = 10*$user->weight + 6.25*$user->height - 5*$request->age - 161;

            // Factor metabolica + proteine recomandate
            switch( $user->lifestyle ) {
                case 1:
                    $factor = 1.2;
                    $protein = 0.9*$user->weight;
                    break;
                case 2:
                    $factor = 1.375;
                    $protein = 1.2*$user->weight;
                    break;
                case 3: 
                    $factor = 1.5;
                    $protein = 1.8*$user->weight;
                    break;
                case 4:
                    $factor = 1.75;
                    $protein = 2.5*$user->weight;
                    break;
            }

            // total kcal
            $kcal = $rate * $factor;


            $kcalfat = $kcal*3/10;
            
            // grame grasime recomandate
            $fat = $kcalfat/9;

            $kcalpro = $protein * 4;
            
            $kcalcarbo = $kcal - $kcalpro - $kcalfat;

            // grame carbo
            $carbo = $kcalcarbo/4;


        }
        $kccal = $kcal;
        $stats = new UserStats; 
        $stats->protein = (int)$protein;
        $stats->fat = (int)$fat;
        $stats->carbo = (int)$carbo;
        $stats->kcal = $kccal;
        $stats->user_id = $user->id;
        $stats->save();

        return redirect()->back()->with('message', 'Informatii actualizate!');
    }

    public function addTarget(Request $request){
        $request->validate([
            'type' => 'required|min:1|max:3',
        ]);

        $target = new Target;
        $target->user_id = Auth::user()->id;
        $target->type = $request->type;
        $target->save();

        return redirect()->back()->with('message', 'Target creat!');

    }

    public function yourTargets(){

        return view('user.targets');

    }

    public function allAllergies(){

        $allergies = Allergy::all();

        return view('allergies')->with('allergies', $allergies);
    }

    public function addRemoveAllergy($id){

        $allergy = Allergy::find($id);
        if($allergy){
            
            $ok = 1;

            foreach(Auth::user()->allergies as $allergy2){
              
                if($allergy2->allergy_id == $id){
                    $ok = 0;$allergy2->delete();
                }    
            }
        
        if($ok == 1){

            $allergy21 = new UserToAllergy;
            $allergy21->allergy_id = $id;
            $allergy21->user_id = Auth::user()->id;
            $allergy21->save();
            return redirect()->back()->with('message', 'Alergie adaugata cu succes!');

        }else{
            return redirect()->back()->with('message', 'Alergie stearsa cu succes!');
        }

        }

        return redirect()->back();

    }

    public function addToYourTarget($id){
        $progress = Auth::user()->dailyProgresses->reverse()->first();
        if($progress){
            $product = Product::find($id);
            $progress->protein += $product->protein;
            $progress->fat += $product->fat;
            $progress->kcal += $product->kcal;
            $progress->carbo += $product->carbo;
            $progress->save();
        }else{
            $progress = new DailyProgress;
            $product = Product::find($id);
            $progress->protein += $product->protein;
            $progress->fat += $product->fat;
            $progress->kcal += $product->kcal;
            $progress->carbo += $product->carbo;
            $progress->save();
        }
     

        return redirect()->back()->with('message', 'Produs adaugat la target-ul zilnic!');
    }

}
