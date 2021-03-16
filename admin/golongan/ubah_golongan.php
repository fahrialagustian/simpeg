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
                    <h1 class="m-0 text-dark">Data Golongan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Golongan</li>
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
                            <h5 class="m-0">Form Golongan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Ubah Data Golongan</h3>
                                        </div>
                                        <?php
                                        $id = $_GET['id'];
                                        $sql = mysqli_query($koneksi, "SELECT * FROM golongan where id_golongan='$id'") or die(mysqli_error($koneksi));
                                        $dt = mysqli_fetch_array($sql);

                                        ?>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="proses_ubah.php" method="POST">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Golongan</label>
                                                    <input type="hidden" name="id_golongan" class="form-control" value="<?php echo $dt['id_golongan'] ?>">
                                                    <input type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" name="golongan" class="form-control" value="<?php echo $dt['golongan'] ?>" id="exampleInputEmail1" placeholder="Nama Golongan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="uang_makan">Uang Makan</label>
                                                    <input type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $dt['uang_makan'] ?>" name="uang_makan" class="form-control" id="uang_makan" placeholder="Rp.">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Pajak">Pajak</label>
                                                    <input type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="<?php echo $dt['pajak']*100 ?>" name="pajak" class="form-control" id="Pajak" placeholder="Pajak">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">

                                                <a href="index.php"><button type="button" class="btn btn-danger"> <i class="fa fa-reply"></i> Cancel</button></a>
                                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Submit</button>
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