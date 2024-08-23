@extends('cms.layouts.main')
@section('container')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $berita }}</h3>

                    <p>Berita Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-paper"></i>
                </div>
                <a href="/admin/berita" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $katalog }}</h3>

                    <p>Katalog UMKM</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="/admin/katalog" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $dataPenduduk }}</h3>
                    <p>Data Kependudukan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-people"></i>
                </div>
                <a href="/admin/dataPenduduk" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $galeri }}</h3>
                    <p>Galeri Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-images"></i>
                </div>
                <a href="/admin/galeri" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $perangkatDesa }}</h3>
                    <p>Perangkat Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="/admin/perangkatDesa" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
@endsection
