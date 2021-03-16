<?php
if (isset($_GET['cetak'])) {
    include '../../config.php';
    include '../../tgl_helper.php';
    $query = mysqli_query($koneksi, "SELECT * FROM pegawai where id_jabatan='3'") or die(mysqli_error($koneksi));
    $kepala = mysqli_fetch_array($query);

    $data = '';
    $no = 1;
    if ($_GET['tahun'] == '' and $_GET['bulan'] == '' and $_GET['status']=='') {
        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
    } else if ($_GET['tahun'] != '' and $_GET['status'] !='') {
        $y = $_GET['tahun'];
        $status = $_GET['status'];
        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));

    } else if ($_GET['bulan'] != '' and $_GET['status']!='') {
        $m = $_GET['bulan'];
        $status = $_GET['status'];

        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and MONTH(izin.tgl_buat)='$m' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
    } else if (
        $_GET['bulan'] != '' and $_GET['tahun'] != ''
    ) {
        $m = $_GET['bulan'];
        $y = $_GET['tahun'];

        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where MONTH(izin.tgl_buat)='$m' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
    }  else {
        $y = $_GET['tahun'];
        $m = $_GET['bulan'];
        $status = $_GET['status'];
        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and MONTH(izin.tgl_buat)='$m' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
    }
    // 
    while ($dt = mysqli_fetch_array($sql)) {

        $jum = mysqli_num_rows($query);
        $data .= '<tr><td>' . $no . '</td><td>' . $dt['nama_pegawai'] . '<br><small>NIP.' . $dt['nip'] . '</small><td style="text-align: left;"> ' . tgl_indo($dt['tgl_buat']) . '</td><td style="text-align: left;"> ' . $dt['alasan'] . '</td><td>' . tgl_indo($dt['tgl_awal']) . '</td><td>' . tgl_indo($dt['tgl_akhir']) . '</td><td style="text-align: left;"> ' . $dt['status'] . '</td>  </tr>';
        $no++;
    }


    include '../../vendor/autoload.php';
    $html = '
<table>
    <tr>
        <td><img style="width:15%" src="logo.jpg"></td>
        <td style="text-align:center; width:570px">
            <h4>KEMENTERIAN AGAMA RI</h4>
            <h4>KANTOR KEMENTERIAN AGAMA KAB. TANAH LAUT</h4>
            <h5>MADRASAH TSANAWIYAH NEGERI 4 TANAH LAUT</h5>
            <p>Jl. Pengeran Antasari Telp. (5012) 21695 Pelaihari</p>
            <p>Kab. Tanah Laut</p>
            <p>Email : mtsn4pelaihari@gmail.com</p>
        
        </td>
    </tr>
</table>
<hr size="100px" width="500px">


<h3 style="text-align:center;">Data Rekap Izin</h3>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg" width="100%">
<thead>
  <tr>
    <th class="tg-baqh">No</th>
    <th class="tg-baqh">Nama</th>
    <th class="tg-baqh">Tgl. Buat</th>
    <th class="tg-baqh">Alasan</th>
    <th class="tg-baqh">Tgl. Awal</th>
    <th class="tg-baqh">Tgl. Akhir</th>
    <th class="tg-baqh">Status</th>
  </tr>
</thead>
<tbody>
' . $data . '
</tbody>
</table>
<br>
<br><br>
<table >
    <tr>
        <td style="text-align:center; width:90%"></td>
        <td style="text-align:center; width:50%">
            <p>Pelaihari,' . tgl_indo(date('Y-m-d')) . '</p>
            <p>Kepala Sekolah</p>
            <p>MTsN 4 TANAH LAUT</p>
            <br>
            <br>
            <br>
            <p>' . $kepala['nama_pegawai'] . '</p>
            <p>NIP. ' . $kepala['nip'] . '</p>
        
        </td>
    </tr>
</table>

