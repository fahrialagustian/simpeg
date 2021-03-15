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
                        <a href="absen_pegawai.php"><button class="btn btn-info"><i class="fa fa-file"></i> Absen Pegawai</button></a>
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
                                $sql = mysqli_query($koneksi, "SELECT absen.id_absen,absen.nip,absen.tgl_absen,absen.jam_masuk,absen.jam_pulang,keterangan_absen.id_keterangan_absen,keterangan_absen.keterangan_absen,absen.keterangan,pegawai.nama_pegawai from pegawai join absen on pegawai.nip=absen.nip join keterangan_absen on keterangan_absen.id_keterangan_absen=absen.id_ketengan_absen where pegawai.nip='" . $_SESSION['nip'] . "' order by absen.tgl_absen DESC") or die(mysqli_error($koneksi));
                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?></td>
                                        <td><?php echo tgl_indo($dt['tgl_absen']) ?></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Absen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="Post" action="cetak_absen.php">
                    <div class="form-group">
                        <select class="form-control select2" name="bulan" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Bulan--</option>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT MONTH(tgl_absen) as bulan from absen GROUP by MONTH(tgl_absen) ASC") or die(mysqli_error($koneksi));
                            while ($bulan = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $bulan['bulan'] ?>"> <?php echo $bulan['bulan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control select2" name="tahun" style="width: 100%;">
                            <option selected="selected" disabled>--Pilih Tahun--</option>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT Year(tgl_absen) as tahun from absen GROUP by Year(tgl_absen) ASC") or die(mysqli_error($koneksi));
                            while ($tahun = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $tahun['tahun'] ?>"> <?php echo $tahun['tahun'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
            </div>

            </form>
        </div>
    </div>
</div>
<?php
include "../komponen/footer.php";
?>