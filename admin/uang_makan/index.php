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
                    <h1>Data Uang Makan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Uang Makan</li>
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
                        <h3 class="card-title">Data Uang Makan Bulan <?php echo date('F Y') ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <select class="form-control select2" name="nip" style="width: 100%;">
                                        <option selected="selected" disabled>--Pilih Bulan--</option>
                                        <?php
                                        $sql = mysqli_query($koneksi, "SELECT MONTH(tgl_absen) as bulan from absen GROUP by MONTH(tgl_absen) ASC") or die(mysqli_error($koneksi));
                                        while ($bulan = mysqli_fetch_array($sql)) {
                                        ?>
                                            <option value="<?php echo $bulan['bulan'] ?>"> <?php echo date('F',strtotime($bulan['bulan'])) ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="form-control select2" name="nip" style="width: 100%;">
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
                            <div class="col-5">
                                <button class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                <button class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jumlah Kehadiran</th>
                                    <th>Uang Makan / Hari</th>
                                    <th>Jumlah</th>
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
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jumlah Kehadiran</th>
                                    <th>Uang Makan / Hari</th>
                                    <th>Jumlah</th>
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