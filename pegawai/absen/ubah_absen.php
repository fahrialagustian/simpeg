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
                            <h5 class="m-0">Form Absen</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data Absen</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = mysqli_query($koneksi, "SELECT absen.id_absen,absen.nip,absen.tgl_absen,absen.jam_masuk,absen.jam_pulang,keterangan_absen.id_keterangan_absen,keterangan_absen.keterangan_absen,absen.keterangan,pegawai.nama_pegawai from pegawai join absen on pegawai.nip=absen.nip join keterangan_absen on keterangan_absen.id_keterangan_absen=absen.id_ketengan_absen where absen.id_absen='$id'") or die(mysqli_error($koneksi));
                                        $dt = mysqli_fetch_array($sql);
                                        ?>
                                        <form role="form" action="proses_ubah.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="tgl_absen">NIP</label>
                                                            <input type="text" name="nip" class="form-control" value="<?php echo $dt['nip'] ?>" id="tgl_absen" readonly placeholder="Tanggal Absen">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_absen">Nama Pegawai</label>
                                                            <input type="text" class="form-control" value="<?php echo $_SESSION['nama_pengguna'] ?>" id="tgl_absen" readonly placeholder="Tanggal Absen">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="tgl_absen">Tanggal Absen</label>
                                                            <input type="date" name="tgl_absen" class="form-control" value="<?php echo $dt['tgl_absen'] ?>" id="tgl_absen" required placeholder="Tanggal Absen">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jam_masuk">Jam Masuk</label>
                                                            <input type="time" value="<?php echo $dt['jam_masuk'] ?>" name="jam_masuk" class="form-control" id="jam_masuk" placeholder="Jam Masuk">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="jam_pulang">Jam Pulang</label>
                                                            <input type="time" value="<?php echo $dt['jam_pulang'] ?>" name="jam_pulang" class="form-control" id="jam_pulang" placeholder="Jam Pulang">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="form-control select2" name="id_keterangan_absen" style="width: 100%;">
                                                                <option selected="selected" disabled>--Pilih Status--</option>
                                                                <?php
                                                                $sql = mysqli_query($koneksi, "SELECT * FROM keterangan_absen order by keterangan_absen ASC") or die(mysqli_error($koneksi));
                                                                while ($absen = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option <?php echo $dt['id_keterangan_absen'] == $absen['id_keterangan_absen'] ? 'selected' : null ?> value="<?php echo $absen['id_keterangan_absen'] ?>"> <?php echo $absen['keterangan_absen'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" value="<?php echo $dt['keterangan'] ?>" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
                                                            <input type="hidden" value="<?php echo $dt['id_absen'] ?>" name="id_absen" class="form-control" id="keterangan" placeholder="Keterangan">
                                                            <small class="badge badge-danger">* Isikan - jika tidak ada keterangan</small>
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