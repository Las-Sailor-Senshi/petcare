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
                                        $idCliente=mysqli_real_escape_string($con , $_REQUEST['idCliente']??'');
                                        $query = "SELECT * FROM Direcciones WHERE idCliente='".$idCliente."'; ";
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
                                                <td><button type="submit" class="btn btn-primary" name="selec">Seleccionar</button></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="form group">
                            <label for="">Direccion</label>
                            <textarea name="direccionRec" id="direccionRec" class="form-control" row="3"></textarea>
                        </div>
                    </div>

                    <div class="col-6">
                        <h3>Datos de quien recibe</h3>
                        <div class="form group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombreCli" id="nombreCli" class="form-control">
                        </div>
                        <div class="form group">
                            <label for="">Email</label>
                            <input type="email" name="emailCli" id="emailCli" class="form-control">
                        </div>
                        <div class="form group">
                            <label for="">Direccion</label>
                            <textarea name="direccionCli" id="direccionCli" class="form-control" row="3"></textarea>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="jalar">
                                Jalar datos del cliente
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    
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