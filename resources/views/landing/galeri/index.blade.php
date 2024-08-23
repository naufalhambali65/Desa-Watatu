@extends('landing.layouts.main')
@section('container')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Galeri Desa</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li class="current"><a href="/">Home</a></li>
                    <li class="current">Galeri Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->
    <section id="catalog" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2>Galeri Desa Watatu</h2>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($dataGaleri as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset('storage/' . $item->gambar) }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link d-block">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid"
                                        alt="{{ $item->judul }}" />
                                    <div class="portfolio-info d-flex justify-content-center align-items-center">
                                        <p>{{ $item->judul }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End Portfolio Item -->
                    @endforeach

                </div>
                <div class="mt-3">
                    {{ $dataGaleri->links() }}

                </div>
                <!-- End Portfolio Container -->
            </div>
        </div>
    </section>
@endsection
