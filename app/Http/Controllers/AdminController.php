<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Allergy;
use App\Product;

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

    public function products(){

        $products = Product::all();
        return view('admin.products')->with('products', $products);

    }

    public function addProduct(Request $request){

        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbo' => 'required|numeric',
            'kcal' => 'required|numeric',
            'barcode' => 'required|string',
            'image' => 'required',
            'category' => 'required|numeric',
            'type' => 'required|numeric',
        ]);
        
        $product = new Product;
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->protein = $request->protein;
        $product->fat = $request->fat;
        $product->carbo = $request->carbo;
        $product->kcal = $request->kcal;
        $product->barcode = $request->barcode;
        $product->category = $request->category;
        $product->type = $request->type;
        if($file = $request->file('image')){
            $name12 =  str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move('products', $name12);
            $product->image = $name12;
        }
        $product->save();

        return redirect()->back()->with('message', 'Produs adaugat!');
    }

    public function editProduct(Request $request, $id){

        
        $request->validate([
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'protein' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbo' => 'required|numeric',
            'kcal' => 'required|numeric',
            'barcode' => 'required|string',
            'category' => 'required|numeric',
            'type' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->protein = $request->protein;
        $product->fat = $request->fat;
        $product->carbo = $request->carbo;
        $product->kcal = $request->kcal;
        $product->barcode = $request->barcode;
        $product->category = $request->category;
        $product->type = $request->type;
        if($file = $request->file('image')){
            $name12 =  str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move('products', $name12);
            $product->image = $name12;
        }
        $product->save();

        return redirect()->back()->with('message', 'Produs modificat!');

    }

    public function deleteProduct($id){

        $product = Product::find($id);

        if($product){

            $product->delete();
            return redirect()->back()->with('message', 'Produst sters cu succes!');

        }

        return redirect()->back()->with('message', 'Produst invalid!');

    }

}
