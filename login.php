<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Petcare | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css"> -->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- <link rel="stylesheet" href="admin/dist/css/adminlte.min.css"> -->
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>PetCare</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login</p>

        <!-- Verificacion de que dio click en login -->
        <?php
        if (isset($_REQUEST['login'])) {
          session_start();
          $email = $_REQUEST['email'] ?? '';
          $password = $_REQUEST['pass'] ?? '';
          include_once "admin/db_ecommerce.php";
          $con = mysqli_connect($host, $user, $dbpass, $db);
          $res = mysqli_query($con, "SELECT idCliente, correo, nombre FROM Clientes WHERE correo='" . $email . "' AND contrasena='" . $password . "';");
          $row = mysqli_fetch_assoc($res);
          if ($row) {
            $_SESSION['idCliente'] = $row['idCliente'];
            $_SESSION['emailCliente'] = $row['correo'];
            $_SESSION['nombreCliente'] = $row['nombre'];
            header("location: index.php");
            /* header("location: admin/panelLoginVendedor.php"); */
          } else {
        ?>
            <div class="alert alert-danger" role="alert">
              <b>Usuario o contraseña incorrectos</b>
            </div>
        <?php
          }
        }
        ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="login">Iniciar sesión</button>
              <a href="registro.php" class="text-success float-right">Registrarse</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <hr>
        <p class="mb-1">
          <a href="forgot-password.html">¿Olvidaste tu contraseña?</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- <script src="admin/plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  <!-- <script src="admin/dist/js/adminlte.min.js"></script> -->
</body>

</html>