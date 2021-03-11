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
                                    $sql = mysqli_query($koneksi, "SELECT riwayat_pendidikan.id_rp,riwayat_pendidikan.nip, riwayat_pendidikan.nama_sekolah,riwayat_pendidikan.jurusan, riwayat_pendidikan.akreditasi, riwayat_pendidikan.nomor_ijazah, riwayat_pendidikan.tgl_ijazah, riwayat_pendidikan.file_ijazah, tingkat.id_tingkat,tingkat.id_tingkat, tingkat.tingkat FROM tingkat join riwayat_pendidikan on tingkat.id_tingkat=riwayat_pendidikan.id_tingkat where riwayat_pendidikan.id_rp='$id'") or die(mysqli_error($koneksi));
                                    $dt = mysqli_fetch_array($sql);

                                    ?>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" action="proses_ubah_pendidikan.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tingkat</label>
                                                <select class="form-control select2" name="id_tingkat" style="width: 100%;">
                                                    <option selected="selected" disabled>--Pilih Tingkat--</option>
                                                    <?php
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM tingkat order by tingkat ASC") or die(mysqli_error($koneksi));
                                                    while ($tingkat = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option <?php echo $dt['id_tingkat'] == $tingkat['id_tingkat'] ? 'selected' : null ?> value="<?php echo $tingkat['id_tingkat'] ?>"><?php echo $tingkat['tingkat'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_sekolah" class="col-form-label">Nama Sekolah</label>
                                                <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $dt['nama_sekolah'] ?>" id="nama_sekolah">

                                                <input type="hidden" class="form-control" name="nip" value="<?php echo $dt['nip'] ?>" id="nama_sekolah">

                                                <input type="hidden" class="form-control" name="id_rp" value="<?php echo $dt['id_rp'] ?>" id="nama_sekolah">
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan" class="col-form-label">Jurusan</label>
                                                <input type="text" class="form-control" name="jurusan" value="<?php echo $dt['jurusan'] ?>" id="jurusan">
                                                <small class="badge badge-danger">* Isi dengan - jika tidak ada jurusan</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="akreditasi" class="col-form-label">Akreditasi</label>
                                                <input type="text" class="form-control" name="akreditasi" value="<?php echo $dt['akreditasi'] ?>" id="akreditasi">
                                                <small class="badge badge-danger">* Isi dengan - jika tidak ada akreditasi</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_ijazah" class="col-form-label">Nomor Ijazah</label>
                                                <input type="text" value="<?php echo $dt['nomor_ijazah'] ?>" class="form-control" name="no_ijazah" id="no_ijazah">
                                            </div>
                                            <div class="form-group">
                                                <label for="tgl_ijazah" class="col-form-label">Tanggal Ijazah</label>
                                                <input type="date" value="<?php echo $dt['tgl_ijazah'] ?>" class="form-control" name="tgl_ijazah" id="tgl_ijazah">
                                            </div>
                                            <div class="form-group">
                                                <label for="file_ijazah" class="col-form-label">File Ijazah</label>
                                                <input type="file" accept="application/pdf" class="form-control" name="file_ijazah" id="file_ijazah">
                                                <small class="badge badge-danger">* Format file .pdf</small>

                                                <input type="hidden" value="<?php echo $dt['file_ijazah'] ?>" class="form-control" name="ijazah_lama">
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