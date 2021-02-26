<?php
include "../komponen/head.php";
?>
<?php
include "../komponen/menu.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Absen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Absen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Form Izin</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data Izin</h3>
                                        </div>
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = mysqli_query($koneksi, "SELECT pegawai.nip,pegawai.nama_pegawai, izin.alasan,izin.tgl_awal,izin.tgl_akhir,izin.keterangan,izin.status,izin.id_izin, izin.tgl_buat from pegawai join izin on pegawai.nip=izin.nip where izin.id_izin='$id'") or die(mysqli_error($koneksi));
                                        $dt = mysqli_fetch_array($sql);
                                        ?>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="proses_ubah.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Nama Pegawai</label>
                                                            <select class="form-control select2" name="nip" style="width: 100%;">
                                                                <option selected="selected" disabled>--Pilih Pegawai--</option>
                                                                <?php
                                                                $sql = mysqli_query($koneksi, "SELECT * FROM pegawai order by nama_pegawai ASC") or die(mysqli_error($koneksi));
                                                                while ($pegawai = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option <?php echo $dt['nip'] == $pegawai['nip'] ? 'selected' : null ?> value="<?php echo $pegawai['nip'] ?>"> <?php echo $pegawai['nip'] ?> | <?php echo $pegawai['nama_pegawai'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tgl_awal">Tanggal Awal</label>
                                                            <input type="date" name="tgl_awal" class="form-control" value="<?php echo $dt['tgl_awal'] ?>" id="tgl_awal" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_akhir">Tanggal Akhir</label>
                                                            <input type="date" name="tgl_akhir" class="form-control" value="<?php echo $dt['tgl_akhir'] ?>" id="tgl_akhir" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alasan">Alasan</label>
                                                            <input type="text" value="<?php echo $dt['alasan'] ?>" name="alasan" class="form-control" id="alasan" placeholder="Alasan" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $dt['id_izin'] ?>" name="id_izin" class="form-control" id="id_izin" placeholder="id_izin" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <a href="index.php"><button type="button" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancel</button></a>
                                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!--/.col (left) -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php
include "../komponen/footer.php";
?>