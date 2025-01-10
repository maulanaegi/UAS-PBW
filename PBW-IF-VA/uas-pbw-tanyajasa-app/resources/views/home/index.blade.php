@extends('layouts.main')

@section('container')
  <!-- Carousel Start -->
  <div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid"src="{{ asset('img/c1.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Temukan Layanan Terbaik untuk Kebutuhan Anda</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Dapatkan bantuan profesional dari penyedia jasa terpercaya. Pilih kategori, temukan layanan, dan selesaikan kebutuhan Anda dengan mudah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset('img/c2.jpg') }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Temukan Layanan Jasa yang Sesuai dengan Kebutuhan Anda</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Percayakan pekerjaan Anda kepada penyedia jasa terpercaya. Jelajahi berbagai kategori layanan dan temukan yang terbaik untuk kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Carousel End -->


  <!-- Search Start -->
	<div class="container-fluid mb-5 wow fadeIn" data-wow-delay="0.1s" 
     style="background-color: #0077b6; padding: 35px;">
		<div class="container">
			<form action="{{ route('service') }}" method="GET">
				<div class="row g-2">
						<div class="col-md-10">
								<div class="row g-2">
										<div class="col-md-4">
												<input type="text" name="keyword" class="form-control border-0" placeholder="Kata Kunci" value="{{ request('keyword') }}">
										</div>
										<div class="col-md-4">
												<select name="category" class="form-select border-0">
														<option value="">Semua Kategori</option>
														@foreach ($categories as $category)
																<option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
																		{{ $category->name }}
																</option>
														@endforeach
												</select>
										</div>
										<div class="col-md-4">
												<input type="text" name="location" class="form-control border-0" placeholder="Lokasi (Kota/Provinsi)" value="{{ request('location') }}">
										</div>
								</div>
						</div>
						<div class="col-md-2">
								<button type="submit" class="btn btn-dark border-0 w-100">Cari</button>
						</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Search End -->



  <!-- Category Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Pilih Kategori</h1>
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

	<!-- Jobs Start -->
  <div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Daftar Jasa</h1>
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
																			<span class="text-truncate me-3">
																					<i class="fa fa-tags" style="color: #0077b6; margin-right: 8px;"></i>{{ $service->category->name }}
																			</span>
																			<span class="text-truncate me-3">
																					<i class="far fa-user" style="color: #0077b6; margin-right: 8px;"></i>{{ $service->user->name }}
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

  <!-- About Start -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5 align-items-center">
              <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                  <div class="row g-0 about-bg rounded overflow-hidden">
                      <div class="col-6 text-start">
                          <img class="img-fluid w-100" src="img/about-1.jpg">
                      </div>
                      <div class="col-6 text-start">
                          <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                      </div>
                      <div class="col-6 text-end">
                          <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                      </div>
                      <div class="col-6 text-end">
                          <img class="img-fluid w-100" src="img/about-4.jpg">
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
								<h1 class="mb-4">Kami Membantu Anda Menemukan Jasa Terbaik dan Memberikan Peluang</h1>
								<p class="mb-4">TanyaJasa hadir untuk memudahkan Anda mencari jasa terpercaya atau menemukan peluang terbaik untuk menawarkan keahlian Anda. Dengan platform ini, semua menjadi lebih cepat dan efisien.</p>
								<p><i class="fa fa-check" style="color: #0077b6; margin-right: 12px;"></i>Temukan jasa profesional yang sesuai kebutuhan Anda</p>
								<p><i class="fa fa-check" style="color: #0077b6; margin-right: 12px;"></i>Hubungkan keahlian Anda dengan mereka yang membutuhkan</p>
								<p><i class="fa fa-check" style="color: #0077b6; margin-right: 12px;"></i>Nikmati pengalaman praktis dan aman</p>
							</div>						
          </div>
      </div>
  </div>
  <!-- About End -->

@endsection