<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon(){
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function Storecoupon(Request $request){
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->insert($data);
        $notification=array(
            'messege'=>'Coupon Inserted Succesfully!',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);

    }

    public function Deletecoupon($id){
        DB::table('coupons')->where('id', $id)->delete();
        $notification=array(
            'messege'=>'Coupon Deleted Succesfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }

    public function Editcoupon($id) {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));

    }

    public function Updatecoupon(Request $request, $id) {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->where('id', $id)->update($data);
        $notification=array(
            'messege'=>'Coupon Updated Succesfully!',
            'alert-type'=>'success'
             );
            return Redirect()->route('admin.coupon')->with($notification);
    }

    public function Newslater(){
        $sub = DB::table('newslaters')->get();
        return view('admin.coupon.newslater', compact('sub'));
    }

    public function Deletesub($id){
        DB::table('newslaters')->where('id', $id )->delete();
        $notification=array(
            'messege'=>'Subscriber Deleted Succesfully!',
            'alert-type'=>'success'
             );
            return Redirect()->route('admin.coupon')->with($notification);
    }
}
