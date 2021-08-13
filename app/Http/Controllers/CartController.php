<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;
use App\Province;
use App\City;
use App\Courier;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class CartController extends Controller
{
    public function AddCart($id){
 
 $product = DB::table('products')->where('id',$id)->first();

  $data = array();
 
 if ($product->discount_price == NULL) {
 	$data['id'] = $product->id;
 	$data['name'] = $product->product_name;
 	$data['qty'] = 1;
 	$data['price'] = $product->selling_price;
 	$data['weight'] = 1;
 	$data['options']['image'] = $product->image_one;
 	$data['options']['color'] = '';
 	$data['options']['size'] = '';
 	 Cart::add($data);
 	 return \Response::json(['success' => 'Successfully Added on your Cart']);
 }else{

 	$data['id'] = $product->id;
 	$data['name'] = $product->product_name;
 	$data['qty'] = 1;
 	$data['price'] = $product->discount_price;
 	$data['weight'] = 1;
 	$data['options']['image'] = $product->image_one;
 	$data['options']['color'] = '';
 	$data['options']['size'] = '';
 	 Cart::add($data);
 	 return \Response::json(['success' => 'Successfully Added on your Cart']);

 } 

    }

    public function check(){
    	$content = Cart::content();
    	return response()->json($content);
    }


    public function ShowCart(){
    	$cart = Cart::content();
        // return response  ($cart);
    	return view('pages.cart',compact('cart'));
    }


    public function removeCart($rowId){
    	Cart::remove($rowId);
    	$notification=array(
                        'messege'=>'Product Remove form Cart',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }


    public function UpdateCart(Request $request){

    	$rowId = $request->productid;
    	$qty = $request->qty;
    	Cart::update($rowId,$qty);
    	$notification=array(
                        'messege'=>'Product Quantity Updated',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

    }
 

    public function ViewProduct($id){
    	$product = DB::table('products')
    			->join('categories','products.category_id','categories.id')
    			->join('subcategories','products.subcategory_id','subcategories.id')
    			->join('brands','products.brand_id','brands.id')
    			->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
    			->where('products.id',$id)
    			->first();

    	$color = $product->product_color;
    	$product_color = explode(',', $color);
    	
    	$size = $product->product_size;
    	$product_size = explode(',', $size);	

   return response::json(array(
    'product' => $product,
    'color' => $product_color,
    'size' => $product_size,
   ));


    }

   public function insertCart(Request $request){
   	$id = $request->product_id;
    $product = DB::table('products')->where('id',$id)->first();
    $color = $request->color;
    $size = $request->size;
    $qty = $request->qty;

  $data = array();
 
 if ($product->discount_price == NULL) {
 	$data['id'] = $product->id;
 	$data['name'] = $product->product_name;
 	$data['qty'] = $request->qty;
 	$data['price'] = $product->selling_price;
 	$data['weight'] = 1;
 	$data['options']['image'] = $product->image_one;
 	$data['options']['color'] = $request->color;
 	$data['options']['size'] = $request->size;
 	 Cart::add($data);
 	 $notification=array(
                        'messege'=>'Product Added Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
 }else{

 	$data['id'] = $product->id;
 	$data['name'] = $product->product_name;
 	$data['qty'] = $request->qty;
 	$data['price'] = $product->discount_price;
 	$data['weight'] = 1;
 	$data['options']['image'] = $product->image_one;
 	$data['options']['color'] = $request->color;
 	$data['options']['size'] = $request->size;
 	 Cart::add($data);
 	 $notification=array(
                        'messege'=>'Product Added Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

 } 

   } 

   public function Checkout(Request $request){
  if (Auth::check()) {

  	$cart = Cart::content();

    $data = array();
  
    $order_id = uniqid();
    $total = $request->total;
  
        $this->initPaymentGateway($data);
  
        $customerDetails = [
          'first_name'  => Auth::user()->name,
          'last_name'   => Auth::user()->name,
          'email'       => Auth::user()->email,
          'phone'       => Auth::user()->phone,
        ];
  
        $params = [
          'enable_payments' => \App\Model\Payment::PAYMENT_CHANNELS,
          'transaction_details' => [
            'order_id' => $order_id,
            'gross_amount' => $total,
          ],
          'customer_details' => $customerDetails,
          'expiry' => [
            'start_date' => date('Y m d H:i:s T'),
            'unit' => \App\Model\Payment::EXPIRY_UNIT,
            'duration' => \App\Model\Payment::EXPIRY_DURATION,
          ],
        ];
  
        $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('pages.checkout',compact('cart', 'snapToken'));

  }else{
  	$notification=array(
                        'messege'=>'At first Login Your Account',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification);
  } 

   }

    
    public function index()
    {
        $provinces = Province::pluck('name', 'province_id');
        return view('pages.checkout', compact('provinces'));
    	// return view('pages.cart',compact('provinces'));

    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }


    public function check_ongkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }


  //  public function RajaOngkir()
  //  {
  //    $couriers = Courier::pluck('title', 'code');
  //    $provinces = Province::pluck('title', 'province_id');
  //    return view('pages.checkout', compact('couriers', 'provinces'));
  //  }

  //  public function GetCities($id)
  //  {
  //    $city = City::where('province_id', $id)->pluck('title', 'city_id');
  //    return json_encode($city);
  //  }

  //  public function submit(Request $request)
  //  {
  //    $cost = RajaOngkir::ongkosKirim([
  //      'origin'            => $request->city_origin,
  //      'destination'       => $request->city_destination,
  //      'weight'            => $request->weight,
  //      'courier'           => $request->courier, 
  //    ])->get();
  //  }


   public function wishlist(){
   $userid = Auth::id();
   $product = DB::table('wishlists')
           ->join('products','wishlists.product_id','products.id')
           ->select('products.*','wishlists.user_id')
           ->where('wishlists.user_id',$userid)
           ->get();
          // return response()->json($product);
           return view('pages.wishlist',compact('product'));
 
   }


   public function Coupon(Request $request){
   	$coupon = $request->coupon;

    $check = DB::table('coupons')->where('coupon',$coupon)->first();
    if ($check) {
    Session::put('coupon',[
    'name' => $check->coupon,
    'discount' => $check->discount,
    'balance' => Cart::Subtotal()-$check->discount 
    ]);
    	$notification=array(
                        'messege'=>'Successfully Coupon Applied',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);


    }else{
    	$notification=array(
                        'messege'=>'Invalid Coupon',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }

   }


 public function CouponRemove(){
 	Session::forget('coupon');
 	$notification=array(
                        'messege'=>'Coupon remove Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

 }



 public function PaymentPage(Request $request){
 
  $cart = Cart::Content();
  return view('pages.payment',compact('cart'));

 }


 public function Search(Request $request){
 
  $item = $request->search;
  // echo "$item";

  $products = DB::table('products')
            ->where('product_name','LIKE',"%$item%")
            ->paginate(20);

    return view('pages.search',compact('products'));        


 }




}