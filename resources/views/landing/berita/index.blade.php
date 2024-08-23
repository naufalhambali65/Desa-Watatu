@extends('landing.layouts.main')
@section('container')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Berita Desa</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li class="current"><a href="/">Home</a></li>
                    <li class="current">Berita Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container d-lg-flex justify-content-between ">
        <!-- News Section -->
        <section class="berita" data-aos="fade-up">
            @foreach ($dataBerita as $data)
                <article class="news-item">
                    <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                        style="width:400px; height:100%" class="fit-img img-fluid">
                    <div class="news-content">
                        <h3 class="fs-1"><a href="/berita/{{ $data->slug }}">{{ $data->judul }}</a></h3>
                        <p class="date">{{ $data->created_at->diffForHumans() }} | Operator Website Watatu</p>
                        <p>
                            {!! $data->excerpt !!}
                        </p>
                        <a href="/berita/{{ $data->slug }}" class="read-more">selengkapnya</a>
                    </div>
                </article>
            @endforeach
            <div class="mt-3">
                {{ $dataBerita->links() }}

            </div>
        </section>
    </div>
    <!-- /Portfolio Details Section -->
@endsection
