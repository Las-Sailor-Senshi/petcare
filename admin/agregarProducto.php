<?php
 //   $idCategoria =$_REQUEST['idCategoria'];
    include_once "db_ecommerce.php";
    $con = mysqli_connect($host,$user, $dbpass, $db);
    $idCategoria =(int)mysqli_real_escape_string($con , $_REQUEST['idCategoria']??'');

    if( isset($_REQUEST['guardar'])){

        $idProducto= mysqli_real_escape_string($con , $_REQUEST['idProducto']??'');
        $nomProducto= mysqli_real_escape_string($con , $_REQUEST['nomProducto']??'');
        $precio=mysqli_real_escape_string($con , $_REQUEST['precio']??'');
        $stock= mysqli_real_escape_string($con , $_REQUEST['stock']??'');
        $descripcion= mysqli_real_escape_string($con , $_REQUEST['descripcion']??'');

        $query="INSERT INTO Productos
            (idCategoria, idProducto, nomProducto, precio, stock ,descripcion) VALUES
            ('".$idCategoria."','".$idProducto."',   '".$nomProducto."', '".$precio."','".$stock."',  '".$descripcion."');
        ";
        $res= mysqli_query($con,$query);
        if($res){
            //Funciona perfecto 
            echo '<meta http-equiv="refresh" content="0; url=panelLoginVendedor.php?modulo=verProductos&mensaje=Producto agregado exitosamente" /> ';

        }
        else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al crear producto <?php echo mysqli_error($con); ?>
                </div>
            <?php
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar producto<?php echo $idCategoria?></h1>
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
                    <form action="panelLoginVendedor.php?modulo=agregarProducto" method="post">
                    
                        <div class="form-group" style="display: none">
                          <label>ParaQueNodeErrorEnElInsert</label>
                          <input type="number" name="idCategoria" class="form-control" required="requiered" value=<?php echo $idCategoria?>>
                        </div>
                        <div class="form-group">
                          <label>Id Producto</label>
                          <input type="number" name="idProducto" class="form-control" required="requiered">
                        </div>
                        <div class="form-group">
                          <label>Nombre del producto</label>
                          <input type="text" name="nomProducto" class="form-control" required="requiered">

                        </div>
                        <div class="form-group">
                          <label>Precio</label>
                          <input type="number" step="any" name="precio" class="form-control" required="requiered">
                        </div>
                        <div class="form-group">
                          <label>Stock</label>
                          <input type="int" name="stock" class="form-control" required="requiered">
                        </div>
                        <div class="form-group">
                          <label>Descripcion</label>
                          <input type="text" name="descripcion" class="form-control" required="requiered">
                        </div>
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