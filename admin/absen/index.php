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
                    <h1>Data Absen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Absen</li>
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
                        <a href="tambah_absen.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Absen</button></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT absen.id_absen,absen.nip,absen.tgl_absen,absen.jam_masuk,absen.jam_pulang,keterangan_absen.id_keterangan_absen,keterangan_absen.keterangan_absen,absen.keterangan,pegawai.nama_pegawai from pegawai join absen on pegawai.nip=absen.nip join keterangan_absen on keterangan_absen.id_keterangan_absen=absen.id_ketengan_absen order by absen.tgl_absen DESC") or die(mysqli_error($koneksi));
                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?></td>
                                        <td><?php echo $dt['tgl_absen'] ?></td>
                                        <td><?php echo $dt['jam_masuk'] ?></td>
                                        <td><?php echo $dt['jam_pulang'] ?></td>
                                        <td><?php echo $dt['keterangan'] ?></td>
                                        <td><?php echo $dt['keterangan_absen'] ?></td>
                                        <td>
                                            <center>
                                                <a href="ubah_absen.php?id=<?php echo $dt['id_absen'] ?>"><button class="btn btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                <a onclick="return konfirmasi();" href="hapus_absen.php?id=<?php echo $dt['id_absen'] ?>"><button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Keterangan</th>
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
include "../komponen/footer.php";
?>