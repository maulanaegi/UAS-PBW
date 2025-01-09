@extends('layouts.main')

@section('container')
  <!-- Header Start -->
  <div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $title }}</h1>
    </div>
  </div>
  <!-- Header End -->

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