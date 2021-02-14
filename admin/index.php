<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Petcare Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
      <?php
      if (isset($_REQUEST['login'])){
        session_start();
        $email = $_REQUEST['email']??'';
        $pass = $_REQUEST['pass']??'';

        include_once "db_ecommerce.php";
        $con=mysqli_connect($host, $user, $dbpass, $db);

        $query="SELECT idVendedor,correo,nombre FROM Vendedores WHERE correo='" . $email . "' AND contrasena='" .$pass. "';";

        $res= mysqli_query($con,$query);
        $row= mysqli_fetch_assoc($res);

        if($row){
          $_SESSION['id'] = $row['idVendedor'];
          $_SESSION['email'] = $row['correo'];
          $_SESSION['nombre'] = $row['nombre'];
          header("location: panel.php");
        }else{
      ?>
        <div class="alert alert-danger" role="alert">
          <b>Error de Login</b>
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
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">¿Olvidaste tu contraseña?</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">¿Eres nuevo?, Registrate</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
