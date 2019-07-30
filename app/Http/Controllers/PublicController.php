<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductRequest;
use Illuminate\Support\Facades\Validator;

class PublicController extends Controller
{
    public function sendRequest(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'kcal' => 'required|numeric',
            'carbo' => 'required|numeric',
            'barcode' => 'required|numeric',
            'category' => 'required|numeric',
            'type' => 'required|numeric',
        ]);

        if($validator -> fails()){
            return redirect()->back()->with('message', 'Date trimise incorect!');
        }

        $productRequest = new ProductRequest;
        $productRequest->name = $request->name;
        $productRequest->weight = $request->weight;
        $productRequest->protein = $request->protein;
        $productRequest->fat = $request->fat;
        $productRequest->carbo = $request->carbo;
        $productRequest->kcal = $request->kcal;
        $productRequest->barcode = $request->barcode;
        $productRequest->category = $request->category;
        $productRequest->type = $request->type;
        $productRequest->image = 'fara';
        $productRequest->save();
        return redirect()->back()->with('message', 'Cererea a fost trimisa administratorilor Bee Scanner. Iti multumim!');
    }
}
