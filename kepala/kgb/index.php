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
                        <!-- <a href="tambah_kgb.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> KGB</button></a> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example1" class="table table-bordered   table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nomor SK</th>
                                    <th>Tanggal SK</th>
                                    <th>TMT SK</th>
                                    <th>MK Tahun</th>
                                    <th>MK Bulan</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,kgb.no_sk,kgb.id_kgb,kgb.tgl_sk,kgb.tmt_sk,kgb.mk_tahun,kgb.mk_bulan,kgb.keterangan from pegawai join kgb on pegawai.nip=kgb.nip ORDER BY kgb.tgl_sk DESC") or die(mysqli_error($koneksi));
                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?><br><small><?php echo $dt['nip'] ?></small></td>
                                        <td><?php echo $dt['no_sk'] ?></td>
                                        <td><?php echo tgl_indo($dt['tgl_sk']) ?></td>
                                        <td><?php echo $dt['tmt_sk'] ?></td>
                                        <td><?php echo $dt['mk_tahun'] ?></td>
                                        <td><?php echo $dt['mk_bulan'] ?></td>
                                        <td><?php echo $dt['keterangan'] ?></td>
                                        <td>
                                            <center>

                                                <a href="print.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button></a>

                                                <!-- <a href="ubah_kgb.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Ubah</button></a>

                                                <a onclick="return konfirmasi();" href="hapus_kgb.php?id=<?php echo  $dt['id_kgb'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a> -->
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
                                    <th>Nomor SK</th>
                                    <th>Tanggal SK</th>
                                    <th>TMT SK</th>
                                    <th>MK Tahun</th>
                                    <th>MK Bulan</th>
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
include "../komponen/footer.php";
?>