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
                    <h1 class="m-0 text-dark">Data Pendidikan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Pendidikan</li>
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
                            <h5 class="m-0">Form Edit Pendidikan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <!-- <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Ubah Data Pendidikan</h3>
                                        </div> -->
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM riwayat_pekerjaan where id_riwayat_pekerjaan='$id' order by tgl_mulai DESC") or die(mysqli_error($koneksi));
                                    $dt = mysqli_fetch_array($sql);

                                    ?>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="proses_ubah_pekerjaan.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_instansi" class="col-form-label">Nama Instansi</label>
                                                <input type="text" required class="form-control" name="nama_instansi" value="<?php echo $dt['instansi'] ?>" id="nama_instansi">

                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" id="">

                                                <input type="hidden" class="form-control" name="nip" value="<?php echo $dt['nip'] ?>" id="nama_sekolah">
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan" class="col-form-label">Jabatan</label>
                                                <input type="text" class="form-control" name="jabatan" value="<?php echo $dt['jabatan'] ?>" id="jabatan">
                                                <small class="badge badge-danger">* Isi dengan - jika tidak ada Jabatan</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_mulai" class="col-form-label">Tgl. Mulai</label>
                                                <input type="date" value="<?php echo $dt['tgl_mulai'] ?>" class="form-control" name="tgl_mulai" id="tgl_mulai">
                                                <!-- <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_selesai" class="col-form-label">Tgl. Selesai</label>
                                                <input type="date" value="<?php echo $dt['tgl_selesai'] ?>" class="form-control" name="tgl_selesai" id="tgl_selesai">
                                            </div>
                                            <div class="form-group">
                                                <label for="no_sk" class="col-form-label">Nomor SK</label>
                                                <input type="text" value="<?php echo $dt['nomor_sk'] ?>" class="form-control" name="no_sk" id="no_sk">

                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_sk" class="col-form-label">Tgl. SK</label>
                                                <input type="date" value="<?php echo $dt['tgl_sk'] ?>" class="form-control" name="tgl_sk" id="tgl_sk">
                                            </div>
                                            <div class="form-group">
                                                <label for="file_sk" class="col-form-label">File SK</label>
                                                <input type="file" accept="application/pdf" class="form-control" name="file_sk" id="file_sk">
                                                <small class="badge badge-danger">* Format file .pdf</small>

                                                <input type="hidden" value="<?php echo $dt['file_sk'] ?>" class="form-control" name="file_sk">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                            <a href="profil.php?id=<?php echo str_replace(" ", "", $dt['nip']) ?>&tab=pendidikan"><button type="button" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancel</button></a>
                                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Submit</button>
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