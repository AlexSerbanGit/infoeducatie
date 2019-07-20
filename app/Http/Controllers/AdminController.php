<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Allergy;
use App\Product;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function menu(){
         return redirect('/admin/allergies');
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

    public function parseCSV(Request $request) {

        $error_messages = [
                'csv-file.required' => 'Fisierul csv este necesar!',
                'csv-file.mimes' => 'Fisierul trebuie sa fie de tip csv!',
            ];

        $validator = Validator::make($request -> all(), [
            'csv-file' => 'required|file|mimes:csv,txt'
        ], $error_messages);

        if($validator -> fails()) {
            return redirect() -> back() -> withErrors($validator);
        }

        if ($request-> hasFile('csv-file')) {

            $file = $request -> file('csv-file');
            $csv_data = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csv_data));

            $CSV_rows_number = count($rows);

            $header = explode(";", implode(array_shift($rows)));

            foreach ($rows as $key => $row) {
                $content[$key] = explode(";", implode(array_shift($rows)));
            }

            for($i = 0; $i < $CSV_rows_number; $i++) {

                $product = new Product();
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
            return redirect() -> back() -> with('message', 'A aparutt o problema la parsare!');
        }
    }
}