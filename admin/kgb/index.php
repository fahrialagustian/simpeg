<?php
if (isset($_GET['cetak'])) {
    include '../../config.php';
    include '../../tgl_helper.php';
    $query = mysqli_query($koneksi, "SELECT * FROM pegawai where id_jabatan='3'") or die(mysqli_error($koneksi));
    $kepala = mysqli_fetch_array($query);

    $data ='';
    $no = 1; 
    $y = $_GET['tahun'];
    $m = $_GET['bulan'];
    if(!isset($_GET['tahun']) and !isset($_GET['bulan'])){
        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
    }
    else if($_GET['tahun'] !=''){
        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where  YEAR(kgb.tgl_baru)='$y' order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
    }else if($_GET['bulan'] != ''){
        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where MONTH(kgb.tgl_baru)='$m'  order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
    }else{
        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where MONTH(kgb.tgl_baru)='$m' and YEAR(kgb.tgl_baru)='$y' order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
    }
    // 
    while ($dt = mysqli_fetch_array($sql)) {
        
            $jum = mysqli_num_rows($query);
            $data .='<tr><td>'.$no .'</td><td>'.$dt['nama_pegawai'].'<br><small>NIP.'.$dt['nip'] .'</small></td><td style="text-align: left;">'. $dt['nomor'].'</td><td style="text-align: left;"> '.tgl_indo($dt['tgl_baru']).'</td><td style="text-align: left;"> '.tgl_indo($dt['mulai_berlaku']).'</td><td style="text-align: right;"> '.number_format($dt['gaji_baru'], 0, ",", ".").'</td><td>'.tgl_indo($dt['kenaikan_gaji']).'</td>  </tr>';
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


<h3 style="margin-left:30%">Data Rekap Kenaikan Gaji Berkala</h3>

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
    <th class="tg-baqh">Nomor</th>
    <th class="tg-baqh">Tanggal</th>
    <th class="tg-baqh">TMT</th>
    <th class="tg-baqh">Gaji Pokok</th>
    <th class="tg-baqh">Kenaikan Gaji <br> Berikutnya</th>
  </tr>
</thead>
<tbody>
'.$data. '
</tbody>
</table>
<br>
<br><br>
<table >
    <tr>
        <td style="text-align:center; width:90%"></td>
        <td style="text-align:center; width:50%">
            <p>Pelaihari,'.tgl_indo(date('Y-m-d')). '</p>
            <p>Kepala Sekolah</p>
            <p>MTsN 4 TANAH LAUT</p>
            <br>
            <br>
            <br>
            <p>'.$kepala['nama_pegawai'].'</p>
            <p>NIP. '. $kepala['nip'].'</p>
        
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
                    <h1>Data KGB</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data KGB</li>
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
                    <div class="row">

                            <div class="col-3">
                                <form method="GET" action="">
                                    <div class="form-group">
                                        <select class="form-control select2"  name="bulan" style="width: 100%;">
                                            <option selected="selected" disabled>--Pilih Bulan--</option>
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT MONTH(tgl_baru) as bulan from kgb GROUP by MONTH(tgl_baru) ASC") or die(mysqli_error($koneksi));
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
                                        <option selected="selected" disabled>--Pilih Tahun--</option>
                                        <?php
                                        $sql = mysqli_query($koneksi, "SELECT Year(tgl_baru) as tahun from kgb GROUP by Year(tgl_baru) ASC") or die(mysqli_error($koneksi));
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
                                <button name="filter" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>

                                <button name="cetak" class="btn btn-default"><i class="fa fa-print"></i> Cetak</button>

                                <a href="tambah_kgb.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> KGB</button></a>

                                <a href="rekomendasi.php"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Rekomendasi</button></a>
                            </div>
                            </form>
                        </div>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example1" class="table table-bordered   table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>TMT</th>
                                    <th>Gaji Pokok</th>
                                    <th>Kenaikan Gaji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                if(isset($_GET['filter'])){
                                    
                                    if(!isset($_GET['tahun']) and !isset($_GET['bulan'])){
                                        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                    }
                                    else if(isset($_GET['tahun']) !=''){
                                        $y = $_GET['tahun'];
                                        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where  YEAR(kgb.tgl_baru)='$y' order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                    }else if($_GET['bulan'] != ''){
                                        $m = $_GET['bulan'];
                                        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where MONTH(kgb.tgl_baru)='$m'  order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                    }else{
                                        $y = $_GET['tahun'];
                                    $m = $_GET['bulan'];
                                        $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where MONTH(kgb.tgl_baru)='$m' and YEAR(kgb.tgl_baru)='$y' order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                    }
                                    
                                }else{
                                    $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                }
                                
                                while ($dt = mysqli_fetch_array($sql)) {
                                    
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?><br><small><?php echo $dt['nip'] ?></small></td>
                                        <td><?php echo $dt['nomor'] ?></td>
                                        <td><?php echo tgl_indo($dt['tgl_baru']) ?></td>
                                        <td><?php echo tgl_indo($dt['mulai_berlaku']) ?></td>
                                        <td><?php echo number_format($dt['gaji_baru'],0,",",".") ?></td>
                                        <td><?php echo tgl_indo($dt['kenaikan_gaji']) ?></td>
                                        <td>
                                            <center>

                                                <a href="cetak_kgb.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button></a>

                                                <a href="ubah_kgb.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Ubah</button></a>

                                                <a onclick="return konfirmasi();" href="hapus_kgb.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>TMT</th>
                                    <th>Gaji Pokok</th>
                                    <th>Kenaikan Gaji</th>
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