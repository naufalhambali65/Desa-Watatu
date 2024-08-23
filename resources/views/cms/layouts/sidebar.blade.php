<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link" style="text-decoration: none;">
        <img src="/landing_assets/assets/img/logo/logo.png" alt="Desa Watatu" class="brand-image" style="opacity: 1">
        <span class="brand-text font-weight-light">Desa Watatu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Data Penduduk</li>
                <li class="nav-item">
                    <a href="/admin/dataPenduduk"
                        class="nav-link {{ Request::is('admin/dataPenduduk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>
                            Data Kependudukan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/perangkatDesa"
                        class="nav-link {{ Request::is('admin/perangkatDesa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Perangkat Desa
                        </p>
                    </a>
                </li>
                <li class="nav-header">Informasi Publik</li>
                <li class="nav-item">
                    <a href="/admin/berita" class="nav-link {{ Request::is('admin/berita*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita Desa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/katalog" class="nav-link {{ Request::is('admin/katalog*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Katalog UMKM
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/galeri" class="nav-link {{ Request::is('admin/galeri*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Galeri Desa
                        </p>
                    </a>
                </li>
                <li class="nav-header">Pengaturan Akun</li>
                <li class="nav-item">
                    <a href="/admin/changePass" class="nav-link {{ Request::is('admin/changePass*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
