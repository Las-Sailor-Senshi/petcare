<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Petcare Admin</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="admin/css/stripe.css">
  <?php
  session_start();
  $accion = $_REQUEST['accion'] ?? '';
  if ($accion == 'cerrar') {
    session_destroy();
    header("Refresh:0");
  }
  ?>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php
        include_once "menu.php";
        ?>
        <div class="row mt-1">
          <?php
          $modulo = $_REQUEST['modulo'] ?? '';
          if ($modulo == "envio") {
            include_once "envio.php";
          }

          if ($modulo == "factura") {
            include_once "factura.php";
          }

          include_once "admin/db_ecommerce.php";
          $con = mysqli_connect($host, $user, $dbpass, $db);
          $query = "SELECT 
                        p.idProducto,
                        p.nomProducto,
                        p.precio,
                        p.stock,
                        ip.imagenProducto
                        FROM
                        Productos AS p
                        INNER JOIN ImagenesProductos AS ip ON ip.idProducto = p.idProducto";
          $res = mysqli_query($con, $query);
          while ($row = mysqli_fetch_assoc($res)) {
          ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card border-primary">
                <img class="card-img-top img-thumbnail" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagenProducto']); ?>" width="100" height="100" style="max-width:100%" style="max-height:100%" />
                <div class="card-body">
                  <h2 class="card-title"><strong><?php echo $row['nomProducto'] ?></strong></h2>
                  <p class="card-text"><strong>Precio:</strong><?php echo $row['precio'] ?></p>
                  <p class="card-text"><strong>Stock:</strong><?php echo $row['stock'] ?></p>
                  <a href="index.php?modulo=detalleproducto&id" class="btn btn-primary">Ver</a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- daterangepicker -->
  <script src="admin/plugins/moment/moment.min.js"></script>
  <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="admin/dist/js/pages/dashboard.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="admin/js/stripe.js"></script>
  <script src="admin/js/ecommerce.js"></script>
</body>

</html>