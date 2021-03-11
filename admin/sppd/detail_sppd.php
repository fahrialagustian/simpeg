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
                <?php
                $id = $_GET['id'];
                $sql = mysqli_query($koneksi, "SELECT golongan.golongan,jabatan.jabatan,pegawai.nip,pegawai.nama_pegawai, sppd.id_sppd,sppd.no_sppd,sppd.tgl_buat,sppd.maksud,sppd.alat,sppd.tujuan,sppd.dari,sppd.tgl_berngkat,sppd.tgl_pulang,sppd.lama,sppd.anggaran,sppd.instansi,sppd.mata_anggaran,sppd.status,sppd.keterangan from golongan join pegawai on golongan.id_golongan=pegawai.id_golongan join jabatan on jabatan.id_jabatan=pegawai.id_jabatan join sppd on pegawai.nip=sppd.nip where sppd.id_sppd='$id'") or die(mysqli_error($koneksi));
                $dt = mysqli_fetch_array($sql);
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="index.php"><button class="btn btn-danger"><i class="fa fa"></i> Kembali</button></a>
                        <?php
                        if ($dt['status'] == 'Konfrimasi') :
                        ?>
                            <a href="cetak_sppd.php"><button class="btn btn-primary"><i class="fa fa"></i> Print</button></a>
                        <?php
                        endif;
                        ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nomor </td>
                                    <td><?php echo $dt['no_sppd'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama/NIP </td>
                                    <td><?php echo $dt['nama_pegawai'] ?>/<?php echo $dt['nip'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pangkat dan Golongan </td>
                                    <td><?php echo $dt['golongan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jabatan </td>
                                    <td><?php echo $dt['jabatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tingkat Biaya Perjalanan Dinas </td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Maksud Perjalanan Dinas </td>
                                    <td><?php echo $dt['maksud'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alat Angkut Yang digunakan </td>
                                    <td><?php echo $dt['alat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Berangkat </td>
                                    <td><?php echo $dt['dari'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Tujuan </td>
                                    <td><?php echo $dt['tujuan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Lama Perjalanan Dinas </td>
                                    <td><?php echo $dt['lama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berangkat </td>
                                    <td><?php echo $dt['tgl_berngkat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Harus Kembali </td>
                                    <td><?php echo $dt['tgl_pulang'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pembebanan Anggaran </td>
                                    <td><?php echo $dt['anggaran'] ?></td>
                                </tr>
                                <tr>
                                    <td>Instansi </td>
                                    <td><?php echo $dt['instansi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Mata Anggaran </td>
                                    <td><?php echo $dt['mata_anggaran'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan </td>
                                    <td><?php echo $dt['keterangan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status </td>
                                    <td><?php echo $dt['status'] ?></td>
                                </tr>
                            </tbody>
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