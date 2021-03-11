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
                        <h3 class="card-title">Data Uang Makan</h3>
                        <br>
                        <a href="uang_makan_pegawai.php"><button class="btn btn-info"><i class="fa fa-file"></i> Uang Makan Pegawai</button></a>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-3">
                                <form method="GET" action="">
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
                            </div>
                            <div class="col-2">
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
                            <div class="col-5">
                                <button name="filter" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                <button name="cetak" class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
                            </div>
                            </form>
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
                                    <th>Priode</th>
                                    <th>Uang Makan / Hari</th>
                                    <th>Jumlah Uang Makan</th>
                                    <th>Pajak</th>
                                    <th>Jumlah Pajak</th>
                                    <th>Total Uang Makan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['cetak'])) {
                                    header('Location: mypage.php');
                                    die();
                                }
                                $no = 1;

                                $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, golongan.golongan,golongan.uang_makan,golongan.pajak from golongan join pegawai on golongan.id_golongan=pegawai.id_golongan  where pegawai.nip='" . $_SESSION['nip'] . "' ORDER BY pegawai.nama_pegawai ASC") or die(mysqli_error($koneksi));

                                while ($dt = mysqli_fetch_array($sql)) {
                                    $nip = $dt['nip'];
                                    if (isset($_GET['filter'])) {
                                        $y = $_GET['tahun'];
                                        $m = $_GET['bulan'];
                                        $query = mysqli_query($koneksi, "SELECT * from absen where nip='$nip' AND MONTH(tgl_absen)='$m' and Year(tgl_absen)='$y' and id_ketengan_absen='1' ");
                                    } else {
                                        $y = date('Y');
                                        $m = date('m');
                                        $query = mysqli_query($koneksi, "SELECT * from absen where nip='$nip' AND MONTH(tgl_absen)='$m' and Year(tgl_absen)='$y' and id_ketengan_absen='1' ");
                                    }


                                    $jum = mysqli_num_rows($query);
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?><br><small>NIP. <?php echo $dt['nip'] ?></small></td>
                                        <td style="text-align: center;"><?php echo $jum ?></td>
                                        <td><?php echo $y ?>-<?php echo $m ?></td>
                                        <td style="text-align: right;">Rp. <?php echo number_format($dt['uang_makan'], 0, ",", ".") ?></td>
                                        <td style="text-align: right;">Rp. <?php echo number_format($uang_makan = $jum * $dt['uang_makan'], 0, ",", ".") ?></td>
                                        <td style="text-align: center;"><?php echo $dt['pajak'] * 100 ?> %</td>
                                        <td style="text-align: right;">Rp. <?php echo number_format($pajak = $uang_makan * $dt['pajak'], 0, ",", ".") ?></td>
                                        <td style="text-align: right;">Rp. <?php echo number_format($uang_makan - $pajak, 0, ",", ".") ?></td>
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
                                    <th>Priode</th>
                                    <th>Uang Makan / Hari</th>
                                    <th>Jumlah Uang Makan</th>
                                    <th>Pajak</th>
                                    <th>Jumlah Pajak</th>
                                    <th>Total Uang Makan</th>
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


// 
include "../komponen/footer.php";
?>