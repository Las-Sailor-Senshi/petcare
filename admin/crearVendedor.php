<?php
    if( isset($_REQUEST['guardar'])){

        include_once "db_ecommerce.php";
        $con=mysqli_connect($host, $user, $dbpass, $db);

        $idVendedor= mysqli_real_escape_string($con , $_REQUEST['idVendedor']??'');
        $correo= mysqli_real_escape_string($con , $_REQUEST['correo']??'');
        $contrasena=mysqli_real_escape_string($con , $_REQUEST['contrasena']??'');
        $nombre= mysqli_real_escape_string($con , $_REQUEST['nombre']??'');
        $nickname= mysqli_real_escape_string($con , $_REQUEST['nickname']??'');
        $apPaterno= mysqli_real_escape_string($con , $_REQUEST['apPaterno']??'');
        $amMaterno= mysqli_real_escape_string($con , $_REQUEST['amMaterno']??'');

        $query="INSERT INTO Vendedores
            (idVendedor            ,correo           ,contrasena  ,nombre      ,nickname           ,apPaterno        ,amMaterno) VALUES
            ('".$idVendedor."',  '".$correo."', '".$contrasena."','".$nombre."',  '".$nickname."' , '".$apPaterno."', '".$amMaterno."');
        ";
        $res= mysqli_query($con,$query);
        if($res){
            //Aqui hay un error no manda el mensaje 
            echo '<meta http-equiv="refresh" content="0; url= panel.php?modulo=Vendedores&&mensaje="Vendedor creado exitosamente" />';
        }
        else{
            ?>
            <div class="alert alert-danger" role="alert">
                Error al crear vendedor <?php echo mysqli_error($con); ?>
            </div>
            <?php
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear vendedor</h1>
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
              <!-- Aqui borra el compa de los videos la tabla que está en vendedores.php example2 -->
                    <form action="panel.php?modulo=crearVendedor" method="post">

                        <div class="form-group">
                          <label>idVendedor</label>
                          <input type="int" name="idVendedor" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="email" name="correo" class="form-control">
                            <!--Borra esto
                          <small id="helpId" class="text-muted">Help text</small>
                            -->
                        </div>
                        <div class="form-group">
                          <label>Contraseña</label>
                          <input type="password" name="contrasena" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" name="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Apodo</label>
                          <input type="text" name="nickname" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Apellido Paterno</label>
                          <input type="text" name="apPaterno" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Apellido Materno</label>
                          <input type="text" name="amMaterno" class="form-control">
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