@extends('landing.layouts.main')
@section('container')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Struktur Organisasi</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Struktur Organisasi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->
    <style></style>
    <!-- Struktur Organisasi Section -->
    <section id="struktur-organisasi" class="section">
        <!-- Section Title -->
        <div class="container">
            <div class="struktur-organisasi">
                <div class="row">
                    <div class="col-md-3 sidebar">
                        <a href="/strukturOrganisasi">Struktur Organisasi</a>
                        @foreach ($datas as $data)
                            <a href="/strukturOrganisasi?data={{ $data->jabatan }}">
                                @if ($data->jabatan == 1)
                                    Kepala Desa
                                @elseif($data->jabatan == 2)
                                    Sekertaris Desa
                                @elseif($data->jabatan == 3)
                                    Kaur Keuangan
                                @elseif($data->jabatan == 4)
                                    Kaur Umum & TU
                                @elseif($data->jabatan == 5)
                                    Kaur Perencanaan
                                @elseif($data->jabatan == 6)
                                    Kasi Kesejahteraan
                                @elseif($data->jabatan == 7)
                                    Kasi Pemerintahan
                                @elseif($data->jabatan == 8)
                                    Kasi Pelayanan
                                @elseif($data->jabatan == 9)
                                    Kepala Dusun I
                                @elseif($data->jabatan == 10)
                                    Kepala Dusun II
                                @elseif($data->jabatan == 11)
                                    Kepala Dusun III
                                @elseif($data->jabatan == 12)
                                    Kepala Dusun IV
                                @elseif($data->jabatan == 13)
                                    Kepala Dusun V
                                @endif
                            </a>
                        @endforeach
                    </div>
                    @if ($item == null)
                        <div class="col-md-9 main-content gap-0">
                            <h2 class="title">Struktur Organisasi</h2>
                            <div class="details gap-0 fit-img row-gap-6">
                                <div
                                    style="position: relative; width: 100%; height: 0; padding-top: 75.0000%;
                                    padding-bottom: 0; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                                    border-radius: 8px; will-change: transform;">
                                    <iframe loading="lazy"
                                        style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                                        src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAGMffgGWa0&#x2F;26v6ZqFMQKXUFayPzwE4cg&#x2F;view?embed"
                                        allowfullscreen="allowfullscreen" allow="fullscreen">
                                    </iframe>
                                </div>
                                <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAGMffgGWa0&#x2F;26v6ZqFMQKXUFayPzwE4cg&#x2F;view?utm_content=DAGMffgGWa0&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link"
                                    target="_blank" rel="noopener"> Struktur Organisasi
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9 main-content gap-0">
                            <h2 class="title">
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
                            </h2>
                            <div class="struktur-organisasi-img-detail">
                                <div class="img-perangkat">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
                                </div>
                                <div class="details gap-0 row-gap-6">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Jabatan</strong></div>
                                        <div class="col-md-9">:
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>Nama Pejabat</strong></div>
                                        <div class="col-md-9">: {{ $item->nama }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3"><strong>NIP</strong></div>
                                        <div class="col-md-9">:
                                            @if ($item->nip)
                                                {{ $item->nip }}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <p>Kepala Desa Watatu Periode 2022-2028</p> --}}
                                    <!-- <button class="btn btn-secondary btn-details">
                                                                                                                                                                                                                                                                                                        Detail Pegawai
                                                                                                                                                                                                                                                                                                      </button> -->
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- /Service Details Section -->
@endsection
