<?php
include_once "db_ecommerce.php";
$con = mysqli_connect($host,$user, $dbpass, $db);

$name =mysqli_real_escape_string($con , $_REQUEST['name']??'');
$id =mysqli_real_escape_string($con , $_REQUEST['id']??'');

if(isset($_REQUEST['idBorrarProducto'])){
  $idProducto=mysqli_real_escape_string($con,$_REQUEST['idBorrarProducto']??'');
  $query="DELETE from Productos where idProducto='".$idProducto."'; ";
  $res=mysqli_query($con, $query);
  if($res){
    ?>
      <div class="alert alert-warning float-right" role="alert">
        Producto borrado exitosamente
      </div>
    <?php
  }else{
    ?>
      <div class="alert alert-danger float-danger" role="alert">
        ERROR AL BORRAR <?php echo mysqli_error($con); ?>
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
            <h1>Productos - Categoria <?php echo $name?></h1>
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
                <table id="tablaProductosPorCategoria" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                  </thead>
                  <tbody>
                      <!-- Conexion de la base para los productos -->
                    <?php
                        $query="SELECT idProducto, nomProducto,stock, precio FROM Productos WHERE idCategoria = '".$id."'";
                        $res= mysqli_query($con,$query);
                        while( $row= mysqli_fetch_assoc($res) ){
                     ?>
                            <tr>
                                <td><?php echo $row['idProducto']?></td>
                                <td><?php echo $row['nomProducto']?></td>
                                <td><?php echo $row['stock']?></td>
                                <td><?php echo $row['precio']?></td>
                                <td>
                                  <a href="panelLoginVendedor.php?modulo=editarProducto&idProducto=<?php echo $row['idProducto']?>" style="margin-right: 10px;" ><i class="fas fa-edit  "></i></a>
                                  <a href="panelLoginVendedor.php?modulo=verProductos&idBorrarProducto=<?php echo $row['idProducto'] ?>" class="text-danger borrar" ><i class="fas fa-trash  "></i></a>
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