<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Province;
use App\City;
use App\Courier;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function awal()
    {
      $product = DB::table('products')->select('*')->first();

    	// $color = $product->product_color;
    	// $product_color = explode(',', $color);
    	
    	// $size = $product->product_size;
    	// $product_size = explode(',', $size);

      return view('pages.index', compact('product'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function EditProfile(){
       $profile = DB::table('users')->select('id')->where('users.id', Auth::user()->id)->first();

        return view('auth.profile', compact('profile'));
    }

    public function updateProfile(Request $request, $id){

      $data = array();
      $data['email'] = $request->email;
      $data['address'] = $request->address;

      $update = DB::table('users')->where('id', $id)->update($data);

      $notification=array(
        'messege'=>'Profile updayted!',
        'alert-type'=>'success'
         );
       return Redirect()->route('home')->with($notification); 
    }

    public function updatePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification); 
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'messege'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

    }

    public function Logout()
    {
        // $logout= Auth::logout();
            Auth::logout();
            $notification=array(
                'messege'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('login')->with($notification);
       

    }
}