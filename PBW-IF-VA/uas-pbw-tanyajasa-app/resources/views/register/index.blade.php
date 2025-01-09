@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
    </div>
  </div>
  <!-- Header End -->

  <div class="container d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow" style="width: 24rem;">
        <h3 class="text-center mb-3">Register</h3>
        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control control-custom @error('name') is-invalid @enderror" id="name" placeholder="Enter your full name" name="name" required value="{{ old('name') }}" autofocus>
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control control-custom @error('username') is-invalid @enderror" id="username" placeholder="Choose a username" name="username" required value="{{ old("username") }}">
                @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control control-custom @error('email') is-invalid @enderror" id="email" placeholder="Enter your email" name="email" required value="{{ old("email") }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control control-custom @error('password') is-invalid @enderror" id="password" placeholder="Create a password" name="password" required>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control control-custom @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm your password" name="password_confirmation" required>
              @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>          
            <button type="submit" class="btn w-100" style="background-color: #0077b6; color: white">Register</button>
        </form>
        <p class="text-center mt-3">
            Already have an account? <a href="{{ route('login') }}" style="color: #0077b6;">Login</a>
        </p>
    </div>
  </div>
  
@endsection