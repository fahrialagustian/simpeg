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
                    <h1 class="m-0 text-dark">Data Sumai/Istri</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Sumai/Istri</li>
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
                            <h5 class="m-0">Form Edit Sumai/Istri</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <!-- <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Ubah Data Sumai/Istri</h3>
                                        </div> -->
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM suami_istri where id_si='$id'") or die(mysqli_error($koneksi));
                                    $dt = mysqli_fetch_array($sql);
                                    ?>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="proses_ubah_si.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_si" class="col-form-label">Nama Sumai/Istri</label>
                                                <input type="text" required class="form-control" name="nama_si" value="<?php echo $dt['nama_si'] ?>" id="nama_si">

                                                <input type="hidden" class="form-control" name="id_si" value="<?php echo $id ?>" id="nip">
                                            </div>
                                            <div class="form-group">
                                                <label for="nik" class="col-form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik" value="<?php echo $dt['nik_si'] ?>" id="nik">

                                                <input type="hidden" class="form-control" name="nip" value="<?php echo $dt['nip'] ?>" id="nip">
                                                <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="tmpt_lhr" class="col-form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tmpt_lhr" value="<?php echo $dt['tmpt_lhr_si'] ?>" id="tmpt_lhr">
                                                <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_lahir" class="col-form-label">Tgl. Lahir</label>
                                                <input type="date" value="<?php echo $dt['tgl_lhr_si'] ?>" class="form-control" name="tgl_lahir" id="tgl_lahir">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" value="<?php echo $dt['alamat_si'] ?>" id="alamat">

                                            </div>
                                            <div class="form-group">
                                                <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" value="<?php echo $dt['pekerjaan_si'] ?>" id="pekerjaan">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status" style="width: 100%;">
                                                    <option selected="selected" disabled>--Pilih Status--</option>
                                                    <option <?php echo $dt['status_hidup_si'] == 'Hidup' ? 'selected' : null ?> value="Hidup">Hidup</option>
                                                    <option <?php echo $dt['status_hidup_si'] == 'Meninggal' ? 'selected' : null ?> value="Meninggal">Meninggal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                            <a href="profil.php?id=<?php echo str_replace(" ", "", $dt['nip']) ?>&tab=keluarga"><button type="button" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancel</button></a>
                                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Submit</button>
                                        </div>
                                    </form>
                                    <!-- </div> -->
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