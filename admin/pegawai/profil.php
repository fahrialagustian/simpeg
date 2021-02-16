<?php
include "../komponen/head.php";
?>
<?php
include "../komponen/menu.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT agama.id_agama, pegawai.nip,agama.agama,pegawai.nama_pegawai,pegawai.tmpt_lhr, pegawai.tgl_lhr,pegawai.alamat, pegawai.no_telpon, pegawai.email, pegawai.foto, golongan.id_golongan, golongan.golongan, jabatan.id_jabatan, jabatan.jabatan, akun.id_akun, akun.username from akun JOIN pegawai on akun.id_akun=pegawai.id_akun join agama on agama.id_agama=pegawai.id_agama join jabatan on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan where pegawai.nip='$id'") or die(mysqli_error($koneksi));
$dt = mysqli_fetch_array($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../file/<?php echo $dt['foto'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $dt['nama_pegawai'] ?></h3>

                            <p class="text-muted text-center"><?php echo $dt['nip'] ?></p>

                            <p class="text-muted text-center"><?php echo $dt['jabatan'] ?> / <?php echo $dt['golongan'] ?></p>

                            <a href="#" class="btn btn-primary btn-block"><b>Ubah</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Kontak</strong>

                            <p class="text-muted">
                                Nomor Telpon : <?php echo $dt['no_telpon'] ?>
                            </p>
                            <p class="text-muted">
                                Email : <?php echo $dt['email'] ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                            <p class="text-muted"><?php echo $dt['alamat'] ?></p>

                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <?php
                            if (isset($_GET['tab'])) {
                                $tab = $_GET['tab'];
                            } else {
                                $tab = 'biodata';
                            }
                            ?>
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'biodata' ? 'active' : null ?> " href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=biodata">Bio Data</a></li>

                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'pendidikan' ? 'active' : null ?>" href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=pendidikan">Pendidikan</a></li>

                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'pekerjaan' ? 'active' : null ?>" href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=pekerjaan">Pekerjaan</a></li>

                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'pelatihan' ? 'active' : null ?>" href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=pelatihan">Pelatihan</a></li>

                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'keluarga' ? 'active' : null ?>" href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=keluarga">Keluarga</a></li>

                                <li class="nav-item"><a class="nav-link <?php echo $tab == 'settings' ? 'active' : null ?>" href="profil.php?id=<?php echo str_replace(" ", "", $id) ?>&tab=settings">Setting</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="<?php echo $tab == 'biodata' ? 'active' : null ?> tab-pane" id="biodata">

                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?php echo $tab == 'pendidikan' ? 'active' : null ?> tab-pane" id="pendidikan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_pendidikan"><i class="fa fa-plus"></i> Pendidikan</button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="pendidikan1" class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tingakt</th>
                                                        <th>Nama Instansi/Nama Sekolah</th>
                                                        <th>Jurusan</th>
                                                        <th>Akreditasi</th>
                                                        <th>Nomor Ijazah</th>
                                                        <th>Tanggal Ijazah</th>
                                                        <th>File Ijazah</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nip = $_GET['id'];
                                                    $no = 1;
                                                    $sql1 = mysqli_query($koneksi, "SELECT riwayat_pendidikan.id_rp, riwayat_pendidikan.nama_sekolah,riwayat_pendidikan.jurusan, riwayat_pendidikan.akreditasi, riwayat_pendidikan.nomor_ijazah, riwayat_pendidikan.tgl_ijazah, riwayat_pendidikan.file_ijazah, tingkat.id_tingkat, tingkat.tingkat FROM tingkat join riwayat_pendidikan on tingkat.id_tingkat=riwayat_pendidikan.id_tingkat where riwayat_pendidikan.nip='$nip'") or die(mysqli_error($koneksi));
                                                    while ($data = mysqli_fetch_array($sql1)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $id ?></td>
                                                            <td><?php echo $data['tingkat'] ?></td>
                                                            <td><?php echo $data['nama_sekolah'] ?></td>
                                                            <td><?php echo $data['jurusan'] ?></td>
                                                            <td><?php echo $data['akreditasi'] ?></td>
                                                            <td><?php echo $data['nomor_ijazah'] ?></td>
                                                            <td><?php echo $data['tgl_ijazah'] ?></td>
                                                            <td><?php echo $data['file_ijazah'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="ubah_pendidikan.php?id=<?php echo $data['id_rp'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pendidikan.php?id=<?php echo $data['id_rp'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tingakt</th>
                                                        <th>Nama Instansi/Nama Sekolah</th>
                                                        <th>Jurusan</th>
                                                        <th>Akreditasi</th>
                                                        <th>Nomor Ijazah</th>
                                                        <th>Tanggal Ijazah</th>
                                                        <th>File Ijazah</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?php echo $tab == 'pekerjaan' ? 'active' : null ?> tab-pane" id="pekerjaan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_pekerjaan"><i class="fa fa-plus"></i> Pekerjaan</button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="pekerjaan1" class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Instansi</th>
                                                        <th>Jabatan</th>
                                                        <th>Tgl. Mulai</th>
                                                        <th>Tgl. Selesai</th>
                                                        <th>Nomor SK</th>
                                                        <th>Tgl. SK</th>
                                                        <th>File SK</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nip = $_GET['id'];
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM riwayat_pekerjaan where nip='$nip' order by tgl_mulai DESC") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['instansi'] ?></td>
                                                            <td><?php echo $dt['jabatan'] ?></td>
                                                            <td><?php echo $dt['tgl_mulai'] ?></td>
                                                            <td><?php echo $dt['tgl_selesai'] ?></td>
                                                            <td><?php echo $dt['nomor_sk'] ?></td>
                                                            <td><?php echo $dt['tgl_sk'] ?></td>
                                                            <td><?php echo $dt['file_sk'] ?></td>
                                                            <td>
                                                                <center>

                                                                    <a href="ubah_pekerjaan.php?id=<?php echo $dt['id_riwayat_pekerjaan'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pekerjaan.php?id=<?php echo $dt['id_riwayat_pekerjaan'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Instansi</th>
                                                        <th>Jabatan</th>
                                                        <th>Tgl. Mulai</th>
                                                        <th>Tgl. Selesai</th>
                                                        <th>Nomor SK</th>
                                                        <th>Tgl. SK</th>
                                                        <th>File SK</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?php echo $tab == 'pelatihan' ? 'active' : null ?> tab-pane" id="pelatihan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header"><button class="btn btn-primary" data-toggle="modal" data-target="#modal_pelatihan"><i class="fa fa-plus"></i> Pelatihan</button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pelatihan</th>
                                                        <th>Tgl. Mulai</th>
                                                        <th>Tgl. Selesai</th>
                                                        <th>Nomor Sertifikat</th>
                                                        <th>Penyelenggara</th>
                                                        <th>File Sertifikat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nip = $_GET['id'];
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pelatihan where nip='$nip' order by tgl_mulai DESC") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nama_pelatihan'] ?></td>
                                                            <td><?php echo $dt['tgl_mulai'] ?></td>
                                                            <td><?php echo $dt['tgl_selesai'] ?></td>
                                                            <td><?php echo $dt['no_sertifikat'] ?></td>
                                                            <td><?php echo $dt['penyelenggara'] ?></td>
                                                            <td><?php echo $dt['file_sertifikat'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="ubah_pelatihan.php?id=<?php echo $dt['id_pelatihan'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pelatihan.php?id=<?php echo $dt['id_pelatihan'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pelatihan</th>
                                                        <th>Tgl. Mulai</th>
                                                        <th>Tgl. Selesai</th>
                                                        <th>Nomor Sertifikat</th>
                                                        <th>Penyelenggara</th>
                                                        <th>File Sertifikat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="<?php echo $tab == 'keluarga' ? 'active' : null ?> tab-pane" id="keluarga">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_si"><i class="fa fa-plus"></i> Suami/Istri</button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="suami_istri" class="table table-bordered  table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM suami_istri where nip='$id' order by nama_si ASC") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nik_si'] ?></td>
                                                            <td><?php echo $dt['nama_si'] ?></td>
                                                            <td><?php echo $dt['tmpt_lhr_si'] ?>,<?php echo $dt['tgl_lhr_si'] ?></td>
                                                            <td><?php echo $dt['alamat_si'] ?></td>
                                                            <td><?php echo $dt['pekerjaan_si'] ?></td>
                                                            <td><?php echo $dt['status_hidup_si'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="ubah_si.php?id=<?php echo $dt['id_si'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_si.php?id=<?php echo $dt['id_si'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_anak"><i class="fa fa-plus"></i> Anak</button>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="anak" class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM anak where nip='$id' order by nama_anak ASC") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nik_anak'] ?></td>
                                                            <td><?php echo $dt['nama_anak'] ?></td>
                                                            <td><?php echo $dt['tmpt_lhr_anak'] ?>,<?php echo $dt['tgl_lhr_anak'] ?></td>
                                                            <td><?php echo $dt['alamat_anak'] ?></td>
                                                            <td><?php echo $dt['pekerjaan_anak'] ?></td>
                                                            <td><?php echo $dt['status_hidup_anak'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="ubah_anak.php?id=<?php echo $dt['id_anak'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_anak.php?id=<?php echo $dt['id_anak'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal_ortu"><i class="fa fa-plus"></i> Orang Tua Kandung</button>

                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="ortu" class="table table-bordered table-responsive table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM bapak_ibu where nip='$id' order by nama_bi ASC") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nik_bi'] ?></td>
                                                            <td><?php echo $dt['nama_bi'] ?></td>
                                                            <td><?php echo $dt['tmpt_lhr_bi'] ?>,<?php echo $dt['tgl_lhr_bi'] ?></td>
                                                            <td><?php echo $dt['alamat_bi'] ?></td>
                                                            <td><?php echo $dt['pekerjaan_bi'] ?></td>
                                                            <td><?php echo $dt['status_hidup_bi'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="ubah_ortu.php?id=<?php echo $dt['id_bi'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_ortu.php?id=<?php echo $dt['id_bi'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                                </center>

                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Alamat</th>
                                                        <th>Pekerjaan</th>
                                                        <th>Status Hidup</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="<?php echo $tab == 'settings' ? 'active' : null ?> tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Pendidikan -->
<div class="modal fade bd-example-modal-lg" id="modal_pendidikan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_pendidikan">RIWAYAT PENDIDIKAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_pendidikan.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Tingkat</label>
                        <select class="form-control select2" name="id_tingkat" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Tingkat--</option>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM tingkat order by tingkat ASC") or die(mysqli_error($koneksi));
                            while ($tingkat = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $tingkat['id_tingkat'] ?>"><?php echo $tingkat['tingkat'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_sekolah" class="col-form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nama_sekolah">
                    </div>
                    <div class="form-group">
                        <label for="jurusan" class="col-form-label">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan" id="jurusan">
                        <small class="badge badge-danger">* Isi dengan - jika tidak ada jurusan</small>
                    </div>
                    <div class="form-group">
                        <label for="akreditasi" class="col-form-label">Akreditasi</label>
                        <input type="text" class="form-control" name="akreditasi" id="akreditasi">
                        <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small>
                    </div>
                    <div class="form-group">
                        <label for="no_ijazah" class="col-form-label">Nomor Ijazah</label>
                        <input type="text" class="form-control" name="no_ijazah" id="no_ijazah">
                    </div>
                    <div class="form-group">
                        <label for="tgl_ijazah" class="col-form-label">Tanggal Ijazah</label>
                        <input type="date" class="form-control" name="tgl_ijazah" id="tgl_ijazah">
                    </div>
                    <div class="form-group">
                        <label for="file_ijazah" class="col-form-label">File Ijazah</label>
                        <input type="file" accept="application/pdf" class="form-control" name="file_ijazah" id="file_ijazah">
                        <small class="badge badge-danger">* Format file .pdf</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Pekerjaan -->
<div class="modal fade bd-example-modal-lg" id="modal_pekerjaan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_pendidikan">RIWAYAT PEKERJAAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_pekerjaan.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_instansi" class="col-form-label">Nama Instansi</label>
                        <input type="text" required class="form-control" name="nama_instansi" id="nama_instansi">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nama_sekolah">
                    </div>
                    <div class="form-group">
                        <label for="jabatan" class="col-form-label">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan">
                        <small class="badge badge-danger">* Isi dengan - jika tidak ada Jabatan</small>
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai" class="col-form-label">Tgl. Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai" class="col-form-label">Tgl. Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai">
                    </div>
                    <div class="form-group">
                        <label for="no_sk" class="col-form-label">Nomor SK</label>
                        <input type="text" class="form-control" name="no_sk" id="no_sk">

                    </div>
                    <div class="form-group">
                        <label for="tgl_sk" class="col-form-label">Tgl. SK</label>
                        <input type="date" class="form-control" name="tgl_sk" id="tgl_sk">
                    </div>
                    <div class="form-group">
                        <label for="file_sk" class="col-form-label">File SK</label>
                        <input type="file" accept="application/pdf" class="form-control" name="file_sk" id="file_sk">
                        <small class="badge badge-danger">* Format file .pdf</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Pelatihan -->
<div class="modal fade bd-example-modal-lg" id="modal_pelatihan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_pendidikan">RIWAYAT PELATIHAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_pelatihan.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_pelatihan" class="col-form-label">Nama Pelatihan</label>
                        <input type="text" required class="form-control" name="nama_pelatihan" id="nama_pelatihan">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="tgl_mulai" class="col-form-label">Tgl. Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai" class="col-form-label">Tgl. Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai">
                    </div>
                    <div class="form-group">
                        <label for="no_sertifikat" class="col-form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat">

                    </div>
                    <div class="form-group">
                        <label for="penyelenggara" class="col-form-label">Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" id="penyelenggara">
                    </div>
                    <div class="form-group">
                        <label for="file_sertifikat" class="col-form-label">File Sertifikat</label>
                        <input type="file" accept="application/pdf" class="form-control" name="file_sertifikat" id="file_sertifikat">
                        <small class="badge badge-danger">* Format file .pdf</small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Keluarga -->
<div class="modal fade bd-example-modal-lg" id="modal_si" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_pendidikan">DATA SUAMI/ISTRI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_si.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_si" class="col-form-label">Nama Sumai/Istri</label>
                        <input type="text" required class="form-control" name="nama_si" id="nama_si">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tmpt_lhr" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmpt_lhr" id="tmpt_lhr">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-form-label">Tgl. Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">

                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" name="status" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Status--</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Anak -->
<div class="modal fade bd-example-modal-lg" id="modal_anak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_pendidikan">DATA ANAK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_anak.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_anak" class="col-form-label">Nama Anak</label>
                        <input type="text" required class="form-control" name="nama_anak" id="nama_anak">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tmpt_lhr" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmpt_lhr" id="tmpt_lhr">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-form-label">Tgl. Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">

                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                        <small class="badge badge-danger">* Isi dengan - jika anak belum bekerja</small>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" name="status" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Status--</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal Ortu -->
<div class="modal fade bd-example-modal-lg" id="modal_ortu" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" style="text-align: center;" id="modal_ortu">DATA ANAK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="proses_tambah_ortu.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_bi" class="col-form-label">Nama Orang Tua</label>
                        <input type="text" required class="form-control" name="nama_bi" id="nama_bi">

                        <input type="hidden" class="form-control" name="nip" value="<?php echo $id ?>" id="nip">
                    </div>
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tmpt_lhr" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tmpt_lhr" id="tmpt_lhr">
                        <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-form-label">Tgl. Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">

                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                        <small class="badge badge-danger">* Isi dengan - jika orang tua tidak berkeja</small>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control select2" name="status" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Status--</option>
                            <option value="Hidup">Hidup</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>
        </div>
    </div>
</div>

<?php
include "../komponen/footer.php";
?>