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
                        <a href="tambah_izin.php"><button class="btn btn-primary"><i class="fa fa-plus"></i> Izin</button></a>
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

                                $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip   ORDER BY izin.tgl_buat DESC") or die(mysqli_error($koneksi));

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
                                                    <a href="konfirmasi_izin.php?id=<?php echo $dt['id_izin'] ?>"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Acc</button></a>

                                                    <a href="tolak_izin.php?id=<?php echo $dt['id_izin'] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Tolak</button></a>
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