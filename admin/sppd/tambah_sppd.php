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
                    <h1 class="m-0 text-dark">Data SPPD</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form SPPD</li>
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
                            <h5 class="m-0">Form SPPD</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data SPPD</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="proses_tambah.php" method="POST" enctype="multipart/form-data">
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
                                                                    <option value="<?php echo $pegawai['nip'] ?>"><?php echo $pegawai['nip'] ?> | <?php echo $pegawai['nama_pegawai'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="maksud">Maksud Perjalanan Dinas</label>
                                                            <input type="text" name="maksud" class="form-control" id="maksud" required placeholder="Maksiud Pejalanan Dinas">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alat">Alat Angkut yang digunakan</label>
                                                            <input type="text" name="alat" class="form-control" id="alat" required placeholder="Alat Angkut yang digunakan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dari">Tempat Berangkat</label>
                                                            <input type="text" name="dari" class="form-control" value="Pelaihari" id="dari" placeholder="Tempat Berangkat">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tujuan">Tempat Tujuan</label>
                                                            <input type="text" name="tujuan" class="form-control" id="tujuan" required placeholder="Tempat Tujuan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_berangkat">Tanggal Berangkat</label>
                                                            <input type="date" name="tgl_berangkat" class="form-control" id="tgl_berangkat" required placeholder="Nama SPPD">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_pulang">Tanggal Harus Kembali</label>
                                                            <input type="date" name="tgl_pulang" class="form-control" id="tgl_pulang" required placeholder="Tanggal Harus Kembali">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="anggaran">Pembebanan Anggaran</label>
                                                            <input type="text" name="anggaran" class="form-control" id="anggaran" placeholder="Pembebanan Anggaran">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="instansi">Instansi</label>
                                                            <input type="text" name="instansi" class="form-control" id="instansi" placeholder="Instansi">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="anggaran">Mata Anggaran</label>
                                                            <input type="text" name="mata_anggaran" class="form-control" id="mata_anggaran" placeholder="Mata Anggaran">
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