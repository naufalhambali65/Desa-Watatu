<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Watatu | Dashboard</title>

    <!-- Favicons -->
    <link href="/landing_assets/assets/img/logo/logo.png" rel="icon" />
    <link href="/landing_assets/assets/img/logo/logo.png" rel="apple-touch-icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/cms_assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/cms_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/cms_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/cms_assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/cms_assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/cms_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/cms_assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/cms_assets/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/cms_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="/cms_assets/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/cms_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/cms_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/cms_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Boostrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/landing_assets/assets/img/logo/logo.png" alt="Desa Watatu"
                height="60" width="60">
        </div>

        @include('cms.layouts.navbar')

        @include('cms.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @include('cms.layouts.header')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('container')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        @include('cms.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/cms_assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/cms_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/cms_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/cms_assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/cms_assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/cms_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/cms_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/cms_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/cms_assets/plugins/moment/moment.min.js"></script>
    <script src="/cms_assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/cms_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/cms_assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/cms_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- jQuery -->
    <script src="/cms_assets/plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/cms_assets/dist/js/adminlte.js"></script>
    <!-- SweetAlert2 -->
    <script src="/cms_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="/cms_assets/plugins/toastr/toastr.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/cms_assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/cms_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/cms_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/cms_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/cms_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/cms_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/cms_assets/plugins/jszip/jszip.min.js"></script>
    <script src="/cms_assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/cms_assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/cms_assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/cms_assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/cms_assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        @if (session()->has('success'))
            $(document).ready(function() {
                toastr.success('{{ session('success') }}')
            });
        @elseif (session()->has('error'))
            $(document).ready(function() {
                toastr.error('{{ session('error') }}')
            });
        @endif
    </script>

    @yield('js')

</body>

</html>
