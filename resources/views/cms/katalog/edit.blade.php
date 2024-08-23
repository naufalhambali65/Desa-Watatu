@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/katalog/{{ $data->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama_umkm" class="form-label">Nama UMKM</label>
                    <input type="text" class="form-control @error('nama_umkm') is-invalid @enderror" id="nama_umkm"
                        name="nama_umkm" required autofocus value="{{ old('nama_umkm', $data->nama_umkm) }}">
                    @error('nama_umkm')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pemilik" class="form-label">Pemilik UMKM</label>
                    <input type="text" class="form-control @error('pemilik') is-invalid @enderror" id="pemilik"
                        name="pemilik" required autofocus value="{{ old('pemilik', $data->pemilik) }}">
                    @error('pemilik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">gambar</label>
                    @if ($data->gambar)
                        <input type="hidden" name="oldgambar" value="{{ $data->gambar }}">
                        <img class="img-preview img-fluid mb-3 col-sm-5" src="{{ asset('storage/' . $data->gambar) }}"
                            style="display:block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar"
                        name="gambar" onchange="previewImage()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori" aria-label="Default select example">
                        <option value="Usaha Mikro" @if ($data->kategori == 'Usaha Mikro') selected @endif>Usaha Mikro</option>
                        <option value="Usaha Kecil" @if ($data->kategori == 'Usaha Kecil') selected @endif>Usaha Kecil</option>
                        <option value="Usaha Menengah" @if ($data->kategori == 'Usaha Menengah') selected @endif>Usaha Menengah
                        </option>
                        <option value="Lainnya" @if ($data->kategori == 'Lainnya') selected @endif>Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat UMKM</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" required autofocus value="{{ old('alamat', $data->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $data->deskripsi) }}">
                    <trix-editor input="deskripsi"></trix-editor>
                    @error('deskripsi')
                        <p class="text-danger">
                            <small>{{ $message }}</small>
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <a href="/admin/katalog" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
