@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Your Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="oldpass"
                                class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password"
                                    class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}"
                                    name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>
                                @if ($errors->has('oldpass'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('oldpass') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md mt-5">
                    <div class="card">
                        <div class="card-header">Profile Info</div>
                        <div class="card-body">
                            <form action="{{ url('update/profile/'.$profile->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Email</label>
                                    <input type="text" name="email" class="form-control" id="formGroupExampleInput"
                                        value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Address</label>
                                    <textarea type="text" name="address" rows="5" class="form-control"
                                        id="formGroupExampleInput2">{{ Auth::user()->address }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <div>
                                                <label class="font-weight-bold">Alamat Provinsi</label>
                                            </div>
                                            <div>
                                                <select class="form-control provinsi-tujuan"
                                                    name="province_destination">
                                                    <option value="{{ $alamat->province_id }} " selected>
                                                        {{ $alamat->nameP }} </option>
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
                                            <div>
                                                <select class="form-control kota-tujuan" name="city_destination">
                                                    <option value="{{ $alamat->city_id }} " selected>
                                                        {{ $alamat->name }} </option>
                                                    <option value="">-- pilih kota --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Change Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <img src="{{ asset('frontend/images/avatar.png') }}" class="card-img-top"
                    style="max-width:100%; height:auto">
                <div class=" card-body">
                    <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <a href="{{ route('profile.change') }}">Edit Profile</a> </li>
                    <li class="list-group-item"><a href="{{ route('success.orderlist') }}"> Return Order</a>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection