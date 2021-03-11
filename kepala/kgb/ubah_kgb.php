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
                    <h1 class="m-0 text-dark">Data KGB</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form KGB</li>
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
                            <h5 class="m-0">Form KGB</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data KGB</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = mysqli_query($koneksi, "SELECT * FROM kgb where id_kgb='$id'") or die(mysqli_error($koneksi));
                                        $dt = mysqli_fetch_array($sql);
                                        ?>
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
                                                                    <option <?php echo $dt['nip'] == $pegawai['nip'] ? 'selected' : null ?> value="<?php echo $pegawai['nip'] ?>"><?php echo $pegawai['nip'] ?> | <?php echo $pegawai['nama_pegawai'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_sk">Nomor SK</label>
                                                            <input type="text" value="<?php echo $dt['no_sk'] ?>" name="no_sk" class="form-control" id="no_sk" required placeholder="Nomor SK">

                                                            <input type="hidden" name="id_kgb" class="form-control" value="<?php echo $dt['id_kgb'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_sk">Tanggal SK</label>
                                                            <input type="date" value="<?php echo $dt['tgl_sk'] ?>" name="tgl_sk" class="form-control" id="tgl_sk" required placeholder="Tanggal SK">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tmt_sk">TMT SK</label>
                                                            <input type="text" value="<?php echo $dt['tmt_sk'] ?>" name="tmt_sk" class="form-control" id="tmt_sk" placeholder="TMT SK">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mk_tahun">MK Tahun</label>
                                                            <input type="text" value="<?php echo $dt['mk_tahun'] ?>" name="mk_tahun" class="form-control" id="mk_tahun" required placeholder="MK Tahun">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mk_bulan">MK Bulan</label>
                                                            <input type="text" value="<?php echo $dt['mk_bulan'] ?>" name="mk_bulan" class="form-control" id="mk_bulan" required placeholder="MK Bulan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" value="<?php echo $dt['keterangan'] ?>" name="keterangan" class="form-control" id="keterangan" required placeholder="Keterangan">
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