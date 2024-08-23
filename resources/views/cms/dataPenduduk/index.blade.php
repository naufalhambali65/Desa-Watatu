@extends('cms.layouts.main')
@section('container')
    @if ($datas->count() > 0)
        <div class="row">
            <div class="col-md-6">
                <div class="card card-success px-0">
                    <div class="card-header">
                        <h3 class="card-title">Agama Penduduk Desa Watatu</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="agamaChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-danger px-0">
                    <div class="card-header">
                        <h3 class="card-title">Usia Penduduk Desa</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="usiaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info px-0">
                    <div class="card-header">
                        <h3 class="card-title">Data Penduduk Desa Watatu Tiap Dusun</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="dusunChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <form action="/admin/importData" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="excel" class="form-label">Import Data Dari Excel</label>
                    <input class="form-control" type="file" id="excel" name="excel" accept=".xls, .xlsx">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Import</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kependudukan Desa Watatu</h3>
                    <div class="card-tools">
                        <a href="/admin/dataPenduduk/create" class="btn btn-xs btn-primary"><i
                                class="fas fa-plus-circle"></i>
                            Tambah Data</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tabel_penduduk" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nomor KK</th>
                                <th>Nama Penduduk</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Perkawinan</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Usia</th>
                                <th>Agama</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Pekerjaan</th>
                                <th>Kewarganegaraan</th>
                                <th>Alamat Tinggal</th>
                                <th>Alamat KTP</th>
                                <th>Status Hubungan Keluarga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $data->nik }}
                                    </td>
                                    <td>
                                        {{ $data->no_kk }}
                                    </td>
                                    <td>
                                        {{ $data->nama }}
                                    </td>
                                    <td>
                                        {{ $data->jenis_kelamin }}
                                    </td>
                                    <td>
                                        {{ $data->status_perkawinan }}
                                    </td>
                                    <td>
                                        {{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}
                                    </td>
                                    <td>
                                        {{ $data->usia }}
                                    </td>
                                    <td>
                                        {{ $data->agama }}
                                    </td>
                                    <td>
                                        {{ $data->pendidikan_terakhir }}
                                    </td>
                                    <td>
                                        {{ $data->pekerjaan }}
                                    </td>
                                    <td>
                                        {{ $data->kewarganegaraan }}
                                    </td>
                                    <td>
                                        {{ $data->alamat_sekarang }}
                                    </td>
                                    <td>
                                        {{ $data->alamat_ktp }}
                                    </td>
                                    <td>
                                        {{ $data->status_hubungan_keluarga }}
                                    </td>
                                    <td>
                                        <a href="/admin/dataPenduduk/{{ $data->id }}/edit" class="btn btn-primary">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/dataPenduduk/{{ $data->id }}" method="post"
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
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var dataDusun = {
            labels: ['Dusun I', 'Dusun II', 'Dusun III', 'Dusun IV', 'Dusun V'],
            datasets: [{
                    label: 'Data Alamat Tinggal Saat Ini',
                    backgroundColor: 'rgba(75,192,192,1)',
                    borderColor: 'rgba(75,192,192,1)',
                    pointRadius: false,
                    pointColor: '#4bc0c0',
                    pointStrokeColor: 'rgba(75,192,192,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(75,192,192,1)',
                    data: [
                        {{ $dataDusun[0][0] }},
                        {{ $dataDusun[0][1] }},
                        {{ $dataDusun[0][2] }},
                        {{ $dataDusun[0][3] }},
                        {{ $dataDusun[0][4] }},
                    ]
                },
                {
                    label: 'Data Alamat KTP',
                    backgroundColor: 'rgba(255,99,132,1)',
                    borderColor: 'rgba(255,99,132,1)',
                    pointRadius: false,
                    pointColor: '#ff6384',
                    pointStrokeColor: 'rgba(255,99,132,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255,99,132,1)',
                    data: [
                        {{ $dataDusun[1][0] }},
                        {{ $dataDusun[1][1] }},
                        {{ $dataDusun[1][2] }},
                        {{ $dataDusun[1][3] }},
                        {{ $dataDusun[1][4] }},
                    ]
                },
            ]
        };

        var DataUsia = {
            labels: ['0-3 Tahun', '4-5 Tahun', '6-17 Tahun', '18-64 Tahun', '65> Tahun'],
            datasets: [{
                data: [{{ $dataUsia[0] }}, {{ $dataUsia[1] }}, {{ $dataUsia[2] }}, {{ $dataUsia[3] }},
                    {{ $dataUsia[4] }},
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var DataAgama = {
            labels: ['Islam', 'Kristen', 'Katholik', 'Buddha', 'Konghucu'],
            datasets: [{
                data: [{{ $dataAgama[0] }}, {{ $dataAgama[1] }}, {{ $dataAgama[2] }}, {{ $dataAgama[3] }},
                    {{ $dataAgama[4] }},
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }

        //-------------
        //- BAR CHART -
        //-------------
        var dusunChartCanvas = $('#dusunChart').get(0).getContext('2d')

        var dusunChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(dusunChartCanvas, {
            type: 'bar',
            data: dataDusun,
            options: dusunChartOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        var usiaChartCanvas = $('#usiaChart').get(0).getContext('2d')
        var agamaChartCanvas = $('#agamaChart').get(0).getContext('2d')
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        new Chart(usiaChartCanvas, {
            type: 'pie',
            data: DataUsia,
            options: pieOptions
        })
        new Chart(agamaChartCanvas, {
            type: 'pie',
            data: DataAgama,
            options: pieOptions
        })

        $(function() {
            $("#tabel_penduduk").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }, "colvis"
                ],
                "columnDefs": [{
                    "targets": [
                        4, 5, 7, 9, 11, 13, 14
                    ],
                    "visible": false
                }]
            }).buttons().container().appendTo('#tabel_penduduk_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
