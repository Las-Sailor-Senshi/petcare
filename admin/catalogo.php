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
            <h1>Categorias</h1>
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
                <table id="tablaCategorias" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Acciones                     
                    </th>
                    
                  </thead>
                  <tbody>
                    <?php
                        $query="SELECT idCategoria, nomCategoria FROM Categorias";
                        $res= mysqli_query($con,$query);
                        while( $row= mysqli_fetch_assoc($res) ){
                     ?>
                            <tr>
                                <td><?php echo $row['nomCategoria'] ?></td>
                                <td>
                                    <a href="panelLoginVendedor.php?modulo=verProductos&id=<?php echo $row['idCategoria'] ?>&name=<?php echo $row['nomCategoria'] ?>" style="margin-right: 10px;">Ver productos</a>
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