';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}
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
                    <h1>Data Izin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Izin</li>
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
                        <div class="card-body">
                            <div class="row">

                                <div class="col-3">
                                    <form method="GET" action="">
                                        <div class="form-group">
                                            <select class="form-control select2" name="bulan" style="width: 100%;">
                                                <option selected="selected" value="">--Pilih Bulan--</option>
                                                <?php
                                                $sql = mysqli_query($koneksi, "SELECT MONTH(tgl_buat) as bulan from izin GROUP by MONTH(tgl_buat) ASC") or die(mysqli_error($koneksi));
                                                while ($bulan = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?php echo $bulan['bulan'] ?>"> <?php echo getBulan($bulan['bulan']) ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select class="form-control select2" name="tahun" style="width: 100%;">
                                            <option selected="selected" value="">--Pilih Tahun--</option>
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT Year(tgl_buat) as tahun from izin GROUP by Year(tgl_buat) ASC") or die(mysqli_error($koneksi));
                                            while ($tahun = mysqli_fetch_array($sql)) {
                                            ?>
                                                <option value="<?php echo $tahun['tahun'] ?>"> <?php echo $tahun['tahun'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option selected="selected" value="">--Pilih Status--</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Acc">Acc</option>
                                            <option value="Tolak">Tolak</option>
                                            <option value="">Semua</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button name="filter" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>

                                    <button name="cetak" class="btn btn-default"><i class="fa fa-print"></i> Cetak</button>
                                    <a href="tambah_izin.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Izin</button></a>
                                </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered  table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if (isset($_GET['filter'])) {
                                        $status = $_GET['status'];
                                        if ($_GET['tahun'] == '' and $_GET['bulan'] == '' and $_GET['status'] == '') {
                                            $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                        } else if ($_GET['tahun'] != '' and $_GET['status'] != '') {
                                            $y = $_GET['tahun'];
                                            $status = $_GET['status'];
                                            $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                        } else if ($_GET['bulan'] != '' and $_GET['status'] != ''
                                        ) {
                                            $m = $_GET['bulan'];
                                            $status = $_GET['status'];

                                            $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and MONTH(izin.tgl_buat)='$m' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                        } else if (
                                            $_GET['bulan'] != '' and $_GET['tahun'] != ''
                                        ) {
                                            $m = $_GET['bulan'];
                                            $y = $_GET['tahun'];

                                            $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where MONTH(izin.tgl_buat)='$m' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                        } else {
                                            $y = $_GET['tahun'];
                                            $m = $_GET['bulan'];
                                            $status = $_GET['status'];
                                            $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.status='$status' and MONTH(izin.tgl_buat)='$m' and Year(izin.tgl_buat)='$y' ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                        }
                                    } else {
                                        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));
                                    }


                                    while ($dt = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $dt['nama_pegawai'] ?><br><small>NIP. <?php echo $dt['nip'] ?></small></td>
                                            <td><?php echo tgl_indo($dt['tgl_awal']) ?></td>
                                            <td><?php echo tgl_indo($dt['tgl_akhir']) ?></td>
                                            <td><?php echo $dt['alasan'] ?></td>
                                            <td><?php echo $dt['status'] ?></td>
                                            <td><?php echo $dt['keterangan'] ?></td>
                                            <td>
                                                <?php if ($dt['status'] == 'Proses' or $dt['status'] == 'Tolak') :  ?>
                                                    <center>
                                                        <a href="ubah_izin.php?id=<?php echo $dt['id_izin'] ?>"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Ubah</button></a>

                                                        <a onclick="return konfirmasi();" href="hapus_izin.php?id=<?php echo $dt['id_izin'] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                    </center>
                                                <?php endif; ?>

                                                <?php if ($dt['status'] == 'Acc') :  ?>
                                                    <center>
                                                        <a target="_blank" href="cetak_izin.php?id=<?php echo $dt['id_izin'] ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</button></a>
                                                    </center>
                                                <?php endif; ?>
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
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Alasan</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
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

// 
include "../komponen/footer.php";
?>