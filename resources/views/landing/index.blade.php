@extends('landing.layouts.main')
@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
@endsection
@section('container')
    <!-- Hero Section Carousel -->
    <section id="hero" class="section hero light-background">
        <div class="carousel w-full">
            <div id="slide1" class="carousel-item relative w-full">
                <img src="/landing_assets/assets/img/carousel/perangkatDesa.jpg" class="w-full"
                    style="max-height: 80vh; overflow:hidden " />
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a class="prevBtn btn btn-circle">❮</a>
                    <a class="nextBtn btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <img src="/landing_assets/assets/img/carousel/gambar2.jpg" class="w-full"
                    style="max-height: 80vh; overflow:hidden" />
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a class="prevBtn btn btn-circle">❮</a>
                    <a class="nextBtn btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src="/landing_assets/assets/img/carousel/gambar3.jpg" class="w-full"
                    style="max-height: 80vh; overflow:hidden" />
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a class="prevBtn btn btn-circle">❮</a>
                    <a class="nextBtn btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src="/landing_assets/assets/img/carousel/gambar1" class="w-full"
                    style="max-height: 80vh; overflow:hidden" />
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                    <a class="prevBtn btn btn-circle">❮</a>
                    <a class="nextBtn btn btn-circle">❯</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        const slides = document.querySelectorAll(".carousel-item");
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove("opacity-100", "opacity-0");
                slide.classList.add("hidden"); // Initially hide all slides
                if (i === index) {
                    slide.classList.remove("hidden"); // Show the current slide
                    slide.classList.add("opacity-100");
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Event listeners for arrow buttons
        document.querySelectorAll(".prevBtn").forEach((btn) => {
            btn.addEventListener("click", prevSlide);
        });

        document.querySelectorAll(".nextBtn").forEach((btn) => {
            btn.addEventListener("click", nextSlide);
        });

        // Initial display
        showSlide(currentSlide);

        // Change slide every 3 seconds
        setInterval(nextSlide, 5000);
    </script>

    <style>
        .hidden {
            display: none;
        }

        .opacity-100 {
            opacity: 1;
            transition: opacity 1s;
        }

        .opacity-0 {
            opacity: 0;
            transition: opacity 1s;
        }
    </style>

    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="section about">
        <div class="container section-title mt-5" data-aos="fade-up">
            <h2>Tentang Desa Watatu</h2>
        </div>

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div id="map" style="width: 100%; height: 300px;"></div>
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-content ps-0 ps-lg-3">
                        <h3>Desa Watatu</h3>
                        <p>
                            Merupakan salah satu desa yang terletak di Kecamatan Banawa
                            Selatan, Kabupaten Donggala, Provinsi Sulawesi Tengah,
                            Indonesia. Desa ini memiliki beberapa keunikan dan daya tarik
                            yang membuatnya menjadi bagian penting dari wilayah Donggala.
                        </p>
                        <ul>
                            <li>
                                <!-- <i class="bi bi-fullscreen-exit"></i> -->
                                <div>
                                    <h4>Dengan menggunakan Website Desa Watatu ini</h4>
                                    <p>
                                        Dapatkan informasi terbaru seputar desa secara langsung
                                        dan transparan. Pengumuman penting, agenda desa, berita
                                        terkini, dan semua yang perlu Anda ketahui, selalu dalam
                                        genggaman Anda.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Dan juga mempromosikan produk UMKM lokal dan bantu para pelaku
                            usaha desa menjangkau pasar yang lebih luas. Website desa
                            digital menjadi etalase online yang tak kenal batas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="section counts light-background">
        <div class="container" data-aos="fade-up">
            <div class="section-title mt-6">
                <h2>Data Kependudukan Desa Watatu</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="bi bi-people-fill"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{!! $dataPenduduk['jumlah'] !!}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Jumlah Penduduk</p>
                        <div class="content"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="bi bi-person-arms-up"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $dataPenduduk['kepalaKeluarga'] }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Jumlah Kepala Keluarga</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-gender-male"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $dataPenduduk['laki-laki'] }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Jumlah Laki-Laki</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="bi bi-gender-female"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $dataPenduduk['perempuan'] }}"
                            data-purecounter-duration="2" class="purecounter"></span>
                        <p>Jumlah Perempuan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- Faq Section -->
    <section id="news" class="section news ">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Berita Terkini</h2>
        </div>
        <!-- End Section Title -->
        <!-- News Section -->

        <div class="container" data-aos="fade-up" data-aos-delay="100" data-aos-offset="0">
            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                    "delay": 2500
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                    },
                    "breakpoints": {
                    "320": {
                        "slidesPerView": 1,
                        "spaceBetween": 20
                    },
                    "480": {
                        "slidesPerView": 2,
                        "spaceBetween": 30
                    },
                    "640": {
                        "slidesPerView": 3,
                        "spaceBetween": 40
                    },
                    "992": {
                        "slidesPerView": 4,
                        "spaceBetween": 50
                    }
                    }
                }
                </script>
                <div class="swiper-wrapper align-items-center mb-5" style="text-align: justify">
                    @foreach ($dataBerita as $item)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top img-fluid"
                                        alt="" />
                                    <span class="position-absolute top-0 start-0 bg-white text-black rounded-end p-1"
                                        style="opacity: 0.8">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="/berita/{{ $item->slug }}">{{ $item->judul }}</a>
                                    </h3>
                                    <p class="card-text">
                                        {!! $item->excerpt !!}
                                    </p>
                                    <a href="/berita/{{ $item->slug }}" class="btn-getstarted">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- /News Section -->
        <!-- /Faq Section -->
    </section>

    <!-- Team Section -->
    <section id="perangkat" class="section team light-background">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up" data-aos-offset="-300">
            <h2>Perangkat Desa</h2>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @foreach ($perangkatDesa as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100"
                        data-aos-offset="-300">
                        <div class="member">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid"
                                alt="{{ $item->nama }}" style="height: 500px; width: 400px" />
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
    <!-- /Team Section -->

    <!-- Portfolio Section -->
    <section id="catalog" class="section portfolio mt-5">
        <!-- Section Title -->
        <div class="container section-title py-0 my-0" data-aos="fade-up" data-aos-offset="-300">
            <h2>Katalog Produk UMKM Desa Watau</h2>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100"
                    data-aos-offset="-300">
                    <li data-filter="*" class="filter-active">Semua</li>
                    <li data-filter=".filter-Usaha-Mikro">Usaha Mikro</li>
                    <li data-filter=".filter-Usaha-Kecil">Usaha Kecil</li>
                    <li data-filter=".filter-Usaha-Menengah">Usaha Menengah</li>
                    <li data-filter=".filter-Lainnya">Lainnya</li>
                </ul>
                <!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200" data-aos-offset="-300">
                    @foreach ($dataKatalog as $item)
                        <div
                            class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ str_replace(' ', '-', $item->kategori) }}">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset('storage/' . $item->gambar) }}" data-gallery="portfolio-gallery-app"
                                    class="glightbox preview-link d-block"
                                    title="<strong>{{ $item->nama_umkm }}</strong><br>{{ $item->deskripsi }}">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" title="{{ $item->nama_umkm }}"
                                        class="img-fluid" alt="" />
                                    <div class="portfolio-info">
                                        <h4>{{ $item->kategori }}</h4>
                                        <p>{{ $item->nama_umkm }}</p>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- End Portfolio Item -->
                    @endforeach
                </div>
            </div>
    </section>

    <section>
        {{-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9023.360327027527!2d119.5898147046901!3d-0.8761496308895701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1723267697351!5m2!1sid!2sid"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        <iframe src="https://www.google.com/maps/d/embed?mid=1yiMai1Mo-gKvtGqz3MJvhP2u5U8Qfno&ehbc=2E312F" width="100%"
            height="480"></iframe>
        {{-- <div id="map-large" style="width: 100%; height: 400px;"></div> --}}
        <div class="container">
        </div>
    </section>
    <!-- /Portfolio Section -->
@endsection
@section('js')
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="/landing_assets/assets/js/geojsondata.js"></script>
    <script>
        var datas = geojsonData.features
        datas.forEach((data) => {
            console.log(data.features[0].properties);
            if (data.features[0].properties.name == 'Dusun I') {
                data.features[0].properties.density = {{ $dusun1['jumlah'] }};
                data.features[0].properties.kepalaKeluarga = {{ $dusun1['kepalaKeluarga'] }};
                data.features[0].properties.lakiLaki = {{ $dusun1['laki-laki'] }};
                data.features[0].properties.perempuan = {{ $dusun1['perempuan'] }};
            } else if (data.features[0].properties.name == 'Dusun II') {
                data.features[0].properties.density = {{ $dusun2['jumlah'] }};
                data.features[0].properties.kepalaKeluarga = {{ $dusun2['kepalaKeluarga'] }};
                data.features[0].properties.lakiLaki = {{ $dusun2['laki-laki'] }};
                data.features[0].properties.perempuan = {{ $dusun2['perempuan'] }};
            } else if (data.features[0].properties.name == 'Dusun III') {
                data.features[0].properties.density = {{ $dusun3['jumlah'] }};
                data.features[0].properties.kepalaKeluarga = {{ $dusun3['kepalaKeluarga'] }};
                data.features[0].properties.lakiLaki = {{ $dusun3['laki-laki'] }};
                data.features[0].properties.perempuan = {{ $dusun3['perempuan'] }};
            } else if (data.features[0].properties.name == 'Dusun IV') {
                data.features[0].properties.density = {{ $dusun4['jumlah'] }};
                data.features[0].properties.kepalaKeluarga = {{ $dusun4['kepalaKeluarga'] }};
                data.features[0].properties.lakiLaki = {{ $dusun4['laki-laki'] }};
                data.features[0].properties.perempuan = {{ $dusun4['perempuan'] }};
            } else if (data.features[0].properties.name == 'Dusun V') {
                data.features[0].properties.density = {{ $dusun5['jumlah'] }};
                data.features[0].properties.kepalaKeluarga = {{ $dusun5['kepalaKeluarga'] }};
                data.features[0].properties.lakiLaki = {{ $dusun5['laki-laki'] }};
                data.features[0].properties.perempuan = {{ $dusun5['perempuan'] }};
            }

        })
        var map = L.map('map').setView([-0.883900, 119.589212], 13);

        function getColor(d) {
            return d > 1000 ? '#800026' :
                d > 600 ? '#BD0026' :
                d > 500 ? '#E31A1C' :
                d > 400 ? '#FC4E2A' :
                d > 300 ? '#FD8D3C' :
                d > 200 ? '#FEB24C' :
                '#FFEDA0';
        }

        var mapLink = '<a href="http://www.esri.com/">Esri</a>';
        var wholink =
            '';

        L.tileLayer(
            'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: '&copy; ' + mapLink + ', ' + wholink,
                maxZoom: 18,
            }).addTo(map);

        function style(feature) {
            return {
                fillColor: getColor(feature.properties.density),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.1
            };
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            info.update(layer.feature.properties);
            layer.bringToFront();
        }

        function resetHighlight(e) {
            info.update();
            geojson.resetStyle(e.target);
        }
        var geojson;

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        geojson = L.geoJson(geojsonData, {
            style: style,
            onEachFeature: onEachFeature
        }).addTo(map);

        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function(props) {
            this._div.innerHTML = '<h4>Peta Desa Watatu</h4>' + (props ?
                '<b>' + props.name + '</b><br />Jumlah penduduk : ' + props.density +
                ' Orang <br />Jumlah Kepala Keluarga : ' + props.kepalaKeluarga + ' <br />Jumlah Laki Laki : ' +
                props.lakiLaki + ' <br />Jumlah Perempuan : ' + props.perempuan :
                ''
            );
        };

        info.addTo(map);

        var legend = L.control({
            position: 'bottomright'
        });

        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [200, 300, 400, 500, 600, 700],
                labels = [];

            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }

            return div;
        };

        legend.addTo(map);
    </script>

    <script>
        var imageBounds = [
            [-0.857700, 119.551313],
            [-0.908800, 119.620285]
        ];

        L.imageOverlay('/landing_assets/assets/img/DesaWatatu2.png', imageBounds).addTo(map);
    </script>
@endsection
