@extends('landing.layouts.main')
@section('container')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Detail berita</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/berita">Home</a></li>
                    <li class="current">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">
        <div class="container">
            <div class="row gy-4" style="text-align: justify;">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                        class="img-fluid services-img" />
                    <h3 class="mb-3">
                        {{ $data->judul }}
                    </h3>
                    <p class="mb-3">
                        {!! $data->body !!}
                    </p>
                </div>
                <aside class="sidebar" data-aos="fade-up" data-aos-delay="200">
                    <div class="latest-news fw-bold">
                        <h4>Berita Terbaru</h4>
                        <ul>
                            @foreach ($dataBerita as $item)
                                <li class="row">
                                    <a href="/berita/{{ $item->slug }}" class="fs-5">{{ $item->judul }}</a>
                                    <span class="date">{{ $item->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- /Service Details Section -->
@endsection
