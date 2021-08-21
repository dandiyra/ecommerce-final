@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">

<div class="characteristics">
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <img src="{{ asset( $product->image_one )}}" alt="" style="height: auto; max-width: 100%;">
                </div>
                <div class="col-md">
                    <h3>{{ $product->product_name }}</h3>
                    <h2>Rp {{ $product->selling_price }}</h2>
                    {!! $product->product_details !!}
                </div>
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('insert.into.cart') }}">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <div>
                                        <label for="Quantity">Quantity</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                                <span class="fas fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" id="quantity" name="qty" class="form-control input-number"
                                            value="1" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                                <span class="fas fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="exampleInputcolor">Color</label>
                                    </div>
                                    <div class="input-group">
                                        <select name="color" class="form-control" id="color">
                                            <option value="{{ $product->product_color }}">{{$product->product_color}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="cart_buttons"> <button data-id="{{ $product->id }}"
                                        class="btn btn-primary addcart">Add to Cart</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {


    var quantitiy = 0;
    $('.quantity-right-plus').click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-left-minus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });

});
</script>
@endsection