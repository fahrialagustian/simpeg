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
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bio Data</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pekerjaan" data-toggle="tab">Pekerjaan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">Keluarga</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Setting</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pendidikan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Pendidikan</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="pendidikan1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pekerjaan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Pekerjaan</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="pekerjaan1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="pelatihan">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Pelatihan</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="keluarga">
                                    <!-- The timeline -->
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Suami/Istri</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="suami_istri" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Anak</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="anak" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <a href="tambah_pegawai.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Orang Tua Kandung</button></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="ortu" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai") or die(mysqli_error($koneksi));
                                                    while ($dt = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt['nip'] ?></td>
                                                            <td><?php echo $dt['nama_pegawai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="profil.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button></a>

                                                                    <a href="ubah_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                                    <a onclick="return konfirmasi();" href="hapus_pegawai.php?id=<?php echo $dt['nip'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                                        <th>NIP</th>
                                                        <th>Nama Pegawai</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
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
<?php
include "../komponen/footer.php";
?>