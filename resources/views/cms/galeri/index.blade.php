@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Gambar</h3>
                    <div class="card-tools">
                        <a href="/admin/galeri/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah Galeri</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-galeri" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Judul</th>
                                <th style="text-align:center; width:100px">Gambar</th>
                                <th style="width:5%">Status</th>
                                <th class="text-center align-middle" style="width:100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td style="text-align:center">
                                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="{{ $data->judul }}"
                                            style="width:100px">
                                    </td>
                                    <td>
                                        @if ($data->status == 'Private')
                                            <span class="right badge rounded-pill badge-danger">Private</span>
                                        @elseif ($data->status == 'Public')
                                            <span class="right badge rounded-pill badge-success">Public</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/galeri/{{ $data->id }}/edit" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/galeri/{{ $data->id }}" method="post" class="d-inline ">
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
            $('#tabel-galeri').DataTable({
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
