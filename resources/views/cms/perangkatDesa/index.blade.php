@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Perangkat Desa</h3>
                    <div class="card-tools">
                        <a href="/admin/perangkatDesa/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah Perangkat Desa</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-perangkat-desa" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center align-middle">Gambar</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>WhatsApp</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="text-align:center">
                                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->nama }}"
                                            style="width:100px">
                                    </td>
                                    <td>{{ $data->nama }}</td>
                                    <td>
                                        @if ($data->nip)
                                            {{ $data->nip }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
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
                                    </td>
                                    <td>
                                        @if ($data->instagram)
                                            {{ $data->instagram }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->facebook)
                                            {{ $data->facebook }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->whatsapp)
                                            {{ $data->whatsapp }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/perangkatDesa/{{ $data->id }}/edit" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/perangkatDesa/{{ $data->id }}" method="post"
                                            class="d-inline ">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger border-0"
                                                onclick="return confirm('yakin hapus data?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('js')
    <!-- Page specific script -->
    <script>
        $(function() {
            $('#tabel-perangkat-desa').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
