<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Información de Ventas</h1>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Guía de Envio</th>
                  <th>Link de tracking</th>
                  <th>Ver Detalle</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once "db_ecommerce.php";
                $con=mysqli_connect($host, $user, $dbpass, $db);

                $query="SELECT idOrden, numGuia FROM Ordenes;";

                $res= mysqli_query($con,$query);

                while ($row= mysqli_fetch_assoc($res)){
                ?>
                <tr>
                  <td>Venta #<?php echo $row['idOrden']?></td>
                  <td><?php echo $row['numGuia']?></td>
                  <td><a href="https://www.fedex.com/es-mx/home.html" target="_blank">Link de Tracking</a></td>
                  <td>
                  <a class="btn btn-info btn-sm" href="panelLoginVendedor.php?modulo=detallesVentas?idVenta=<?php echo $row['idOrden']?>" role="button">
                    Ver Detalles
                  </a>
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
