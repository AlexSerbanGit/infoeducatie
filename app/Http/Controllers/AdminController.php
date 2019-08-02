<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Allergy;
use App\Product;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Drug;
use App\Message;
use App\ProductToAllergy;
use Mail;
use App\ProductRequest;
use Auth;
use App\Charts\chartStats;




class AdminController extends Controller
{

    public function home(){
        $days = Auth::user()->dailyProgresses()->orderBy('id', 'DESC')->get();
        $arrow[0] = 0;
        $joke[0] = 0;
        for($i = 0 ; $i <= 6 ; $i++){
            if(isset($days[$i])){
                $arrow[$i] = $days[$i]->protein;
                $joke[$i] = 120;
            }else{
                break;
            }
        }

        $chart = new chartStats;
        $chart->labels(['Acu 2 saptamani', 'Saptamana trecuta', 'Aceasta saptamana']);

        $dataset = $chart->dataset('Invitati adaugati', 'line', $arrow);
        $dataset->backgroundColor(['transparent']);
        $dataset->color(['green']);
        $chart->dataset('Invitati adaugati', 'line', $joke);


        return view('admin.home')->with('chart', $chart);

    }

    public function users(){

        $users = User::where('role_id', '=', 0)->get();
        return view('admin.users')->with('users', $users);
    }

    public function doctors(Request $request){

        $users = User::where('role_id', '=', 1)->get();
        return view('admin.doctors')->with('users', $users);

    }

    public function restaurants()
    {

        $users = User::where('role_id', '=', 3)->get();
        return view('admin.restaurants')->with('users', $users);

    }

    public function addRestaurant(Request $request){
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if($validator -> fails()){
            return redirect()->back()->with('message', 'Datele restaurantului au fost introduse gresit!');
        }

        $user = new User;
        $user->phone_number = $request->phone_number;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 3;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('message', 'Restaurant adaugat cu succes!');

    }

    public function moderators(){

        $users = User::where('role_id', '=', 4)->get();
        return view('admin.moderators')->with('users', $users);

    }

    public function products(){

        $products = Product::all();

        $allergies = Allergy::all();

        foreach ($products as $key => $product) {
            $product -> allergies;
        }
        return view('admin.products', compact('products', 'allergies'));

    }

    public function messages(){

        $messages = Message::paginate(4);
        return view('admin.messages')->with('messages', $messages);

    }

    public function answer(Request $request, $id){

        $message = Message::find($id);

        if(!$message){
            return redirect()->back()->with('message', 'Mesajul nu a putut fi trimis!');
        }

        $request->to = $message->message;

        Mail::send('email.answer', ['request' => $request], function ($m) use ($request) {
            $m->from('contact@beescanner.ro', '🔺Raspuns!🔺');

            $m->to($request->email, $request->name)->subject('🔺Raspuns!🔺');
        });

        if($request->delete){
            $message -> delete();
        }

        return redirect()->back()->with('message', 'Mesajul a fost trimis cu succes!');

    }

    public function deleteMessage($id){

        $message = Message::find($id);

        if($message){

            $message->delete();
            return redirect()->back()->with('message', 'Mesajul a fost sters cu succes!');

        }
        return redirect()->back()->with('message', 'Mesajul nu a fost gasit!');
    }

    public function notifications(){

        $productRequests = ProductRequest::all();
        return view('admin.notifications')->with('productRequests', $productRequests);

    }


    // Not available :)
    public function drivers()
    {

        return view('admin.drivers');

    }

    public function allergies(){

        $allergies = Allergy::paginate(20);
        return view('admin.allergies')->with('allergies', $allergies);

    }

    public function menu(){
         return redirect('/admin/allergies');
    }

    public function contactUs(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:190',
            'email' => 'required|email|max:190',
            'message' => 'required|string|max:511',
        ]);

        if($validator -> fails()){
            return redirect()->back()->with('message', 'Datele introduse sunt invalide! Incercati din nou');
        }

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return redirect()->back()->with('message', 'Mesaj trimis cu succes! Veti fi contactat de echipa Bee Scanner pe email');

    }

    public function updateUser(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
            'name' => 'required|string',
            'language' => 'required|string',
            'email' => 'required|email',
        ]);

        if($validator -> fails()){
            return redirect()->back()->with('message', 'Utilizatorul nu a putut fi modificat deoarece informatiile trimise nu sunt valide!');
        }

        $user = User::find($id);
        if($user){

            if($user->role_id != 2){

                $user->phone_number = $request->phone_number;
                $user->name = $request->name;
                $user->language = $request->language;
                $user->email = $request->email;
                $user->save();
                return redirect()->back()->with('message', 'Utilizator modificat cu succes!');

            }else{

                return redirect()->back()->with('message', 'Nu aveti voie sa modificati administratori');

            }

        }else{

            return redirect()->back()->with('message', 'Utilizatorul nu a fost gasit');

        }

    }

    public function banUser($id){

        $user = User::find($id);

        if($user){

            if($user->banned == 0){
                $user->banned = 1;
                $user->save();
                return redirect()->back()->with('message', 'Utilizatorul a fost banat cu succes!');

            }else{
                $user->banned = 0;
                $user->save();
                return redirect()->back()->with('message', 'Utilizatorul a fost de-banat cu succes!');

            }

        }else{

            return redirect()->back()->with('message', 'Utilizatorul nu a fost gasit!');

        }

    }

    // public function allergies(){

    //     $allergies = Allergy::all();

    //     return view('admin.allergies')->with('allergies', $allergies);
    // }

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

    // public function products(){

    //     $products = Product::all();
    //     return view('admin.products')->with('products', $products);

    // }

    public function addProduct(Request $request){

        $validator = Validator::make($request -> all(), [
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
        if($validator -> fails()) {
            return redirect() -> back() -> with('message', 'Datele au fost introduse gresit!');
        }

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

        // foreach ($request -> allergies as $key => $allergy) {
        //     $product_to_allergy = new ProductToAllergy();
        //     $product_to_allergy -> allergy_id = $allergy;
        //     $product_to_allergy -> product_id = $product -> id;
        //     $product_to_allergy -> save();
        // }

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

        $validator = Validator::make($request -> all(), [
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
            'allergies' => 'sometimes|required|exists:allergies,id'
        ]);

        if($validator -> fails()) {
            return redirect() -> back() -> with('message', 'Datele au fost introduse gresit!');
        }

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

        // $dp = ProductToAllergy::where('product_id', $product -> id) -> get();
        //
        // foreach ($dp as $key => $value) {
        //     $value -> delete;
        // }
        //
        // if(isset($request -> allergies) && $request -> allergies) {
        //     foreach ($request -> allergies as $key => $allergy) {
        //         $product_to_allergy = new ProductToAllergy();
        //         $product_to_allergy -> allergy_id = $allergy;
        //         $product_to_allergy -> product_id = $product -> id;
        //         $product_to_allergy -> save();
        //     }
        // }

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
