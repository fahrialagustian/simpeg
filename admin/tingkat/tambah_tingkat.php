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
                    <h1 class="m-0 text-dark">Data Tingkat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../komponen/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Tingkat</li>
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
                            <h5 class="m-0">Form Tingkat</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-6">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Tambah Data Tingkat</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="proses_tambah.php" method="POST">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Tingkat</label>
                                                    <input type="text" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" name="tingkat" class="form-control" id="exampleInputEmail1" placeholder="Nama Tingkat">
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