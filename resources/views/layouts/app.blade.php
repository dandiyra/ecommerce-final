@php
$setting = DB::table('sitesetting')->first();

@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }} ">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/select2-bootstrap4.min.css') }}">
   


    <!-- chart -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('public/frontend/images/phone.png')}}"
                                        alt=""></div>{{ $setting->phone_one }}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('public/frontend/images/mail.png')}}"
                                        alt=""></div><a href="mailto:fastsales@gmail.com">{{ $setting->email }}</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @guest

                                @else
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#exampleModal">My Order
                                                Traking</a>
                                        </li>
                                    </ul>
                                </div>
                                @endguest

                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        @php
                                        $language = Session()->get('lang');
                                        @endphp

                                        <li>
                                            @if(Session()->get('lang') == 'indonesia' )
                                            <a href="{{ route('language.english') }}">English<i
                                                    class="fas fa-chevron-down"></i></a>
                                            @else
                                            <a href="{{ route('language.indonesia') }}">Indonesia<i
                                                    class="fas fa-chevron-down"></i></a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    @guest
                                    <div><a href="{{ route('login') }}">
                                            <div class="user_icon"><img
                                                    src="{{ asset('public/frontend/images/user.svg')}}" alt=""></div>
                                            Register/Login
                                        </a></div>
                                    @else
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                <div class="user_icon"><img
                                                        src="{{ asset('public/frontend/images/user.svg')}}" alt="">
                                                </div> Profile<i class="fas fa-chevron-down"></i>
                                            </a>
                                            <ul>
                                                <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                <li><a href="#">Others</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}"><img
                                            src="{{ asset('public/frontend/images/logo.png')}}" alt=""></a></div>
                            </div>
                        </div>
                        @php
                        $category = DB::table('categories')->get();
                        @endphp
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form method="post" action="{{ route('product.search') }}"
                                            class="header_search_form clearfix">
                                            @csrf
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Search for products..." name="search">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        @foreach($category as $row)
                                                        <li><a class="clc" href="#">{{ $row->category_name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img
                                                    src="{{ asset('public/frontend/images/search.png')}}"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    @guest

                                    @else

                                    @php
                                    $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
                                    @endphp
                                    <div class="wishlist_icon"><img src="{{ asset('public/frontend/images/heart.png')}}"
                                            alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">{{ count($wishlist) }}</div>
                                    </div>
                                </div>
                                @endguest

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('public/frontend/images/cart.png')}}" alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
                                            <div class="cart_price">${{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->


            <!-- Characteristics -->

            @yield('content')
            <!-- Footer -->
            @php
            $setting = DB::table('sitesetting')->first();

            @endphp
            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="#">{{ $setting->company_name }}</a></div>
                                </div>
                                <div class="footer_title">Got Question? Call Us</div>
                                <div class="footer_phone">{{ $setting->phone_two }}</div>
                                <div class="footer_contact_text">
                                    <p>{{ $setting->company_address }}</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="{{ $setting->instagram }}"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 offset-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Find it Fast</div>
                                <ul class="footer_list">
                                    <li><a href="#">Computers & Laptops</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Smartphones & Tablets</a></li>
                                    <li><a href="#">TV & Audio</a></li>
                                </ul>
                                <div class="footer_subtitle">Gadgets</div>
                                <ul class="footer_list">
                                    <li><a href="#">Car Electronics</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="footer_column">
                                <ul class="footer_list footer_list_2">
                                    <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Computers & Laptops</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Customer Care</div>
                                <ul class="footer_list">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Customer Services</a></li>
                                    <li><a href="#">Returns / Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Copyright -->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div
                                class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                                <div class="copyright_content">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://colorlib.com"
                                        target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                                <div class="logos ml-sm-auto">
                                    <ul class="logos_list">
                                        <li><a href="#"><img src="{{ asset('public/frontend/images/logos_1.png')}}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('public/frontend/images/logos_2.png')}}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('public/frontend/images/logos_3.png')}}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('public/frontend/images/logos_4.png')}}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <!--Order Traking Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label> Status Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Your Order Status Code">
                        </div>
                        <button class="btn btn-danger" type="submit">Track Now </button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('public/frontend/js/jquery-3.4.1.min.js')}}" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <script src="{{ asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
    <script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script
        src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.jsplugins/greensock/ScrollToPlugin.min.js')}}">
    </script>
    <script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
    <script src="{{ asset('public/frontend/plugins/easing/easing.js')}}"></script>
    <script src="{{ asset('public/frontend/js/custom.js')}}"></script>
    <script src="{{ asset('public/frontend/js/select2.min.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>


    <script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>
    <script src="{{ asset('public/frontend/js/customjs.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


    <script>
    @if(Session::has('messege'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
    </script>


    <script>
    $(document).on("click", "#return", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
                title: "Are you Want to Return?",
                text: "Once Return, this will return your money!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Cancel!");
                }
            });
    });
    </script>

    <!-- Raja Ongkir dan midtrans -->
    <script>
    $(document).ready(function() {

        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme: 'bootstrap4',
            width: 'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/ecommerce/cities/' + provinceId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append(
                            '<option value="">-- pilih kota asal --</option>');
                        $.each(response, function(key, value) {
                            $('select[name="city_origin"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append(
                    '<option value="">-- pilih kota asal --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/ecommerce/cities/' + provinceId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append(
                            '<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function(key, value) {
                            $('select[name="city_destination"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append(
                    '<option value="">-- pilih kota tujuan --</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('select[name="courier"]').on('change', function() {

            let token = $("meta[name='csrf-token']").attr("content");
            let city_origin = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier = $('select[name=courier]').val();
            let weight = $('#weight').val();

            if (isProcessing) {
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/ecommerce/ongkir",
                data: {
                    _token: token,
                    city_origin: city_origin,
                    city_destination: city_destination,
                    courier: courier,
                    weight: weight,
                },
                dataType: "JSON",
                type: "POST",
                beforeSend: function() {
                    $('#test1').removeAttr('hidden')
                },
                success: function(response) {
                    isProcessing = false;
                    if (response) {
                        console.log(response)
                        $('select[name="hasil"]').empty();
                        $('select[name="hasil"]').append(
                            '<option value="">-- Pilih Harga --</option>');
                        $.each(response[0]['costs'], function(key, value) {
                            $('select[name="hasil"]').append(
                                '<option value="' +
                                value.cost[0].value + '">' + response[0].code
                                .toUpperCase() +
                                ' : <strong>' + value.service +
                                '</strong> - Rp. ' + value.cost[0]
                                .value +
                                '</option>');
                        });
                    } else {
                        $('select[name="hasil"]').append(
                            '<option value="">-- Pilih Harga --</option>');
                    }
                }
            });

        });


        $('select[name="hasil"]').on('change', function() {

            let courier = $('select[name="hasil"]').val();
            let subtotal = document.getElementById("subtotal").getAttribute('data-value');
            var total = parseInt(courier) + parseInt(subtotal);
            var rupiah = "Rp";
            let order = document.getElementById("idOrder").getAttribute('data-value');

            console.log(order);

            let token = $("meta[name='csrf-token']").attr("content");
            let payButton = document.getElementById('pay-button');
            let produk = document.getElementById("nProduk").getAttribute('data-value');
            let id = document.getElementById("idProduk").getAttribute('data-value');
            let price = document.getElementById("harga").getAttribute('data-value');
            let qty = document.getElementById("qty").getAttribute('data-value');

            document.getElementById("ongkir").innerHTML = rupiah + courier;
            document.getElementById("test").innerHTML = rupiah + total;

            $.ajax({
                url: "/ecommerce/pay",
                type: 'post',
                data: {
                    _token: token,
                    order: order,
                    produk: produk,
                    qty: qty,
                    price: price,
                    total: total,
                },
                dataType: "JSON",
                success: function(response) {
                    /* Function midtrans snap pay*/
                    payButton.addEventListener('click', function() {
                        window.snap
                            .pay(
                                response
                            );
                    });
                }
            });

            $("#pay-button").click(function() {
                $.ajax({
                    url: "/ecommerce/paymidtrans",
                    type: 'post',
                    data: {
                        _token: token,
                        order: order,
                        courier: courier,
                        subtotal: subtotal,
                        produk: produk,
                        qty: qty,
                        price: price,
                        total: total,
                    },
                    dataType: "JSON",
                });
            });
        });

    });
    </script>
    <!-- End Raja Ongkir -->

</body>

</html>