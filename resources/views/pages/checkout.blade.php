@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart_container">
                    <div class="cart_title">Checkout</div>
                    <div class="cart_items">
                        <ul class="cart_list">
                            <div id="idOrder" data-value="{{ $order }}" class="cart_item_text" hidden>
                                {{ $order  }}</div>
                            @foreach($cart as $row)
                            <li class="cart_item clearfix">
                                <div class="cart_item_image text-center"><br><img
                                        src="{{ asset($row->options->image) }} " style="width: 70px; width: 70px;"
                                        alt=""></div>
                                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
                                        <div class="cart_item_title">Name</div>
                                        <div id="nProduk" data-value="{{ $row->name  }}" class="cart_item_text">
                                            {{ $row->name  }}</div>
                                    </div>
                                    <div id="idProduk" data-value="{{ $row->rowId  }}" class="cart_item_text" hidden>
                                        {{ $row->rowId  }}</div>
                                    @if($row->options->color == NULL)
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Color</div>
                                        <div class="cart_item_text"> {{ $row->options->color }}</div>
                                    </div>
                                    @endif
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Quantity</div>
                                        <div id="qty" data-value="{{ $row->qty }}" class="cart_item_text">
                                            {{ $row->qty }}</div>
                                    </div>
                                    @if($row->options->size == NULL)
                                    @else
                                    <div class="cart_item_color cart_info_col">
                                        <div class="cart_item_title">Size</div>
                                        <div class="cart_item_text"> {{ $row->options->size }}</div>
                                    </div>
                                    @endif
                                    <div class="cart_item_price cart_info_col">
                                        <div class="cart_item_title">Price</div>
                                        <div id="harga" data-value="{{ $row->price }}" class="cart_item_text">
                                            ${{ $row->price }}</div>
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Total</div>
                                        <div class="cart_item_text">${{ $row->price*$row->qty }}</div>
                                        <input id="total" type="hidden" name="total"
                                            value="{{ Cart::Subtotal() + $charge + $vat }} ">
                                    </div>
                                    <div class="cart_item_total cart_info_col">
                                        <div class="cart_item_title">Action</div><br>
                                        <a href="{{ url('remove/cart/'.$row->rowId ) }}"
                                            class="btn btn-sm btn-danger">x</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md mt-3 mb-2">
                                        <div class="contact_form_container">
                                            <h4 class="contact_form_title text-center">Shipping Address</h4>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" rows="6"
                                                    aria-describedby="emailHelp" placeholder="Enter Your Address"
                                                    name="address">{{ Auth::user()->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Pilih Pengiriman</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group" hidden>
                                                <div>
                                                    <label class="font-weight-bold">PROVINSI ASAL</label>
                                                </div>
                                                <div class="form-control">
                                                    <select class="form-control provinsi-asal" name="province_origin">
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group" hidden>
                                                <div>
                                                    <label class="font-weight-bold">KOTA / KABUPATEN ASAL</label>
                                                </div>
                                                <div class="form-control">
                                                    <select class="form-control kota-asal" name="city_origin">
                                                        <option value="455">455</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group" hidden>
                                                <div>
                                                    <label class="font-weight-bold">PROVINSI TUJUAN</label>
                                                </div>
                                                <div class="form-control">
                                                    <select class="form-control provinsi-tujuan"
                                                        name="province_destination">
                                                        <option value="{{ Auth::user()->provinsi }}">
                                                            {{ Auth::user()->provinsi }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group" hidden>
                                                <div>
                                                    <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>
                                                </div>
                                                <div class="form-control">
                                                    <select class="form-control kota-tujuan" name="city_destination">
                                                        <option value="{{ Auth::user()->kota }}">
                                                            {{ Auth::user()->kota }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="font-weight-bold">KURIR</label>
                                                <select class="form-control kurir" name="courier">
                                                    <option value="0">-- pilih kurir --</option>
                                                    <option value="jne">JNE</option>
                                                    <option value="pos">POS</option>
                                                    <option value="tiki">TIKI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="font-weight-bold">BERAT (GRAM)</label>
                                                <input type="number" class="form-control" disabled name="weight"
                                                    id="weight" placeholder="Masukkan Berat (GRAM)"
                                                    value="{{  Cart::weightfloat() }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Harga Ongkir</label>
                                                <select class="form-control hasil" name="hasil">
                                                    <option value="">-- Pilih Harga --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order Total -->
                        <div class="row">
                            <div class="col-md mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="order_total_content">
                                            @if(Session::has('coupon'))
                                            @else
                                            <h5 style="margin-left: 20px;"> Apply Coupon </h5>
                                            <form method="post" action="{{ route('apply.coupon') }}">
                                                @csrf
                                                <div class="form group col-md">
                                                    <input type="text" name="coupon" class="form-control" required=""
                                                        placeholder="Enter Your Coupon">
                                                </div><br>
                                                <button type="submit" class="btn btn-danger ml-2">Submit
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <ul class="list-group">
                                        @if(Session::has('coupon'))
                                        <li class="list-group-item">Subtotal : <span style="float: right;">
                                                ${{ Session::get('coupon')['balance'] }} </span> </li>
                                        <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }} )
                                            <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">X</a>
                                            <span style="float: right;">${{ Session::get('coupon')['discount'] }}
                                            </span>
                                        </li>
                                        @else
                                        <li id="subtotal" data-value="{{  Cart::Subtotal() }}"
                                            class="list-group-item mt-2">
                                            Subtotal : <span style="float: right;">
                                                ${{  Cart::Subtotal() }} </span> </li>
                                        @endif
                                        <li class="list-group-item">Shiping Charge : <span style="float: right;"
                                                id="ongkir">${{ $charge  }}
                                            </span>
                                        </li>
                                        <li class="list-group-item">Vat : <span style="float: right;">${{ $vat }}
                                            </span>
                                        </li>
                                        @if(Session::has('coupon'))
                                        <li class="list-group-item">Total : <span
                                                style="float: right;">${{ Session::get('coupon')['balance'] + $charge + $vat }}
                                            </span>
                                        </li>
                                        @else
                                        <li class="list-group-item">Total : <span style="float: right;"
                                                id="test">${{ Cart::Subtotal() + $charge + $vat }}
                                            </span>
                                        </li>
                                        @endif
                                    </ul>
                                    <div class="mt-3">
                                        <a href="{{  route('awal') }}" class="button cart_button_clear">All Cancel</a>
                                        <button type="button" id="pay-button" class="button cart_button_checkout">Pay
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card d-none ongkir">
                                <div class="card-body">
                                    <ul class="list-group" id="ongkir"></ul>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DYBtLRKb5VjkZXuo"></script>
@endsection