<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../../file/logo/Kemenag-Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMPEG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../file/logo/Kemenag-Logo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['nama_pengguna'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="../komponen/index.php" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../jabatan/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../golongan/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Golongan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../agama/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Agama</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../tingkat/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Tingkat</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../pegawai/index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../absen/index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../izin/cetak_izin.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Izin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../uang_makan/index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Uang Makan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            KGB
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../akun/index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Akun
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>