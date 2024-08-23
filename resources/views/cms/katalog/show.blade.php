@extends('cms.layouts.main')
@section('container')
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $data->gambar) }}" class="card-img" alt="Nama UMKM">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3>{{ $data->nama_umkm }}</h3>
                            <dl class="row" style="text-align: justify;">
                                <dt class="col-sm-3">Nama Pemilik :</dt>
                                <dd>{{ $data->pemilik }}</dd>
                                <dt class="col-sm-3">Kategori UMKM :</dt>
                                <dd>{{ $data->kategori }}</dd>
                                <dt class="col-sm-3">Alamat UMKM :</dt>
                                <dd>{{ $data->alamat }}</dd>
                                <dt class="col-sm-3">Deskripsi UMKM :</dt>
                                <dd> {!! $data->deskripsi !!}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <a href="/admin/katalog" class="btn btn-success"><i class="bi bi-arrow-left"></i></a>
                <a href="/admin/katalog/{{ $data->id }}/edit" class="btn btn-primary"><i
                        class="bi bi-pencil-fill"></i></a>
                <form action="/admin/katalog/{{ $data->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin hapus data?')"><i
                            class="bi bi-trash3-fill"></i></button>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
