<?php

namespace App\Http\Controllers;

use Auth;
use App\UserStats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function update(Request $request) {

        $request -> validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'picture' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'gender' => 'required|min:1|max:2|numeric',
            'city_id' => 'sometimes|required|exists:cities,id',
            'country' => 'sometimes|required|string|min:1',
            'age' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'lifestyle' => 'required|numeric|min:1|max:4',
        ]);

        $user = Auth::user();

        $user -> name = $request -> name;

        $user -> phone_number = $request -> phone_number;

        $user -> city_id = $request -> city_id ? $request -> city_id : $user -> city_id;

        $user -> country = $request -> country ? $request -> country : $user -> country;

        if($request -> hasFile('picture')){

            $picture_name =  str_random(15) . '.' . $request -> file('picture') -> extension();

            $request -> file('picture') -> move('pictures', $picture_name);

            $user -> picture = $picture_name;
        }

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

        return redirect()->back()->with('message', 'Profilul a fost actualizat cu succes!');
    }
}
