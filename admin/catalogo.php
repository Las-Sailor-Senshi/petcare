<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host,$user, $dbpass, $db);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogo</h1>
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
                    <th>Categoria</th>
                    <th>Cantidad de productos //No esta bien la consulta</th>
                    <th>Acciones</th>
                  </thead>
                  <tbody>
                      <!-- Conexion de la base para los vendedores -->
                    <?php
                        //La consulta deberia regresar el nombre de cada categoria y la cantidad de productos que pertenecen a cada categoria
                        //Pero no lo hace xd
                        $query="SELECT idCategoria, nomCategoria FROM Categorias";
                        $res= mysqli_query($con,$query);
                        while( $row= mysqli_fetch_assoc($res) ){
                     ?>
                            <tr>
                                <td><?php echo $row['nomCategoria'] ?></td>
                                <td><?php echo $row['idCategoria'] ?></td>
                                <td>

                                    <a href="panelLoginVendedor.php?modulo=verProductos>" style="margin-right: 10px;">Ver productos</a>
                                    <a href="editarCategoria.php?id=<?php echo $row['idCategoria'] ?>" style="margin-right: 10px;" ><i class="fas fa-edit  "></i></a>
                                    <a href="borrarCategoria.php?idBorrar=<?php echo $row['idCategoria'] ?> " class="text-danger" ><i class="fas fa-trash  "></i></a>
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