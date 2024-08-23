@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/dataPenduduk/{{ $data->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penduduk</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" required autofocus value="{{ old('nama', $data->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" required autofocus value="{{ old('nik', $data->nik) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk"
                            name="no_kk" required autofocus value="{{ old('no_kk', $data->no_kk) }}">
                        @error('no_kk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" required autofocus
                            value="{{ old('tempat_lahir', $data->tempat_lahir) }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" required autofocus
                            value="{{ old('tanggal_lahir', Carbon\Carbon::createFromFormat('d/m/Y', $data->tanggal_lahir)->format('Y-m-d')) }}">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"
                            aria-label="Default select example">
                            <option value="LAKI-LAKI" @if ($data->jenis_kelamin == 'LAKI-LAKI') selected @endif>LAKI-LAKI</option>
                            <option value="PEREMPUAN" @if ($data->jenis_kelamin == 'PEREMPUAN') selected @endif>PEREMPUAN</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="alamat_sekarang" class="form-label">Alamat Saat Ini</label>
                        <select class="form-select" id="alamat_sekarang" name="alamat_sekarang"
                            aria-label="Default select example">
                            <option value="DUSUN I" @if ($data->alamat_sekarang == 'DUSUN I') selected @endif>DUSUN I</option>
                            <option value="DUSUN II" @if ($data->alamat_sekarang == 'DUSUN II') selected @endif>DUSUN II</option>
                            <option value="DUSUN III" @if ($data->alamat_sekarang == 'DUSUN III') selected @endif>DUSUN III</option>
                            <option value="DUSUN IV" @if ($data->alamat_sekarang == 'DUSUN VI') selected @endif>DUSUN IV</option>
                            <option value="DUSUN V" @if ($data->alamat_sekarang == 'DUSUN V') selected @endif>DUSUN V</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="alamat_ktp" class="form-label">Alamat KTP</label>
                        <select class="form-select" id="alamat_ktp" name="alamat_ktp" aria-label="Default select example">
                            <option value="DUSUN I" @if ($data->alamat_sekarang == 'DUSUN I') selected @endif>DUSUN I</option>
                            <option value="DUSUN II" @if ($data->alamat_sekarang == 'DUSUN II') selected @endif>DUSUN II</option>
                            <option value="DUSUN III" @if ($data->alamat_sekarang == 'DUSUN III') selected @endif>DUSUN III</option>
                            <option value="DUSUN IV" @if ($data->alamat_sekarang == 'DUSUN VI') selected @endif>DUSUN IV</option>
                            <option value="DUSUN V" @if ($data->alamat_sekarang == 'DUSUN V') selected @endif>DUSUN V</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-select @error('status_perkawinan') is-invalid @enderror" id="status_perkawinan"
                            name="status_perkawinan" aria-label="Default select example">
                            <option value="KAWIN" @if ($data->status_perkawinan == 'KAWIN') selected @endif>KAWIN</option>
                            <option value="BELUM KAWIN" @if ($data->status_perkawinan == 'BELUM KAWIN') selected @endif>BELUM KAWIN
                            </option>
                            <option value="JANDA/DUDA" @if ($data->status_perkawinan == 'JANDA/DUDA') selected @endif>JANDA/DUDA
                            </option>
                            <option value="CERAI HIDUP" @if ($data->status_perkawinan == 'CERAI HIDUP') selected @endif>CERAI HIDUP
                            </option>
                            <option value="CERAI MATI @if ($data->status_perkawinan == 'CERAI MATI') selected @endif">CERAI MATI
                            </option>
                            <option value="CUCU" @if ($data->status_perkawinan == 'CUCU') selected @endif>CUCU</option>
                        </select>
                        @error('status_perkawinan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="status_hubungan_keluarga" class="form-label">Status Hubungan Keluarga</label>
                        <select class="form-select @error('status_hubungan_keluarga') is-invalid @enderror"
                            id="status_hubungan_keluarga" name="status_hubungan_keluarga"
                            aria-label="Default select example">
                            <option value="KEPALA KELUARGA" @if ($data->status_hubungan_keluarga == 'KEPALA KELUARGA') selected @endif>KEPALA
                                KELUARGA</option>
                            <option value="ISTRI" @if ($data->status_hubungan_keluarga == 'ISTRI') selected @endif>ISTRI</option>
                            <option value="ANAK KANDUNG" @if ($data->status_hubungan_keluarga == 'ANAK KANDUNG') selected @endif>ANAK KANDUNG
                            </option>
                            <option value="ANAK TIRI" @if ($data->status_hubungan_keluarga == 'ANAK TIRI') selected @endif>ANAK TIRI
                            </option>
                            <option value="ANAK ANGKAT" @if ($data->status_hubungan_keluarga == 'ANAK ANGKAT') selected @endif>ANAK ANGKAT
                            </option>
                            <option value="CUCU" @if ($data->status_hubungan_keluarga == 'CUCU') selected @endif>CUCU</option>
                            <option value="FAMILI LAIN" @if ($data->status_hubungan_keluarga == 'FAMILI LAIN') selected @endif>FAMILI LAIN
                            </option>
                        </select>
                        @error('status_hubungan_keluarga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                        <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                            id="pendidikan_terakhir" name="pendidikan_terakhir" required autofocus
                            value="{{ old('pendidikan_terakhir', $data->pendidikan_terakhir) }}">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                            id="pekerjaan" name="pekerjaan" required autofocus
                            value="{{ old('pekerjaan', $data->pekerjaan) }}">
                        @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" id="agama" name="agama" aria-label="Default select example">
                            <option value="ISLAM" @if ($data->agama == 'ISLAM') selected @endif>ISLAM</option>
                            <option value="KRISTEN" @if ($data->agama == 'KRISTEN') selected @endif>KRISTEN</option>
                            <option value="KATHOLIK" @if ($data->agama == 'KATHOLIK') selected @endif>KATHOLIK</option>
                            <option value="HINDU" @if ($data->agama == 'HINDU') selected @endif>HINDU</option>
                            <option value="BUDDHA" @if ($data->agama == 'BUDDHA') selected @endif>BUDDHA</option>
                            <option value="KONGHUCU" @if ($data->agama == 'KONGHUCU') selected @endif>KONGHUCU</option>
                        </select>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror"
                            id="kewarganegaraan" name="kewarganegaraan" required autofocus
                            value="{{ old('kewarganegaraan', $data->kewarganegaraan) }}">
                        @error('kewarganegaraan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <a href="/admin/dataPenduduk" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
