@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
    </div>
  </div>
  <!-- Header End -->


  <!-- Category Start -->
  <div class="container-xxl py-5">
    <div class="container">
        
        <div class="row g-4">
					@foreach ($categories as $category)
							<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
									<a class="cat-item rounded p-4" href="{{ route('services.category', $category->slug) }}">
											@if ($category->image_url)
													<img src="{{ asset('storage/' . $category->image_url) }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;" class="mb-3" alt="{{ $category->name }}">
											@else
													<i class="fa fa-3x fa-laptop-code text-primary mb-4"></i>
											@endif
											<h6 class="mb-3">{{ $category->name }}</h6>
									</a>
							</div>
					@endforeach
				</div>
    </div>
	</div>
  <!-- Category End -->
@endsection