<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\City;
use App\Province;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class CheckOngkirController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
          $cart = Cart::content();
          $provinces = Province::pluck('nameP', 'province_id');
          return view('ongkir',compact('cart', 'provinces'));
      
    	// return view('pages.cart',compact('provinces'));

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    public function Midtrans(Request $request)
   {
    $data = array();
  
    $order_id = uniqid();
    $id = $request->id;
    $total = $request->total;
    $produk = $request->produk;
    $qty = $request->qty;
    $price = $request->price;

        $this->initPaymentGateway($data);
  
        $customerDetails = [
          'first_name'  => Auth::user()->name,
          'email'       => Auth::user()->email,
          'phone'       => Auth::user()->phone,
        ];

        $items = [
            'id' => $id,
            'price'=> $price,
            'quantity' => $qty,
            'name'=> $produk,
        ];
  
        $params = [
          'enable_payments' => \App\Model\Payment::PAYMENT_CHANNELS,
          'transaction_details' => [
            'order_id' => $order_id,
            'gross_amount' => $total,
          ],
          'items' => $items,
          'customer_details' => $customerDetails,
          'expiry' => [
            'start_date' => date('Y m d H:i:s T'),
            'unit' => \App\Model\Payment::EXPIRY_UNIT,
            'duration' => \App\Model\Payment::EXPIRY_DURATION,
          ],
        ];
  
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json($snapToken);
   }

}