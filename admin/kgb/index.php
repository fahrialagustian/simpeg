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
                        <a href="tambah_kgb.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> KGB</button></a>
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
                                $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai,KGB.maksud,KGB.id_KGB,KGB.status FROM pegawai JOIN KGB on pegawai.nip=KGB.nip ORDER BY KGB.tgl_buat DESC") or die(mysqli_error($koneksi));
                                while ($dt = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $dt['nama_pegawai'] ?><br><small><?php echo $dt['nip'] ?></small></td>
                                        <td><?php echo $dt['maksud'] ?></td>
                                        <td><?php echo $dt['status'] ?></td>
                                        <td>
                                            <center>

                                                <a href="print.php?id=<?php echo  $dt['id_KGB'] ?>"><button class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</button></a>

                                                <a href="ubah_KGB.php?id=<?php echo  $dt['id_KGB'] ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Ubah</button></a>

                                                <a onclick="return konfirmasi();" href="hapus_KGB.php?id=<?php echo  $dt['id_KGB'] ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button></a>
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