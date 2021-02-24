<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(isset($_SESSION['id'])==false){
    header("location: index.php");
  }
  $modulo = $_REQUEST['modulo']??'';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Petcare Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link nav-item navbar-nav" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!--Todo lo que estaba en la parte superiorizquierda lo puse como comentario casi al final de este html -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="panelLoginVendedor.php?modulo=resumen" class="brand-link">
      <img src="../images/icon/favicon.png" alt="PetCare Logo" class="brand-image">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- muestra icono de usuario en ventana admin -->
        <i class="fa fa-user fa-2x" style="margin-left: 0.45em"></i>
        <div class="info">
          <a href="#" class="d-block">
            <?php echo $_SESSION['nombre']; ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
          <a href="panelLoginVendedor.php?modulo=resumen" class="nav-link <?php echo($modulo=="resumen" || $modulo == "")?" active":""; ?>">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Administrar Cuenta
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="panelLoginVendedor.php?modulo=ventas" class="nav-link <?php echo($modulo=="ventas")?" active":""; ?>">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Ventas
              </p>
            </a>
          <li class="nav-item">
            <a href="panelLoginVendedor.php?modulo=catalogo" class="nav-link <?php echo($modulo=="catalogo" || $modulo=="verProductos")?" active":""; ?>">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Catálogo
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="panelLoginVendedor.php?modulo=vendedores" class="nav-link <?php echo($modulo=="vendedores" || $modulo=="crearVendedor")?" active":""; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Vendedores (Esta solo desde bd no?)
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="panelLoginVendedor.php?modulo=cerrarSesion" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Cerrar Sesión</p>
            </a> 
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <?php
    /* Se mamó el compa del tutorial con los if xd */
    /* Cada video pone mas xd */
    if(isset($_REQUEST['mensaje'])){
       ?>
          <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?php $_REQUEST['mensaje'] ?>
          </div>
      <?php
    }

          /* if($modulo == "estadisticas" || $modulo == ""){ */
          /*   include_once('estadisticas.php'); */
          /* } */
          /* if($modulo == "ventas"){ */
          /*   include_once('ventas.php'); */
          /* } */
          /* if($modulo == "catalogo"){ */
          /*   include_once('catalogo.php'); */
          /* } */
      if($modulo == "vendedores"){ 
       include_once('vendedores.php');
      } 
      if($modulo == "crearVendedor"){
        include_once ('crearVendedor.php');
      }
      if($modulo == "catalogo"){
        include_once ('catalogo.php');
      }
      if($modulo == "verProductos"){
        include_once ('verProductos.php');
      }
    /* if($modulo == "cerrarSesion"){ */
    /*   include_once('cerrarSesion.php'); */
    /* } */
    if($modulo == ""){
      include_once('resumen.php');
    }else{
      include_once($modulo.'.php');
    }
  ?>

  <?php include_once('../footer.php');?>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Script para las datatables -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>