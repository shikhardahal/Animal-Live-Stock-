<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function Dashboard(){

       return view('admin.dashboard');

    }

     public function login_admin(){

        return view('admin.login_admin.login');
     }

     public function about_content(request $request){
            $content = $request->input('content');
            $con = DB::table('about')->update([
                'content' => $content,
            ]);

            if($con){
                return redirect()->back()->with(['success' => "Set Content Successfully"]);
            }

     }
    public function view_about(){

        return view('admin.about');
    }

     public function login_admin_dashboard(request $request){
        $email = $request->input('username');
        $pass = $request->input('password');
        $user = DB::table('users')->where('email' , $email)->first();
        if($user){
            if(Hash::check($pass , $user->pass)){
                $request->session()->put('id' , $user->id);
                return response()->json('success');

            }else{
                return response()->json('failed');
            }
        }


     }


     public function update_delivery_status(request $request){

        $id = $request->input('id');

        if($id){
            DB::table('offers')->where('id' , $id)->update([
                'delivery_status' => 1
            ]);

            return response()->json('Success');
        }


     }


    public function add_user(){


        return view('admin.user.create');

     }

     public function show_user(){
       $users = DB::table('users')->get();
        return view('admin.user.show' , compact('users'));

     }



     public function add_truck(){

        return view('admin.truck.create');
     }


     public function show_truck(){


        $trucks = DB::table('truck')->get();
        return view('admin.truck.show' , compact('trucks'));
     }


     public function store_truck(Request $request)
     {
         $validatedData = $request->validate([
             'truck_name' => 'required|string',
             'manufacture' => 'required|string',
             'capacity' => 'required|string',
             'availability' => 'required|string',
             'comments' => 'required|string',
         ]);



         $file = $request->file('image');
         $uniqueFileName = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
         $file->move(public_path('img'), $uniqueFileName);

         $filePath = 'img/' . $uniqueFileName;

         DB::table('truck')->insert([
             'truck_name' => $request->input('truck_name'),
             'manufacture' => $request->input('manufacture'),
             'capacity' => $request->input('capacity'),
             'availability' => $request->input('availability'),
             'comments' => $request->input('comments'),
             'image' =>$filePath,
             'price'=>$request->input('price'),
         ]);

         return redirect()->route('show_truck')->with('success', 'Truck added successfully');
     }



    public function add_product(){

         return view('admin.product.create');

    }
     public function show_product(){
        $pro  = DB::table('product')->get();
        return view('admin.product.show' , compact('pro'));

     }
     public function store_product(Request $request)
     {
         // Get the request data into variables
         $name = $request->input('name');
         $description = $request->input('description');
         $price = $request->input('price');
         $weight = $request->input('weight');
         $height = $request->input('height');
         $color = $request->input('color');
         $qty = $request->input('qty');
         $status = $request->input('status');
         $image = $request->file('images');

         // Insert the data into the 'product' table
         $productId = DB::table('product')->insertGetId([
             'name' => $name,
             'description' => $description,
             'price' => $price,
             'weight' => $weight,
             'height' => $height,
             'color' => $color,
             'qty' => $qty,
             'status' => $status,
         ]);

         if ($request->hasFile('images')) {
             foreach ($request->file('images') as $image) {
                 $uniqueFileName = md5(time() . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                 $image->move(public_path('img'), $uniqueFileName);

                 $filePath = 'img/' . $uniqueFileName;

                 // Insert image data into the 'product_images' table
                 DB::table('product_images')->insert([
                     'product_id' => $productId,
                     'image' => $filePath,
                 ]);
             }
         }

         return redirect()->back()->with('success', 'Animal added successfully');
     }


      public function view_orders(){

        return view('admin.view_orders');
      }


         public function offers(request $request){


            $orderId = $request->input('order');
            $deliver_to = $request->input('user');
            $costPerKm = $request->input('cost');
            $duration = $request->input('duration');
            $id = session('id');

            $offer = DB::table('offers')->insert([

                'order_id'=>$orderId,
                'deliver_to'=>$deliver_to,
                'cost'=>$costPerKm,
                'duration'=>$duration,
                'truck_user_id'=>$id,

            ]);


            return redirect()->back()->with(['msg' => "Offer Send successfully"]);


        }


         public function view_request(){

            return view('admin.view_request');
         }

         public function acceptAction(Request $request)
         {
             $id = $request->input('id');
             $cost = $request->input('cost');


                return view('payment' , compact('id' , 'cost'));



         }

         public function insert_payment_info_in_db(Request $request) {


            $cardholderName = $request->input('cardholder_name');
            $cardNumber = $request->input('card_number');
            $cardType = $request->input('card_type');
            $expDate = $request->input('exp_date');
            $cvv = $request->input('cvv');
            $id = $request->input('id');
            $cost = $request->input('cost');




            // Insert the data into the table
            $insert = DB::table('payment_details')->insert([
                'cardholder_name' => $cardholderName,
                'card_number' => $cardNumber,
                'card_type' => $cardType,
                'exp_date' => $expDate,
                'cvv' => $cvv,
                'cost' => $cost,

            ]);

            if ($insert) {
                // Update the 'offers' table
                $query = DB::table('offers')->where('id', $id)->update([
                    'status' => 1
                ]);

                if ($query) {
                    return response()->json(['msg' => 'Request accepted Successfully']);
                } else {
                    return response()->json(['error' => 'Failed to update offer status']);
                }
            } else {
                return response()->json(['error' => 'Failed to insert payment details']);
            }
        }






         public function rejectAction(Request $request)
         {
             $id = $request->input('id');
             $query = DB::table('offers')->where('id' , $id)->update([
                'status' => 2
             ]);

             if($query){

                return redirect()->back()->with(['asd' => 'Request Rejected']);
             }


         }


          public function location(){

            return view('admin.location');
          }


            public function location_update(request $request){

                 $offer_id = $request->offer_id ;
                 $location = $request->location ;
                 $lat = $request->lat ;
                 $long = $request->long ;

                DB::table('track')->insert([
                    'offer_id' => $offer_id,
                    'location' => $location ,
                    'lat' => $lat ,
                    'long' => $long,

                ]);

                  return redirect()->back()->with(['location' => 'Location updated Successully']);
            }

            public function track_order(){

                return view('admin.track_order');
            }


               public function Profile_Page(){

                return view('admin.profile');
               }



               public function profile_update(Request $request)
               {

                   // Get input data
                   $name = $request->input('name');
                   $last = $request->input('last');
                   $email = $request->input('email');
                   $num = $request->input('num');

                   if ($request->hasFile('img')) {
                       $file = $request->file('img');
                       $uniqueFileName = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                       $file->move(public_path('img'), $uniqueFileName);
                       $filePath = 'img/' . $uniqueFileName;

                       $id = session('id');

                       DB::table('users')->where('id', $id)->update([
                           'fname' => $name,
                           'lname' => $last,
                           'email' => $email,
                           'num' => $num,
                           'img' => $filePath, // Assuming you have a 'profile_image' column
                       ]);

                       return redirect()->back()->with(['message' => 'Profile updated successfully']);
                   } else {
                       return redirect()->back()->with(['message' => 'Image upload failed']);
                   }
               }

               public function password_change(Request $request)
               {
                   $request->validate([
                       'old_password' => 'required',
                       'new_password' => 'required|min:8',
                       'confirm_password' => 'required|same:new_password',
                   ]);

                   $old_password = $request->input('old_password');
                   $new_password = $request->input('new_password');

                   $id = session('id');
                   $user = DB::table('users')->where('id', $id)->first();

                   if (Hash::check($old_password, $user->password)) {
                       DB::table('users')->where('id', $id)->update(['password' => Hash::make($new_password)]);
                       return redirect()->back()->with(['message' => 'Password changed successfully']);
                   } else {
                       return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect']);
                   }
               }





                 //rating-----------------------------------------------------------------------------------

                 public function ratings(){

                    return view('admin.ratings');
                 }


                 public function rate_offer(request $request){

                    $offerId = $request->input('offerId');
                    $rating = $request->input('rating');

                    // Update the offer's rating in the database
                    DB::table('offers')
                        ->where('id', $offerId)
                        ->update(['ratings' => $rating]);

                    // Return a success response
                    return response()->json(['message' => 'Rating updated successfully']);
                          }




               public function View_Ratings(){
                return view('admin.View_Ratings');
               }





















            }
