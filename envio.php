<?php
if (isset($_REQUEST['idBorrar'])) {
  $id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');
  $query = "DELETE FROM Direcciones WHERE idDireccion='" . $id . "';";
  $res = mysqli_query($con, $query);
  if ($res) {
?>
    <div class="alert alert-warning float-right" role="alert">
      Dirección borrada con exito
    </div>
  <?php
  } else {
  ?>
    <div class="alert alert-danger float-right" role="alert">
      Error al borrar <?php echo mysqli_error($con); ?>
    </div>
<?php
  }
}
?>
<?php
if (isset($_SESSION['idCliente'])) {
?>
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Seleccione una dirección de envio</h1>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Calle & Numero</th>
                                        <th>Colonia</th>
                                        <th>Delegación</th>
                                        <th>Estado</th>
                                        <th>C.P.</th>
                                        <th>Telefono 1</th>
                                        <th>Telefono 2</th>
                                        <th>Nueva dirección <a href="index.php?modulo=agregarDir"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $idC = $_SESSION['idCliente'];
                                    $query = "SELECT * FROM Direcciones WHERE idCliente='" . $idC . "'; ";
                                    $res = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['calle_num'] ?></td>
                                            <td><?php echo $row['colonia'] ?></td>
                                            <td><?php echo $row['delMio'] ?></td>
                                            <td><?php echo $row['estado'] ?></td>
                                            <td><?php echo $row['codigoPostal'] ?></td>
                                            <td><?php echo $row['telefono_1'] ?></td>
                                            <td><?php echo $row['telefono_2'] ?></td>
                                            <td>
                                                <button onclick="location.href='index.php?modulo=pasarela&idDireccion=<?php echo $row['idDireccion'] ?>'" class="btn btn-primary" role="button">Seleccionar | Ir a pagar</button>
                                                <hr>
                                                <a href="index.php?modulo=editarDireccion&idDir=<?php echo $row['idDireccion'] ?>" style="margin-right: 25px;"><i class="fas fa-edit"></i></a>
                                                <a href="index.php?modulo=envio&idBorrar=<?php echo $row['idDireccion'] ?>" class="text-danger borrar" ><i class="fas fa fa-trash"></i></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <a name="" id="" class="btn btn-warning" href="index.php?modulo=carrito" role="button">Regresar a carrito</a>    
<?php                        
} else {
?>
    <section class="content-header">
        <hr>
        <div class="mt-5 text-center">
            Debe <a href="login.php">iniciar sesión</a> ó <a href="registro.php">registrarse</a>
        </div>
    </section>
    <hr>
<?php
}
?>