@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

<div class="contact_form">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="signup-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                    aria-selected="false">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="login-tab">
                <div class="col-md-12 mt-3">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>
                        <form action="{{ route('login') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email or Phone</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" aria-describedby="emailHelp" required="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    aria-describedby="emailHelp" name="password" required="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Login</button>
                            </div>
                        </form>
                        <br>
                        <a href="{{ route('password.request') }}">I forgot my password</a> <br> <br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fab fa-facebook-square"></i>
                                Facebook </button>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i
                                    class="fab fa-google"></i> Google </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="signup-tab">
                <div class="col-md mt-3">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>
                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Enter Your Full Name " name="name" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" aria-describedby="emailHelp"
                                            placeholder="Enter Your Phone " required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                            placeholder="Enter Your Email " required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Enter Your Password " name="password" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm Password</label>
                                        <input type="password" class="form-control" aria-describedby="emailHelp"
                                            placeholder="Re-Type Password " name="password_confirmation" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <div>
                                            <label class="font-weight-bold">Alamat Provinsi</label>
                                        </div>
                                        <div class="form-control">
                                            <select class="form-control provinsi-tujuan" name="province_destination">
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{ $province  }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <div>
                                            <label class="font-weight-bold">Alamat Kota / Kabupaten</label>
                                        </div>
                                        <div class="form-control">
                                            <select class="form-control kota-tujuan" name="city_destination">
                                                <option value="">-- pilih kota --</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" aria-describedby="emailHelp" rows="5" name="address"
                                    placeholder="Enter your address" required=""></textarea>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection