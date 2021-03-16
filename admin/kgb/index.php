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
                                    $m = $_GET['bulan'];
                                    $y = $_GET['tahun'];

                                    $sql = mysqli_query($koneksi,"SELECT pegawai.nip,pegawai.nama_pegawai, jabatan.jabatan,jabatan.id_jabatan,golongan.id_golongan,golongan.golongan,kgb.id_kgb, kgb.nomor,kgb.gaji_lama,kgb.tgl_lama,kgb.no_lama,kgb.tgl_gaji_lama,kgb.masa_kerja_lama,kgb.gaji_baru,kgb.masa_kerja_baru,kgb.golongan,kgb.mulai_berlaku,kgb.kenaikan_gaji,kgb.tgl_baru FROM jabatan JOIN pegawai on jabatan.id_jabatan=pegawai.id_jabatan join golongan on golongan.id_golongan=pegawai.id_golongan JOIN kgb on pegawai.nip=kgb.nip where MONTH(kgb.tgl_baru)='$m' and YEAR(kgb.tgl_baru)='$y' order by kgb.kenaikan_gaji DESC") or die(mysqli_error($koneksi));
                                    
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