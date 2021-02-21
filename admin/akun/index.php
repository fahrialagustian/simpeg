<?php
include "../komponen/head.php";
?>
<?php
include "../komponen/menu.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Akun</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $sql = mysqli_query($koneksi, "SELECT akun.id_akun,pegawai.nip,pegawai.nama_pegawai,akun.username,akun.password,akun.status FROM akun JOIN pegawai on akun.id_akun=pegawai.id_akun ORDER BY pegawai.nama_pegawai ASC") or die(mysqli_error($koneksi));

                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>
                                            <?php echo $dt['nama_pegawai'] ?><br>
                                            <small><?php echo $dt['nip'] ?></small>
                                        </td>
                                        <td><?php echo $dt['username'] ?></td>
                                        <td><?php echo $dt['password'] ?></td>
                                        <td><?php echo $dt['status'] ?></td>
                                        <td>
                                            <center>
                                                <a href="ubah_akun.php?id=<?php echo $dt['id_akun'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>
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
                                    <th>Nama Pegawai</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
if (isset($_GET['cetak'])) {
    include "cetak_uang_makan.php";
}
// 
include "../komponen/footer.php";
?>