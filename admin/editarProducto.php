<?php
  include_once "db_ecommerce.php";
  $con=mysqli_connect($host, $user, $dbpass, $db);

  if( isset($_REQUEST['guardar'])){

        $idProducto= mysqli_real_escape_string($con , $_REQUEST['idProducto']??'');
        $nomProducto= mysqli_real_escape_string($con , $_REQUEST['nomProducto']??'');
        $stock=mysqli_real_escape_string($con , $_REQUEST['stock']??'');
        $precio= mysqli_real_escape_string($con , $_REQUEST['precio']??'');
        $descripcion= mysqli_real_escape_string($con , $_REQUEST['descripcion']??'');

        $query="UPDATE Productos SET
         nomProducto = '".$nomProducto."', stock = '".$stock."', precio = '".$precio."', descripcion = '".$descripcion."' 
         WHERE idProducto = '".$idProducto."'";
      $res= mysqli_query($con,$query);
      if($res){
        echo '<meta http-equiv="refresh" content="0; url=panelLoginVendedor.php?modulo=catalogo&mensaje=Producto editado exitosamente" /> ';

      }
      else{
          ?>
              <div class="alert alert-danger" role="alert">
                  Error al editar producto <?php echo mysqli_error($con); ?>
              </div>
          <?php
      }
  }
  $idProducto=mysqli_real_escape_string($con, $_REQUEST['idProducto']??'');
  $query="SELECT  idProducto, nomProducto, stock, precio, descripcion from Productos where idProducto='".$idProducto."'  ;";
  $res=mysqli_query($con, $query);
  $row=mysqli_fetch_assoc($res);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Producto</h1>
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

                    <form action="panelLoginVendedor.php?modulo=editarProducto&idProducto=<?php echo $row['idProducto']?>" method="post">

                                <div class="form-group">
                                <label>Nombre Producto</label>
                                <input type="text" name="nomProducto" class="form-control" value ="<?php echo $row['nomProducto'] ?>"  required="requiered" >
                                </div>
                                <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control" value ="<?php echo $row['stock'] ?>"  required="requiered">
                                </div>
                                <div class="form-group">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value ="<?php echo $row['precio'] ?>"  required="requiered">
                                </div>
                                <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control"  value ="<?php echo $row['descripcion'] ?>"  required="requiered"> 
                                </div>
                                
                                <!-- Para editar las imagenes 
                                <div class="form-group">
                                <label>Imagenes</label>
                                <input type="image" name="imagenes" class="form-control"  required="requiered">
                                </div>
                                -->
                                <div class="form-group">
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
  </div>
