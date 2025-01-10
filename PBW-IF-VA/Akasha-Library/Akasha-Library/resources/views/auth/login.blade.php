@extends('layouts.welcome')

@section('content')
<div class="container">
    @if (Route::has('login'))
        <div class="auth">
            @auth
                <h1 class="text-center text-dark font-weight-bold">Welcome Back, {{ auth()->user()->name }}</h1>
                <div class="text-center">
                    <a href="{{ url('/home') }}" class="btn btn-primary font-weight-bold">Go to Dashboard</a>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-lg">
                            <div class="card-header text-center bg-primary text-white">
                                <h4 class="font-weight-bold">{{ __('Login') }}</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label text-dark font-weight-bold">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label text-dark font-weight-bold">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 text-center">
                                        <span class="font-weight-bold">Belum punya akun?<a href="{{ route('register') }}" class="text-primary font-weight-bold">Register</a></span>
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary px-4 py-2 font-weight-bold">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    @endif
</div>
@endsection
