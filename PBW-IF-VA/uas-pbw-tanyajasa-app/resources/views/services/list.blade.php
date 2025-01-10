@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
    </div>
  </div>
  <!-- Header End -->


  <!-- Jobs Start -->
  <div class="container-xxl py-5">
    <div class="container">
        
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
									@foreach ($services as $service)
											<div class="job-item p-4 mb-4">
													<div class="row g-4">
															<div class="col-sm-12 col-md-8 d-flex align-items-center">
																	@if ($service->image_url)
																			<img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $service->image_url) }}" alt="" style="width: 80px; height: 80px;">
																	@else
																			<i class="fa fa-3x fa-code" style="color: #0077b6; margin-bottom: 16px;"></i>
																	@endif
																	<div class="text-start ps-4">
																			<a href="/services/{{ $service->slug }}">
																					<h5 class="mb-3">{{ $service->name }}</h5>
																			</a>
																			<a href="{{ route('services.category', $service->category->slug) }}" style="color: #0077b6;">
																				<span class="text-truncate me-3"><i class="fa fa-tags me-2" style="color: #0077b6;"></i>{{ $service->category->name }}</span>
																			</a>
																			<span class="text-truncate me-3">
																					<i class="far fa-user" style="color: #0077b6; margin-right: 8px;"></i>
																					<a href="{{ route('user-profile', ['username' => $service->user->username]) }}" style="color: #0077b6;">
																						{{ $service->user->name }}
																					</a>
																			</span>
																			<span class="text-truncate me-0">
																					<i class="far fa-money-bill-alt" style="color: #0077b6; margin-right: 8px;"></i>>= Rp.{{ $service->price }}
																			</span>
																	</div>
															</div>
															<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
																	<div class="d-flex mb-3">
																			<a class="btn" href="/services/{{ $service->slug }}" 
																				style="background-color: #0077b6; color: white; border: none;">
																					Lihat Detail
																			</a>
																	</div>
															</div>
													</div>
											</div>
									@endforeach
									<div>
										{{ $services->links('pagination::custom') }}
									</div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Jobs End -->
@endsection