<?php
  include_once "db_ecommerce.php";
  $con=mysqli_connect($host, $user, $dbpass, $db);
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

                  <?php
                  if(isset($_GET['id'])){
                    $id= $_GET['id'];
                  } else {
                    $id = "";
                  }
//                    $id = $_GET['id'];
                    $query = "SELECT * FROM Productos WHERE idProducto = '".$id."'";
                    $res= mysqli_query($con,$query);

                    while( $row= mysqli_fetch_assoc($res) ){
                  ?>

                    <form action="panelLoginVendedor.php?modulo=editarProducto" method="post">
                        <table id="tablaEditarProducto" class="table table-bordered table-hover">
                            <tbody>
                                <div class="form-group">
                                <label>Nombre Producto</label>
                                <input type="text" name="nombreProducto" class="form-control" value ="<?php echo $row['nomProducto'] ?>">
                                </div>
                                <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control" value ="<?php echo $row['stock'] ?>">
                                </div>
                                <div class="form-group">
                                <label>Precio</label>
                                <input type="text" name="precio" class="form-control" value ="<?php echo $row['precio'] ?>">
                                </div>
                                <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" class="form-control"  value ="<?php echo $row['descripcion'] ?>">
                                </div>
                                <div class="form-group">
                                <label>Imagenes</label>
                                <input type="image" name="imagenes" class="form-control">
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                                        <button type="submit" class="btn btn-primary" name="cancelar">Cancelar</button>
                                </div>
                            </tbody>
                        </table>                    
                    </form> 
                <?php } ?>
                

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
    if( isset($_REQUEST['guardar'])){

     //   include_once "db_ecommerce.php";
    //    $con=mysqli_connect($host, $user, $dbpass, $db);
          $nombreProducto = $_GET['nombreProducto'];
          $stock = $_GET['stock'];
          $precio = $_GET['precio'];
          $descripcion = $_GET['descripcion'];


//        $nombreProducto= mysqli_real_escape_string($con , $_REQUEST['nombreProducto']??'');
  //      $stock=mysqli_real_escape_string($con , $_REQUEST['stock']??'');
    //    $precio= mysqli_real_escape_string($con , $_REQUEST['precio']??'');
      //  $descripcion= mysqli_real_escape_string($con , $_REQUEST['descripcion']??'');
      //Falta el de imagenes
        //   $imagenes= mysqli_real_escape_string($con , $_REQUEST['imagenes']??'');

        $query2="UPDATE Productos set nomProducto = '".$nombreProducto."', stock = '".$stock."', precio = '".$precio."', descripcion = '".$descripcion."' WHERE idProducto = '".$id."'";
        $res2= mysqli_query($con,$query2);
        if($res2){
          //Ya lo manda pero no se ve 
          echo '<meta http-equiv="refresh" content="0; url=panelLoginVendedor.php?modulo=verProductos" /> ';
        }
        else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al editar producto <?php echo mysqli_error($con); ?>
                </div>
            <?php
        }
    }
?>