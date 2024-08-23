@extends('cms.layouts.main')
@section('container')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Katalog UMKM</h3>
                    <div class="card-tools">
                        <a href="/admin/katalog/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah Katalog</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel-katalog" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama UMKM</th>
                                <th>Kategori</th>
                                <th>Pemilik UMKM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_umkm }}</td>
                                    <td>{{ $data->kategori }}</td>
                                    <td>{{ $data->pemilik }}</td>
                                    <td>
                                        <a href="/admin/katalog/{{ $data->id }}" class="btn btn-success">
                                            <i class="fas fa-eye"></i></a>
                                        <a href="/admin/katalog/{{ $data->id }}/edit" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/katalog/{{ $data->id }}" method="post" class="d-inline ">
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
            $('#tabel-katalog').DataTable({
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
