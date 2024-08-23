@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Berita</h3>
                    <div class="card-tools">
                        <a href="/admin/berita/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah Berita</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-berita" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 50%">Judul</th>
                                <th style="width: 5%">Status</th>
                                <th style="width: 20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>
                                        @if ($data->status == 'Private')
                                            <span class="right badge rounded-pill badge-danger">Private</span>
                                        @elseif ($data->status == 'Public')
                                            <span class="right badge rounded-pill badge-success">Public</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/berita/{{ $data->slug }}" class="btn btn-success">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="/admin/berita/{{ $data->slug }}/edit" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/berita/{{ $data->slug }}" method="post" class="d-inline ">
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
            $('#tabel-berita').DataTable({
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
