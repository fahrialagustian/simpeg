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
                    <h1 class="m-0 text-dark">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Pegawai</li>
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
                            <h5 class="m-0">Form Pegawai</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                include "../../config.php";
                                $id = $_GET['id'];
                                $sql = mysqli_query($koneksi, "SELECT pegawai.nip, pegawai.nama_pegawai, pegawai.tmpt_lhr,pegawai.tgl_lhr,pegawai.alamat, pegawai.no_telpon, pegawai.email,pegawai.foto, agama.id_agama,agama.agama,jabatan.id_jabatan,jabatan.jabatan,golongan.id_golongan,golongan.golongan FROM golongan join pegawai on golongan.id_golongan=pegawai.id_golongan join agama on agama.id_agama=pegawai.id_agama join jabatan on jabatan.id_jabatan=pegawai.id_jabatan WHERE pegawai.nip='$id'");
                                $dt = mysqli_fetch_array($sql);
                                ?>
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data Pegawai</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="proses_ubah.php" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nip">NIP</label>
                                                            <input type="text" name="nip" class="form-control" id="nip" required placeholder="NIP" data-inputmask='"mask": "99999999 999999 9 999"' value="<?php echo $dt['nip'] ?>" data-mask>

                                                            <input type="hidden" name="nip_lama" class="form-control"  value="<?php echo $dt['nip'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tmpt_lhr">Tempat Lahir</label>
                                                            <input type="text" name="tmpt_lhr" class="form-control" value="<?php echo $dt['tmpt_lhr'] ?>" id="tmpt_lhr" required placeholder="Tempat Lahir">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Agama</label>
                                                            <select class="form-control select2" name="id_agama" style="width: 100%;">
                                                                <option selected="selected" disabled>--Pilih Agama--</option>
                                                                <?php
                                                                $sql = mysqli_query($koneksi, "SELECT * FROM agama order by agama ASC") or die(mysqli_error($koneksi));
                                                                while ($agama = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option <?php echo $dt['id_agama'] == $agama['id_agama'] ? 'selected' : null ?> value="<?php echo $agama['id_agama'] ?>"><?php echo $agama['agama'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <select class="form-control select2" name="id_jabatan" style="width: 100%;">
                                                                <option selected="selected" disabled>--Pilih Jabatan--</option>
                                                                <?php
                                                                $sql = mysqli_query($koneksi, "SELECT * FROM jabatan order by jabatan ASC") or die(mysqli_error($koneksi));
                                                                while ($jabatan = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option <?php echo $dt['id_jabatan'] == $jabatan['id_jabatan'] ? 'selected' : null ?> value="<?php echo $jabatan['id_jabatan'] ?>"><?php echo $jabatan['jabatan'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_telpon">Nomor Telpon</label>
                                                            <input type="text" name="no_telpon" class="form-control" value="<?php echo $dt['no_telpon'] ?>" id="no_telpon" placeholder="Nomor Telpon">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" value="<?php echo $dt['alamat'] ?>" name="alamat" class="form-control" id="alamat" required placeholder="Alamat">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_pegawai">Nama Pegawai</label>
                                                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="<?php echo $dt['nama_pegawai'] ?>" required placeholder="Nama Pegawai">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tmpt_lhr">Tanggal Lahir</label>
                                                            <input type="date" name="tgl_lhr" class="form-control" value="<?php echo $dt['tgl_lhr'] ?>" id="tgl_lhr" required placeholder="Tanggal Lahir">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Golongan</label>
                                                            <select class="form-control select2" name="id_golongan" style="width: 100%;">
                                                                <option selected="selected" disabled>--Pilih Golongan--</option>
                                                                <?php
                                                                $sql = mysqli_query($koneksi, "SELECT * FROM golongan order by golongan ASC") or die(mysqli_error($koneksi));
                                                                while ($golongan = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option <?php echo $dt['id_golongan'] == $golongan['id_golongan'] ? 'selected' : null ?> value="<?php echo $golongan['id_golongan'] ?>"><?php echo $golongan['golongan'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" value="<?php echo $dt['email'] ?>" name="email" class="form-control" id="email" placeholder="Email">

                                                            <input type="hidden" value="<?php echo $dt['foto'] ?>" name="foto_lama" class="form-control" id="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="file_foto">File Foto</label>
                                                            <input type="file" name="file_foto" class="form-control" id="file_foto" placeholder="Foto">
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