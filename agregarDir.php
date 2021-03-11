<?php
if (isset($_REQUEST['guardar'])) {

  $idC=$_SESSION['idCliente'];
  $idDir = mysqli_real_escape_string($con , $_REQUEST['idDir']??'');
  $calle = mysqli_real_escape_string($con, $_REQUEST['calle'] ?? '');
  $colonia = mysqli_real_escape_string($con, $_REQUEST['colonia']??'');
  $estado = mysqli_real_escape_string($con, $_REQUEST['delegacion']??'');
  $delegacion = mysqli_real_escape_string($con, $_REQUEST['estado']??'');
  $cp = mysqli_real_escape_string($con, $_REQUEST['cp']??'');
  $tel_1 = mysqli_real_escape_string($con, $_REQUEST['tel_1']??'');
  $tel_2 = mysqli_real_escape_string($con, $_REQUEST['tel_2']??'');

  $query = "INSERT INTO Direcciones
        (idCliente,idDireccion,calle_num,colonia,delMio,estado,codigoPostal,telefono_1,telefono_2) 
        VALUES 
        ('" . $idC . "','" . $idDir . "','" . $calle . "','" . $colonia . "','" . $delegacion . "','" . $estado . "','" . $cp . "','" . $tel_1 . "','" . $tel_2 . "');
        ";
  $res = mysqli_query($con, $query);
  if ($res) {
    echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=envio"/>';
  } else {
?>
    <div class="alert alert-danger" role="alert">
      Error al guardar <?php echo mysqli_error($con); ?>
    </div>
<?php
  }
}
?>
<!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar nueva dirección</h1>
        </div>
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
              <form action="index.php?modulo=agregarDir" method="post">
                <div class="form-group">
                  <label>Id direccion (Cualquier numero)</label>
                  <input type="int" name="idDir" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Calle y numero</label>
                  <input type="text" name="calle" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Colonia</label>
                  <input type="text" name="colonia" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Delegación</label>
                  <input type="text" name="delegacion" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Estado</label>
                  <input type="text" name="estado" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Codigo postal</label>
                  <input type="int" name="cp" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Telefono 1</label>
                  <input type="int" name="tel_1" class="form-control" required="requiered">
                </div>
                <div class="form-group">
                  <label>Telefono 2</label>
                  <input type="int" name="tel_2" class="form-control" required="requiered">
                </div>

                <div class="form-group">
                  <button onclick="location.href='index.php?modulo=envio'" class="btn btn-warning" role="button">Regresar a envio</button>
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
