<?php
session_start();
include('conf/config.php');
include('conf/checklogin.php');
check_login();
$f_id=$_SESSION['f_id'];
?>

<!DOCTYPE html>
<html lang="en">
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />
      <?php include("dist/_partials/head.php"); ?>

      <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
      <div class="wrapper">
        <!-- Navbar -->
        <?php include("dist/_partials/nav.php"); ?>
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          <?php include("dist/_partials/sidebar.php"); ?>
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->

            <div class="content"><!--content section-->
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                       <iframe src="../clients/dist/_partials/about/about.php" width="100%" height="2050" frameborder="0"></iframe>
                    </div>
                  </div><!--forex card-->
                </div><!---Forex Tcolumn-->
               </div><!--row-->
             </div><!--Content-->
          </div><!--content wrapper-->
        </div><!--Wraper-->
      <?php include("dist/_partials/footer.php"); ?>

        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- overlayScrollbars -->
        <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="dist/js/demo.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="plugins/raphael/raphael.min.js"></script>
        <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>

        <!-- PAGE SCRIPTS -->
        <script src="dist/js/pages/dashboard2.js"></script>

        <!--Load Canvas JS -->
        <script src="plugins/canvasjs.min.js"></script>
        <script>
          window.onload=function(){
            $('#datatable1').DataTable();
          }
        </script>
    </body>
  </html>