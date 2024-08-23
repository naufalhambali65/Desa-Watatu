@extends('landing.layouts.main')
@section('container')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Perangkat Desa</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Perangkat Desa</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="perangkat" class="team section">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2>Perangkat Desa</h2>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @foreach ($perangkatDesa as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-offset="-300">
                        <div class="member">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama }}"
                                style="height: 500px; width: 400px" />
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{{ $item->nama }}</h4>
                                    <span>
                                        @if ($item->jabatan == 1)
                                            Kepala Desa
                                        @elseif($item->jabatan == 2)
                                            Sekertaris Desa
                                        @elseif($item->jabatan == 3)
                                            Kaur Keuangan
                                        @elseif($item->jabatan == 4)
                                            Kaur Umum & TU
                                        @elseif($item->jabatan == 5)
                                            Kaur Perencanaan
                                        @elseif($item->jabatan == 6)
                                            Kasi Kesejahteraan
                                        @elseif($item->jabatan == 7)
                                            Kasi Pemerintahan
                                        @elseif($item->jabatan == 8)
                                            Kasi Pelayanan
                                        @elseif($item->jabatan == 9)
                                            Kepala Dusun I
                                        @elseif($item->jabatan == 10)
                                            Kepala Dusun II
                                        @elseif($item->jabatan == 11)
                                            Kepala Dusun III
                                        @elseif($item->jabatan == 12)
                                            Kepala Dusun IV
                                        @elseif($item->jabatan == 13)
                                            Kepala Dusun V
                                        @endif
                                    </span>
                                </div>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Team Member -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Service Details Section -->
@endsection
