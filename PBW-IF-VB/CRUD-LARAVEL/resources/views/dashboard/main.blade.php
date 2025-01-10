@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-light rounded shadow-sm">
    <div class="container-fluid p-0">
        <!-- Header -->
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                @foreach ([
                    ['image' => 'logo/bg msc.jpg', 'title' => 'Things To-Do', 'text' => 'Lihat semua konser artis favorit Anda!'],
                    ['image' => 'logo/xh.jpeg', 'title' => 'Discover New Events', 'text' => 'Temukan konser terbaru di lokasi Anda!'],
                    ['image' => 'logo/greenday.jpeg', 'title' => 'Book Your Tickets', 'text' => 'Pesan tiket sekarang untuk pengalaman luar biasa!']
                ] as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="hero-section" style="background-image: url('{{ asset($slide['image']) }}'); background-size: cover; background-position: center; height: 400px; position: relative; border-radius: 25px;">
                        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.5); position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 25px;"></div>
                        <div class="container text-center text-white position-relative" style="z-index: 1; top: 50%; transform: translateY(-50%);">
                            <h1 class="fw-bold" style="font-family: 'Poppins', sans-serif;">{{ $slide['title'] }}</h1>
                            <p class="mb-4" style="font-size: 1.2rem;">{{ $slide['text'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar py-3 mt-4 rounded-pill shadow-lg" style="background: linear-gradient(to right, #23d538c, #3d538c);">
        <form action="#" method="GET" class="d-flex justify-content-center">
            <input type="text" class="form-control w-50 rounded-pill px-4 border-0 shadow-sm " placeholder="Cari Konser" style="font-size: 16px;">
            <button type="submit" class="btn btn-gradient rounded-pill ms-2 px-4 fw-bold shadow" style="background: linear-gradient(to right, #000000, ); color: rgb(0, 0, 0);">Cari</button>
        </form>
    </div>

    <!-- Cards Section -->
    <div class="row g-4 mt-3">
        @foreach ([
            ['image' => 'logo/xh.jpeg', 'title' => 'Break The Brake', 'price' => 'IDR 2.000.000', 'location' => 'Jakarta'],
            ['image' => 'logo/day6.jpg', 'title' => 'Forever Young', 'price' => 'IDR 2.850.000', 'location' => 'Jakarta'],
            ['image' => 'logo/so7.jpg', 'title' => 'Sheila on 7', 'price' => 'IDR 2.850.000', 'location' => 'Jakarta'],
            ['image' => 'logo/gf.jpg', 'title' => 'Season of Memory Gfriend', 'price' => 'IDR 2.850.000', 'location' => 'Jakarta'],
            ['image' => 'logo/greenday.jpeg', 'title' => 'Green Day', 'price' => 'IDR 2.850.000', 'location' => 'Jakarta'],
            ['image' => 'logo/mcr.jpg', 'title' => 'My Chemical Romance', 'price' => 'IDR 2.850.000', 'location' => 'Jakarta']
        ] as $card)
        <div class="col-md-4">
            <div class="card text-dark fw-bold bg-light h-100 shadow-sm rounded-3"  ;>
                <img src="{{ asset($card['image']) }}" alt="poster" class="img-fluid rounded-top" style="height: 300px; object-fit: cover;">
    
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="font-family: 'Poppins', sans-serif;">{{ $card['title'] }}</h5>
                    <p class="card-text text-danger fw-bold">{{ $card['price'] }}</p>
    
                    <!-- Lokasi -->
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                        <p class="mb-0 text-muted">{{ $card['location'] }}</p>
                    </div>
    
                    <!-- Tombol Beli -->
                    <a href="{{ url('pemesanan/create') }}" class="btn w-100 fw-bold mt-3" 
                        style="background: linear-gradient(to right, #304f9e, #23469f); color: white; transition: 0.3s;">
                        Beli Tiket
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    

<!-- Footer -->
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold" style="font-family: 'Poppins', sans-serif;">Tentang Kami</h5>
                <p>Kami menyediakan tiket konser terbaik untuk semua genre musik favorit Anda. Temukan konser impian Anda bersama kami.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold" style="font-family: 'Poppins', sans-serif;">Kontak</h5>
                <ul class="list-unstyled">
                    <li>Email: support@tiketkonser.com</li>
                    <li>Telepon: +62 123 456 789</li>
                    <li>Alamat: Jl. Musik No. 10, Jakarta</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold" style="font-family: 'Poppins', sans-serif;">Ikuti Kami</h5>
                <div>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2025 TiketKonser. Semua Hak Dilindungi.</p>
        </div>
    </div>
</footer>

<!-- Additional CSS -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    .hero-section {
        margin-bottom: 20px;
    }

    .hero-section h1 {
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .card:hover {
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(151, 125, 125, 0.5);
        border-radius: 50%;
    }

    .search-bar {
        background: linear-gradient(to right, #304f9e);
        padding: 20px;
        border-radius: 50px;
    }

    footer {
        font-size: 0.9rem;
    }

</style>
@endsection
