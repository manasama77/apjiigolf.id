@extends('layouts.login')

@section('isi_aku_mas')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 login-section-wrapper">
                <div class="brand-wrapper">
                    <img src="{{ asset('PGA 2023.png') }}" alt="Logo" class="logo">
                    {{-- <h1>PGA</h1> --}}
                </div>
                <div class="login-wrapper my-auto">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1 class="login-title">Admin Login</h1>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                placeholder="enter your username" required autocomplete="username" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="enter your passsword" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block login-btn">
                            Login
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-block register-btn">
                            Register
                        </a>
                    </form>
                    {{-- <a href="#!" class="forgot-password-link">Forgot password?</a> --}}
                </div>
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="{{ asset('pexels-nadim-shaikh-7758348.jpg') }}" alt="Login Cover" class="login-img">
            </div>
        </div>
    </div>
@endsection
