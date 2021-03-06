 <?php
    include "head.php";
    ?>
 <?php
    include "menu.php";
    ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Dashboard</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                 </div><!-- /.col -->
             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="callout callout-info text-center">
                         <h3>
                             <b>
                                 SELAMAT DATANG, <?php echo strtoupper($_SESSION['nama_pengguna']) ?> DI SISTEM INFORMASI KEPEGAWAIAN
                             </b>
                         </h3>

                         <h5>MTsN 4 TANAH LAUT</h5>
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- Info boxes -->
             <!-- <div class="row">
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box">
                         <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">CPU Traffic</span>
                             <span class="info-box-number">
                                 10
                                 <small>%</small>
                             </span>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Likes</span>
                             <span class="info-box-number">41,410</span>
                         </div>
                     </div>
                 </div>
                 <div class="clearfix hidden-md-up"></div>

                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">Sales</span>
                             <span class="info-box-number">760</span>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                         <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text">New Members</span>
                             <span class="info-box-number">2,000</span>
                         </div>
                     </div>
                 </div>
             </div> -->
         </div>
         <!--/. container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <?php
    include "footer.php";
    ?>