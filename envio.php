<?php
if (isset($_SESSION['idCliente'])) {
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Dirección de <?php echo $_SESSION['nombreCliente']; ?></h1>
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
                                            <th><a href="panel.php?modulo=agregarDir.php"><i class="fa fa-plus" aria-hidden="true"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM Direcciones; ";
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
                                                <td><input type="checkbox" class="form-check-input" id="jalar"></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
<?php
} else {
    ?>
        <div class="mt-5 text-center">
            Debe <a href="login.php">iniciar sesión</a> ó <a href="registro.php">registrarse</a>
        </div>
    <?php
}
?>