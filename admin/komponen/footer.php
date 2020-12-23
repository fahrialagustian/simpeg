 <!-- Main Footer -->
 <footer class="main-footer">
     <strong>SIMPEG &copy; <?php echo date('Y') ?></strong>
     All rights reserved.
     <!-- <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.0.1-pre
     </div> -->
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->
 <!-- jQuery -->
 <script src="../../assets/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../../assets/dist/js/adminlte.js"></script>

 <!-- OPTIONAL SCRIPTS -->
 <script src="../../assets/dist/js/demo.js"></script>

 <!-- PAGE PLUGINS -->
 <!-- jQuery Mapael -->
 <script src="../../assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
 <script src="../../assets/plugins/raphael/raphael.min.js"></script>
 <script src="../../assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
 <script src="../../assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
 <!-- ChartJS -->
 <script src="../../assets/plugins/chart.js/Chart.min.js"></script>
 <!-- DataTables -->
 <script src="../../assets/plugins/datatables/jquery.dataTables.js"></script>
 <script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
 <!-- Select2 -->
 <script src="../../assets/plugins/select2/js/select2.full.min.js"></script>

 <!-- InputMask -->
 <script src="../../assets/plugins/moment/moment.min.js"></script>
 <script src="../../assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
 <!-- PAGE SCRIPTS -->
 <script src="../../assets/dist/js/pages/dashboard2.js"></script>
 <script>
     $(function() {
         $("#example1").DataTable();
         $("#suami_istri").DataTable();
         $("#anak").DataTable();
         $("#ortu").DataTable();
         $("#pendidikan1").DataTable();
         $("#pekerjaan1").DataTable();

         $('.select2').select2();

         $('[data-mask]').inputmask();
     });
 </script>
 </body>

 </html>