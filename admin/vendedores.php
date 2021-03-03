<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vendedores</h1>
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
                    <th>Nombre</th>
                    <th>Correo-E</th>
                    <th>Acciones
                    <!-- Crear vendedor, modifique el correo a unique en la bd tambien -->
                     <a href="panelLoginVendedor.php?modulo=crearVendedor"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     </th> 
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Conexion de la base para los vendedores -->
                    <?php
                        include_once "db_ecommerce.php";
                        $con=mysqli_connect($host, $user, $dbpass, $db);
                        $query="SELECT idVendedor,correo,nombre FROM Vendedores; ";
                        $res= mysqli_query($con,$query);

                        while( $row= mysqli_fetch_assoc($res) ){
                     ?>
                            <tr>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['correo'] ?></td>
                                <td>
                                    <a href="editarVendedor.php?id=<?php echo $row['idVendedor'] ?>" style="margin-right: 10px;" ><i class="fas fa-edit  "></i></a>
                                    <a href="vendedores.php?idBorrar=<?php echo $row['idVendedor'] ?> " class="text-danger" ><i class="fas fa-trash  "></i></a>
                                </td>
                            </tr>
                 <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>