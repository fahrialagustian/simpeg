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
                    <h1>Data SPPD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data SPPD</li>
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
                    
                        <div class="card-body">
                            <div class="row">

                                <div class="col-3">
                                    <form method="GET" action="">
                                        <div class="form-group">
                                            <select class="form-control select2"  name="bulan" style="width: 100%;">
                                                <option selected="selected" disabled>--Pilih Bulan--</option>
                                                <?php
                                                $sql = mysqli_query($koneksi, "SELECT MONTH(tgl_buat) as bulan from sppd GROUP by MONTH(tgl_buat) ASC") or die(mysqli_error($koneksi));
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
                                            $sql = mysqli_query($koneksi, "SELECT Year(tgl_buat) as tahun from sppd GROUP by Year(tgl_buat) ASC") or die(mysqli_error($koneksi));
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
                                    <a href="tambah_sppd.php"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> SPPD</button></a>
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
                                    <th>Maksud</th>
                                    <th>Status</th>
                                    <th>Tanggal Buat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if(isset($_GET['filter'])){
                                    $m = $_GET['bulan'];
                                    $y = $_GET['tahun'];
                                    $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,sppd.maksud,sppd.id_sppd,sppd.status,sppd.tgl_buat FROM pegawai JOIN sppd on pegawai.nip=sppd.nip where MONTH(sppd.tgl_buat)='$m' and YEAR(sppd.tgl_buat)='$y' ORDER BY sppd.tgl_buat DESC") or die(mysqli_error($koneksi));
                                }else{
                                    $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,sppd.maksud,sppd.id_sppd,sppd.status,sppd.tgl_buat FROM pegawai JOIN sppd on pegawai.nip=sppd.nip ORDER BY sppd.tgl_buat DESC") or die(mysqli_error($koneksi));
                                }
                                


                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?><br><small><?php echo $dt['nip'] ?></small></td>
                                        <td><?php echo $dt['maksud'] ?></td>
                                        <td><?php echo $dt['status'] ?></td>
                                        <td><?php echo tgl_indo($dt['tgl_buat']) ?></td>
                                        <td>
                                            <center>
                                                <a href="detail_sppd.php?id=<?php echo  $dt['id_sppd'] ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</button></a>
                                                <?php
                                                if ($dt['status'] == 'Konfirmasi') :
                                                ?>
                                                <a href="cetak_sppd.php?id=<?php echo  $dt['id_sppd'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button></a>
                                                <?php
                                                endif;
                                                if($dt['status'] !='Konfirmasi'):
                                                ?>
                                                <a href="ubah_sppd.php?id=<?php echo  $dt['id_sppd'] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Ubah</button></a>

                                                <a onclick="return konfirmasi();" href="hapus_sppd.php?id=<?php echo  $dt['id_sppd'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>
                                                <?php
                                                endif;
                                                ?>
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
                                    <th>Maksud</th>
                                    <th>Status</th>
                                    <th>Tanggal Buat</th>
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