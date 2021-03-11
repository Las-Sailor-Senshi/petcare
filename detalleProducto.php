<?php
    $id = mysqli_real_escape_string($con, $_REQUEST['id'] ?? '');
    $queryProducto ="SELECT idProducto, nomProducto, precio, stock, descripcion  FROM Productos WHERE  idProducto='$id';  ";
    $resProducto = mysqli_query($con, $queryProducto);
    $rowProducto = mysqli_fetch_assoc($resProducto);
?>

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nomProducto'] ?></h3>
                    <?php
                        $queryImagenes = "SELECT 
                        imagenProducto
                        FROM
                        ImagenesProductos AS ip
                        INNER JOIN Productos AS p ON ip.idProducto = p.idProducto
                        WHERE p.idProducto = '$id'
                        ";
                        $resPrimerImagen = mysqli_query($con, $queryImagenes);
                        $rowPrimerImaen=mysqli_fetch_assoc($resPrimerImagen);
                        ?>
                 <div class="col-12">
                     <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowPrimerImaen['imagenProducto']); ?>" class="product-image">
                </div>

                <div class="col-12 product-image-thumbs">
                    <?php
                        $resImagenes= mysqli_query($con,$queryImagenes);
                        while ($rowImagenes = mysqli_fetch_assoc($resImagenes)) {
                    ?>
                        <div class="product-image-thumb">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowImagenes['imagenProducto']); ?>" class="product-image">
                        </div>
                    <?php
                        }
                    ?>
                </div> 
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?php echo $rowProducto['nomProducto'] ?></h3>
                <p><?php echo $rowProducto['descripcion'] ?></p>
                <hr>
                <h4>Disponibles: <?php echo $rowProducto['stock'] ?></h4>

                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                    $<?php echo $rowProducto['precio']  ?>
                    </h2>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" id="agregarCarrito" 
                        data-id="<?php echo $_REQUEST['id'] ?>"
                        data-nombre="<?php echo $rowProducto['nomProducto'] ?>"
                        data-precio="<?php echo $rowProducto['precio'] ?>"
                      
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                    >
                        Agregar
                    </button>
                </div>

                <div class="mt-4">
                    Cantidad:
                    <input type="number" class="form-control" id="cantidadProducto" value="1">
                </div>

            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card --> 