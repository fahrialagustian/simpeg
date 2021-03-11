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
                    <h1 class="m-0 text-dark">Data Pelatihan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Pelatihan</li>
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
                            <h5 class="m-0">Form Edit Pelatihan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <!-- <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Ubah Data Pelatihan</h3>
                                        </div> -->
                                    <?php
                                    $id = $_GET['id'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM pelatihan where id_pelatihan='$id' order by tgl_mulai DESC") or die(mysqli_error($koneksi));
                                    $dt = mysqli_fetch_array($sql);
                                    ?>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="proses_ubah_pelatihan.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nama_pelatihan" class="col-form-label">Nama Pelatihan</label>
                                                <input type="text" required class="form-control" name="nama_pelatihan" value="<?php echo $dt['nama_pelatihan'] ?>" id="nama_pelatihan">

                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>" id="">

                                                <input type="hidden" class="form-control" name="nip" value="<?php echo $dt['nip'] ?>" id="nama_sekolah">
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
                                                <label for="no_sk" class="col-form-label">Nomor Sertifikat</label>
                                                <input type="text" value="<?php echo $dt['no_sertifikat'] ?>" class="form-control" name="no_sertifikat" id="no_sk">

                                            </div>
                                            <div class="form-group">
                                                <label for="penyelenggara" class="col-form-label">Penyelenggara </label>
                                                <input type="text" value="<?php echo $dt['penyelenggara'] ?>" class="form-control" name="penyelenggara" id="penyelenggara">
                                            </div>
                                            <div class="form-group">
                                                <label for="file_sertifikat" class="col-form-label">File Sertifikat</label>
                                                <input type="file" accept="application/pdf" class="form-control" name="file_sertifikat" id="file_sertifikat">
                                                <small class="badge badge-danger">* Format file .pdf</small>

                                                <input type="text" value="<?php echo $dt['file_sertifikat'] ?>" class="form-control" name="sertifikat_lama">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">

                                            <a href="profil.php?id=<?php echo str_replace(" ", "", $dt['nip']) ?>&tab=pelatihan"><button type="button" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancel</button></a>
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