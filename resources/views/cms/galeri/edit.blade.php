@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/galeri/{{ $data->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                        name="judul" required autofocus value="{{ old('judul', $data->judul) }}">
                    @error('judul')
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
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" aria-label="Default select example">
                        <option value="Private" @if ($data->status == 'Private') selected @endif>Private</option>
                        <option value="Public" @if ($data->status == 'Public') selected @endif>Public</option>
                    </select>
                </div>
                <div class="mb-3">
                    <a href="/admin/galeri" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const title = document.querySelector('#judul');

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
