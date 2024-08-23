@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/perangkatDesa/{{ $data->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" required autofocus value="{{ old('nama', $data->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        name="nip" autofocus value="{{ old('nip', $data->nip) }}">
                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
                        <option value="1" @if ($data->jabatan == 1) selected @endif>Kepala Desa</option>
                        <option value="2" @if ($data->jabatan == 2) selected @endif>Sekertaris Desa</option>
                        <option value="3" @if ($data->jabatan == 3) selected @endif>Kaur Keuangan</option>
                        <option value="4" @if ($data->jabatan == 4) selected @endif>Kaur Umum & TU</option>
                        <option value="5" @if ($data->jabatan == 5) selected @endif>Kaur Perencanaan</option>
                        <option value="6" @if ($data->jabatan == 6) selected @endif>Kasi Kesejahteraan</option>
                        <option value="7" @if ($data->jabatan == 7) selected @endif>Kasi Pemerintahan</option>
                        <option value="8" @if ($data->jabatan == 8) selected @endif>Kasi Pelayanan</option>
                        <option value="9" @if ($data->jabatan == 9) selected @endif>Kepala Dusun I</option>
                        <option value="10" @if ($data->jabatan == 10) selected @endif>Kepala Dusun II</option>
                        <option value="11" @if ($data->jabatan == 11) selected @endif>Kepala Dusun III</option>
                        <option value="12" @if ($data->jabatan == 12) selected @endif>Kepala Dusun IV</option>
                        <option value="13" @if ($data->jabatan == 13) selected @endif>Kepala Dusun V</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Akun Instagram</label>
                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                        name="instagram" autofocus value="{{ old('instagram', $data->instagram) }}">
                    @error('instagram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Akun Facebook</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                        name="facebook" autofocus value="{{ old('facebook', $data->facebook) }}">
                    @error('facebook')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="form-label">Nomor WhatsApp</label>
                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp"
                        name="whatsapp" autofocus value="{{ old('whatsapp', $data->whatsapp) }}">
                    @error('whatsapp')
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
                    <a href="/admin/perangkatDesa" class="btn btn-xs btn-primary">Kembali</a>
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
