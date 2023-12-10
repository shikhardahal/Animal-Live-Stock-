<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function filterAnimal(request $request)
    {
        $animal = $request->animal;
        $results = DB::table('product')
                    ->where('name', 'like', '%' . $animal . '%')
                    ->get();

     return view('animal_filter_frontend' , compact('results'));
    }


    public function Contact_store(request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $phoneNo = $request->input('phone_no');
        $message = $request->input('message');


        $contactFormIsSuccessful = DB::table('contact')->insert([

            'name' => $name,
            'phone' => $phoneNo,
            'email' => $email,
            'msg' => $message


        ]);


        if ($contactFormIsSuccessful) {
            return redirect()->back()->with('success', 'Message sent successfully');
        }else{
            return redirect()->back()->with('error', 'Message sending failed');

        }

     }


    public function contact_us(){
        return view('contact_us');
    }


     public function about(){
        return view('about');
     }


    Public function login(){

        return view('login');
    }


    public function login_user(request $request){

        $email = $request->input('email');
        $pass = $request->input('password');

        $user = DB::table('users')->where('email' , $email)->first();
        if($user){
            if(Hash::check($pass , $user->pass)){
                $request->session()->put('id' , $user->id);
                return redirect()->route('welcome');

            }else{
                return redirect()->back()->with('error' , 'This email is not registered .');
            }
        }


    }

    public function signup(){

        return view('signup');
    }


    public function register_user(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $phoneNumber = $request->input('phone_number');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirm_password');
        $term = $request->input('accept');
        $user_type = $request->input('user_type');

        if ($user_type !== null) {
            $type = $user_type; // Assign $user_type directly
        } else {
            $type = "user"; // Default value if $user_type is not provided
        }

        $existingUser = DB::table('users')->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email already exists. Please use a different email address.');
        }

        if ($term == 'on' && $password == $confirmPassword) {

            $reg = DB::table('users')->insert([
                'fname' => $firstName,
                'lname' => $lastName,
                'email' => $email,
                'num' => $phoneNumber,
                'pass' => Hash::make($password),
                'type' => $type,
            ]);

            if ($reg) {
                return redirect()->back()->with('success', 'Registration successful!');
            } else {
                return redirect()->back()->with('error', 'Oops, something went wrong with the registration.');
            }
        } else {
            return redirect()->back()->with('error', 'Oops, something went wrong with the provided credentials.');
        }
    }



    public function checkout(){

        return view('checkout');
    }

    public function livestock(){
        return view('livestock');
    }


    public function trackorder(){
        return view('trackorder');
    }


    public function detail(Request $request){
        $animalId = $request->input('animal_id');
        $detail = DB::table('product')->where('id' , $animalId)->first();
        return view('detail' , compact('detail'));
    }



    public function add_to_cart(request $request){
        if (session()->has('id')) {
            $id = $request->input('id');
        $count = $request->input('count');
        $user_id = session('id');


        $cart = DB::table('add_to_cart')->insert([
           'product_id' => $id,
           'qty' => $count,
            'user_id' => $user_id

        ]);

        if($cart){
            return response()->json(['Success' , $cart]);

        }else{
            return response()->json(['Error']);

        }

    }else{
        return response()->json('login');
    }
    }


    public function send_an_offer(request $request){
        if (session()->has('id')) {
            $id = $request->input('id');
        $count = $request->input('count');
        $user_id = session('id');


        $cart = DB::table('send_an_offer')->insert([
           'product_id' => $id,
           'qty' => $count,
            'user_id' => $user_id

        ]);

        if($cart){
            return response()->json(['Success' , $cart]);

        }else{
            return response()->json(['Error']);

        }

    }else{
        return response()->json('login');
    }
    }

    public function send_an_offer_from_addtocart(Request $request)
    {
        if (session()->has('id')) {
            $user_id = session('id');
            $cartIds = explode(',', $request->input('cart_ids'));
            $totalQty = $request->input('total_qty');
            $totalAmount = $request->input('total_amount');
            $truck_id = $request->input('truck_id');
            // Initialize an array to store the inserted offer IDs
            $insertedOfferIds = [];

            // Insert each product ID separately
            foreach ($cartIds as $cartId) {
                $insert_offer = DB::table('send_an_offer')->insert([
                    'product_id' => $cartId, // Insert one product ID at a time
                    'qty' => $totalQty,
                    'user_id' => $user_id,
                    'amount' => $totalAmount,
                    'truck_id' => $truck_id,

                ]);

                if ($insert_offer) {
                    $insertedOfferIds[] = $cartId; // Store the inserted offer IDs
                }
            }

            // Delete the cart items that were successfully inserted as offers
            $del = DB::table('add_to_cart')->whereIn('id', $insertedOfferIds)->delete();

            if ($del) {
                $request->session()->flash('offer_success', true);

                return response()->json(['message' => 'Success', 'inserted_offer_ids' => $insertedOfferIds]);
            } else {
                return response()->json(['message' => 'Error while deleting']);
            }
        } else {
            return response()->json(['message' => 'Login']);
        }
    }



    public function delete_cart_item(Request $request)
    {
        $item_id = $request->delete_cart_item;

        $del = DB::table('add_to_cart')->where('id' , $item_id)->delete();
        if($del){
            return redirect()->back()->with('success' , 'Cart item Deleted Successfully');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');

        }


    }




    public function logout(Request $request)
    {
        if (session()->has('id')){
            Auth::logout();

            // Clear the 'id' session variable
            $request->session()->forget('id');
            return redirect()->route('welcome');

        }else{
            // dd('asd');
               return redirect()->route('login');
        }

    }


       public function contact(){

         $contact = DB::table('contact')->get();
        return view('admin.contact' , compact('contact'));
       }










         //payment functions now-------------------------------------------------------------

         public function payment(){

            return view('payment');
         }


















    }
