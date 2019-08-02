<?php

namespace App\Http\Controllers;

use App\Allergy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantDashboardController extends Controller
{
    public function index() {

        return view('/restaurant/home');
    }

    public function products(){

        $products = Product::where('restaurant_id', '=', Auth::user()->id)->get();

        $allergies = Allergy::all();

        return view('restaurant.products', compact('products', 'allergies'));

    }

    public function addProduct(Request $request){

        $request->validate([
            'product_type' => 'required|numeric',
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
            'price' => 'required|numeric',
            'allergies' => 'sometimes|required|exists:allergies,id'
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
        $product->price = $request->price;
        $product->carbo = $request->carbo;
        $product->kcal = $request->kcal;
        $product->barcode = $request->barcode;
        $product->product_type = $request->product_type;
        $product->category = $request->category;
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
            'product_type' => 'required|numeric',
            'fat' => 'required|numeric',
            'carbo' => 'required|numeric',
            'kcal' => 'required|numeric',
            'barcode' => 'required|string',
            'category' => 'required|numeric',
            'type' => 'required|numeric',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->protein = $request->protein;
        $product->fat = $request->fat;
        $product->carbo = $request->carbo;
        $product->price = $request->price;
        $product->kcal = $request->kcal;
        $product->product_type = $request->product_type;
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

    public function parseCSV(Request $request) {

        $error_messages = [
            'csv.required' => 'Fisierul csv este necesar!',
            'csv.mimes' => 'Fisierul trebuie sa fie de tip csv!',
        ];

        $validator = Validator::make($request -> all(), [
            'csv' => 'required|mimes:csv,txt'
        ], $error_messages);

        if($validator -> fails()) {
            return redirect() -> back() -> with('message', $validator -> errors());
        }

        if ($request-> hasFile('csv')) {

            $file = $request -> file('csv');
            $csv_data = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csv_data));

            $CSV_rows_number = count($rows);

            $header = explode(";", implode(array_shift($rows)));

            foreach ($rows as $key => $row) {
                $content[$key] = explode(";", implode(array_shift($rows)));
            }

            for($i = 0; $i < $CSV_rows_number; $i++) {

                $product = new Product();
                $product -> restaurant_id = Auth::user() -> id;
                $product -> name = $content[$key][1];
                $product -> weight = $content[$key][2];
                $product -> protein = $content[$key][3];
                $product -> fat = $content[$key][4];
                $product -> carbo = $content[$key][5];
                $product -> kcal = $content[$key][6];
                $product -> barcode = $content[$key][7];
                $product -> image = 'default_picture.jpg';
                $product -> category = 1;
                $product -> type = 1;
                $product -> save();
            }
            return redirect() -> back() -> with('message', 'Fisierul a fost parsat cu succes!');
        } else {
            return redirect() -> back() -> with('message', 'A aparut o problema la parsare!');
        }
    }
}
