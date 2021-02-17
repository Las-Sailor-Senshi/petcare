<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detalles de Venta</h1>
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
              <!-- PHP para pedir datos a las base de datos -->
              <?php

              include_once "db_ecommerce.php";
              $con=mysqli_connect($host, $user, $dbpass, $db);

              $query="SELECT IdOrden,
                        calle_num,
                        colonia,
                        delMio,
                        estado,
                        codigoPostal,
                        fecha,
                        Clientes.nombre,
                        Clientes.apPaterno,
                        Clientes.apMaterno,
                        Productos.nomProducto,
                        Carritos.cantidadPiezas,
                        Productos.precio,
                        (Carritos.cantidadPiezas * Productos.precio) as Importe,
                        DetallesOrdenes.total
	                    FROM DetallesOrdenes
	                      INNER JOIN Ordenes
	                      INNER JOIN Clientes
	                      INNER JOIN Direcciones
                        INNER JOIN Carritos
	                      INNER JOIN Productos
	                    WHERE idOrden = 602
	                      AND Ordenes.idDetalleOrden = DetallesOrdenes.idDetalleOrden
                        AND Ordenes.idCliente = Clientes.idCliente
                        AND Ordenes.idDireccion = Direcciones.idDireccion
                        AND DetallesOrdenes.idCarrito = Carritos.idCarrito
                        AND Carritos.idProducto = Productos.idProducto;";

              $res= mysqli_query($con,$query);
              ?>
              <!-- Tarjetas de información -->
              <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">ID de Venta</span>
                      <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-calendar"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Fecha</span>
                      <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-map"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Dirección</span>
                      <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Comprador</span>
                      <span class="info-box-number">410</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>

              <!-- Tabla de Productos -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Precio Unitario</th>
                  <th>Importe</th>
                </tr>
                </thead>
                <tbody>
                <?php

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
                  <a class="btn btn-info btn-sm" href="panel.php?modulo=detallesVentas" role="button">
                    Ver Detalles
                  </a>
                  </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th></th>
                </tr>
                </tfoot>
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
