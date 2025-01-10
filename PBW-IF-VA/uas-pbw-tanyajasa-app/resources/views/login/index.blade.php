@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
    </div>
  </div>
  <!-- Header End -->

  <div class="container d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow" style="width: 24rem;">
			@if (session()->has('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

			@if (session()->has('loginError'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('loginError') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
        
      <h3 class="text-center mb-3">Login</h3>
			<form action="/login" method="post">
					@csrf
					<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control control-custom" id="username" placeholder="Enter your username" name="username" autofocus required @error('username') is-invalid @enderror value="{{ old("username") }}">
							@error('username')
									<div class="invalid-feedback">
											{{ $message }}
									</div>
							@enderror
					</div>
					<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control control-custom" id="password" placeholder="Enter your password" name="password" required @error('password') is-invalid @enderror style="border-color: #0077b6;">
							@error('password')
									<div class="invalid-feedback">
											{{ $message }}
									</div>
							@enderror
					</div>
					<button type="submit" class="btn w-100" style="background-color: #0077b6; color: white">Login</button>
			</form>
			<p class="text-center mt-3">
					Don't have an account? <a href="{{ route('register.index') }}" style="color: #0077b6;">Register</a>
			</p>

    </div>
  </div>
@endsection