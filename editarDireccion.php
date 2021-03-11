<?php
if (isset($_REQUEST['guardar'])) {
    $idC = mysqli_real_escape_string($con, $_REQUEST['idC'] ?? '');
    $idDir = mysqli_real_escape_string($con, $_REQUEST['idD'] ?? '');
    $cYn = mysqli_real_escape_string($con, $_REQUEST['cal'] ?? '');
    $col = mysqli_real_escape_string($con, $_REQUEST['col'] ?? '');
    $del = mysqli_real_escape_string($con, $_REQUEST['del'] ?? '');
    $est = mysqli_real_escape_string($con, $_REQUEST['est'] ?? '');
    $cp = mysqli_real_escape_string($con, $_REQUEST['cp'] ?? '');
    $tel_1 = mysqli_real_escape_string($con, $_REQUEST['tel_1'] ?? '');
    $tel_2 = mysqli_real_escape_string($con, $_REQUEST['tel_2'] ?? '');
    $query = "UPDATE Direcciones SET 
    idCliente='" . $idC . "',idDireccion='" . $idDir . "',calle_num='" . $cYn . "',
    colonia='" . $col . "',delMio='" . $del . "',estado='" . $est . "',
    codigoPostal='" . $cp . "',telefono_1='" . $tel_1 . "',telefono_2='" . $tel_2 . "' 
    WHERE idDireccion='" . $idDir . "' ";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo '<meta http-equiv="refresh" content="0; url=index.php?modulo=envio"/>';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
$idDir = mysqli_real_escape_string($con, $_REQUEST['idDir'] ?? '');
$query = "SELECT * FROM Direcciones WHERE idDireccion='" . $idDir . "'; ";
$res = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($res);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar dirección de usuario</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?modulo=editarDireccion" method="post">
                        <div class="form-group">
                            <label>Calle y numero</label>
                            <input type="text" name="cal" class="form-control" value="<?php echo $row['calle_num'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Colonia</label>
                            <input type="text" name="col" class="form-control" value="<?php echo $row['colonia'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Delegación</label>
                            <input type="text" name="del" class="form-control" value="<?php echo $row['delMio'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="est" class="form-control" value="<?php echo $row['estado'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Codigo postal</label>
                            <input type="int" name="cp" class="form-control" value="<?php echo $row['codigoPostal'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Telefono 1</label>
                            <input type="int" name="tel_1" class="form-control" value="<?php echo $row['telefono_1'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Telefono 2</label>
                            <input type="int" name="tel_2" class="form-control" value="<?php echo $row['telefono_2'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="idD" value="<?php echo $row['idDireccion'] ?>"> 
                            <input type="hidden" name="idC" value="<?php echo $row['idCliente'] ?>">
                            <button onclick="location.href='index.php?modulo=envio'" class="btn btn-warning" role="button">Regresar a envio</button>
                            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>