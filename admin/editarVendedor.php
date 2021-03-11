<?php
    include_once "db_ecommerce.php";
    $con=mysqli_connect($host, $user, $dbpass, $db);

    if( isset($_REQUEST['guardar'])){
        $idVendedor= mysqli_real_escape_string($con , $_REQUEST['idVendedor']??'');
        $correo= mysqli_real_escape_string($con , $_REQUEST['correo']??'');
        $contrasena=mysqli_real_escape_string($con , $_REQUEST['contrasena']??'');
        $nombre= mysqli_real_escape_string($con , $_REQUEST['nombre']??'');
        $nickname= mysqli_real_escape_string($con , $_REQUEST['nickname']??'');
        $apPaterno= mysqli_real_escape_string($con , $_REQUEST['apPaterno']??'');
        $apMaterno= mysqli_real_escape_string($con , $_REQUEST['apMaterno']??'');

        $query="UPDATE Vendedores SET
            correo='".$correo."',contrasena='".$contrasena."',nombre='".$nombre."',nickname='".$nickname."',apPaterno='".$apPaterno."',apMaterno='".$apMaterno."'
            where idVendedor='".$idVendedor."' ";
        $res= mysqli_query($con,$query);
        if($res){
            echo '<meta http-equiv="refresh" content="0; url=panelLoginVendedor.php?modulo=Vendedores&mensaje=Vendedor editado exitosamente" /> ';
        }
        else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al crear vendedor <?php echo mysqli_error($con); ?>
                </div>
            <?php
        }
    }
    $idVendedor=mysqli_real_escape_string($con, $_REQUEST['idVendedor']??'');
    $query="SELECT  idVendedor,correo,contrasena,nombre,nickname,apPaterno,apMaterno from Vendedores where idVendedor='".$idVendedor."'  ;";
    $res=mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($res);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Vendedor</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                    <form action="panelLoginVendedor.php?modulo=editarVendedor" method="post">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" name="correo" class="form-control" value="<?php echo $row['correo'] ?>" required="requiered" >
                        </div>
                        <div class="form-group">
                          <label>Contraseña</label>
                          <input type="password" name="contrasena" class="form-control" value="<?php echo $row['contrasena'] ?>" required="requiered" >
                        </div>
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" name="nombre" class="form-control" value="<?php echo $row['nombre'] ?>" required="requiered">
                        </div>
                        <div class="form-group">
                          <label>Apodo</label>
                          <input type="text" name="nickname" class="form-control" value="<?php echo $row['nickname'] ?>" required="requiered">
                        </div>
                        <div class="form-group">
                          <label>Apellido Paterno</label>
                          <input type="text" name="apPaterno" class="form-control" value="<?php echo $row['apPaterno'] ?>" required="requiered"> 
                        </div>
                        <div class="form-group">
                          <label>Apellido Materno</label>
                          <input type="text" name="apMaterno" class="form-control" value="<?php echo $row['apMaterno'] ?>" required="requiered">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                        </div>
                        

                    </form> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>