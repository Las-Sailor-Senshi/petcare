<div class="row mt-1">
    <?php
    $query = "SELECT 
                        p.idProducto,
                        p.nomProducto,
                        p.precio,
                        p.stock,
                        ip.imagenProducto
                        FROM
                        Productos AS p
                        INNER JOIN ImagenesProductos AS ip ON ip.idProducto = p.idProducto";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card border-primary">
                <img class="card-img-top img-thumbnail" src="data:image/jpeg;base64,<?php echo base64_encode($row['imagenProducto']); ?>" width="100" height="100" style="max-width:100%" style="max-height:100%" />
                <div class="card-body">
                    <h2 class="card-title"><strong><?php echo $row['nomProducto'] ?></strong></h2>
                    <p class="card-text"><strong>Precio:</strong><?php echo $row['precio'] ?></p>
                    <p class="card-text"><strong>Stock:</strong><?php echo $row['stock'] ?></p>
                    <a href="index.php?modulo=detalleproducto&id" class="btn btn-primary">Ver</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>