<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;

class RestaurantDashboardController extends Controller
{
    public function index() {
        
        return view('/restaurant/home');
    }

    public function products(){

        $products = Product::where('restaurant_id', '=', Auth::user()->id)->get();
        return view('restaurant.products')->with('products', $products);

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
            'price' => 'required|numeric'
        ]);
        if($request->id){
            $productRequests = ProductRequest::find($request->id);
            $productRequests->delete();
        }
        
        $product = new Product;
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->protein = $request->protein;
        $product->fat = $request->fat;
        $product->carbo = $request->carbo;
        $product->kcal = $request->kcal;
        $product->barcode = $request->barcode;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->description = $request->description;
        $product->restaurant_id = Auth::user()->id;
        if($file = $request->file('image')){
            $name12 =  str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move('products', $name12);
            $product->image = $name12;
        }
        $product->save();

        return redirect()->back()->with('message', 'Produs adaugat!');
    }

    public function deleteRequest($id){
        $request = ProductRequest::find($id);
        $request->delete();

        return redirect()->back()->with('message', 'Cerere stearsa cu succes!');
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
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->protein = $request->protein;
        $product->fat = $request->fat;
        $product->carbo = $request->carbo;
        $product->price = $request->price;
        $product->kcal = $request->kcal;
        $product->barcode = $request->barcode;
        $product->category = $request->category;
        $product->type = $request->type;
        $product->description = $request->description;
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
