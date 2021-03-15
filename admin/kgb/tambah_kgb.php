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
                                                            <label for="nomor">Nomor Surat</label>
                                                            <input type="text" name="nomor" class="form-control" id="nomor" required placeholder="Nomor Surat">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_baru">Tanggal Surat</label>
                                                            <input type="date" name="tgl_baru" class="form-control" id="tgl_baru" required placeholder="Tanggal Surat">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gaji_lama">Gaji Pokok Lama</label>
                                                            <input type="text" name="gaji_lama" class="form-control" id="gaji_lama" placeholder="Gaji Pokok Lama">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_lama">Nomor Surat Terdahulu</label>
                                                            <input type="text" name="no_lama" class="form-control" id="no_lama" required placeholder="Nomor Surat Terdahulu">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tgl_gaji_lama">Tanggal Surat Terdahulu</label>
                                                            <input type="date" name="tgl_lama" class="form-control" id="tgl_lama" required placeholder="MK Tahun">
                                                        </div><div class="form-group">
                                                            <label for="tgl_gaji_lama">Tanggal mulai berlaku gaji tersebut</label>
                                                            <input type="date" name="tgl_gaji_lama" class="form-control" id="tgl_gaji_lama" required placeholder="MK Tahun">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="masa_kerja_lama">Masa Kerja Golongan</label>
                                                            <input type="text" name="masa_kerja_lama" class="form-control" id="masa_kerja_lama" required placeholder="MK Bulan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gaji_baru">Gaji Pokok Baru</label>
                                                            <input type="text" name="gaji_baru" class="form-control" id="gaji_baru" required placeholder="Gaji Pokok Baru">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="masa_kerja_baru">Berdasarkan Masa Kerja</label>
                                                            <input type="text" name="masa_kerja_baru" class="form-control" id="masa_kerja_baru" required placeholder="Berdasarkan Masa Kerja">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="golongan">Golongan</label>
                                                            <input type="text" name="golongan" class="form-control" id="golongan" required placeholder="Golongan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="mulai_berlaku">Mulai Berlaku</label>
                                                            <input type="date" name="mulai_berlaku" class="form-control" id="mulai_berlaku" required placeholder="Mulai Berlaku">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kenaikan_gaji">Kenaikan Gaji Yang Akan Datang</label>
                                                            <input type="date" name="kenaikan_gaji" class="form-control" id="kenaikan_gaji" required placeholder="Berdasarkan Masa Kerja">
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