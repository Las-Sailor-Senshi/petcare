<?php
   
    $total=$_REQUEST['total']??'';

    include_once "stripe/init.php";

    \Stripe\Stripe::setApiKey("sk_test_51ISpEHCvI3J2RwLctmxJjh6jQbVR0YABezCR978OWYkcBS7dCNE89yUhilM2ZDHUqF1aHzizhYFCWVxLV0SyMU8U00WBOJFGb2");

    $toke=$_POST['stripeToken'];
    $charge=\Stripe\Charge::create([
        'amount'=>$total,
        'currency'=>'usd',
        'description'=>'Pago de ecommerce',
        'source'=>$toke
    ]);
    if($charge['captured']){
        $queryVenta="INSERT INTO Ordenes
        (idCliente,idPago,fecha)  VALUES
        ('".$_SESSION['idCliente']."','".$charge['id']."',now());";
        $resVenta=mysqli_query($con,$queryVenta);
        $id=mysqli_insert_id($con);
        if($resVenta){
        }
        $insertaDetalle="";
        $cantProd=count($_REQUEST['id']);
        for($i=0;$i<$cantProd;$i++){
            $subTotal=$_REQUEST['precio'][$i]*$_REQUEST['cantidad'][$i];
            $insertaDetalle=$insertaDetalle."('".$_REQUEST['id'][$i]."','$id','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['precio'][$i]."','$subTotal'),";
        }
        $insertaDetalle=rtrim($insertaDetalle,",");
        $queryDetalle="INSERT INTO DetallesOrdenes 
        /*(id, idProd, idVenta, cantidad, precio, subTotal) values */
        (idCliente, idDetalleOrden, idCarrito, subTotal, total) VALUES
        $insertaDetalle;";
        $resDetalle=mysqli_query($con,$queryDetalle);
        if($resVenta && $resDetalle){
            ?>
            <div class="row">
                <div class="col-6">
                    <?php muestraRecibe($id); ?>
                </div>
                <div class="col-6">
                    <?php muestraDetalle($id); ?>
                </div>
            </div>
            <?php
            borrarCarrito();
        }
    }

    function borrarCarrito(){
        ?>
            <script>
                $.ajax({
                    type: "post",
                    url: "ajax/borrarCarrito.php",
                    dataType: "json",
                    success: function (response) {
                        $("#badgeProducto").text("");
                        $("#listaCarrito").text("");
                    }
                });
            </script>
        <?php
    }

    function muestraRecibe($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-cen">Persona que recibe</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    global $con;
                    $queryRecibe="SELECT nombre,email,direccion 
                    from recibe 
                    where idCli='".$_SESSION['idCliente']."';";
                    $resRecibe=mysqli_query($con,$queryRecibe);
                    $row=mysqli_fetch_assoc($resRecibe);
                ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['direccion'] ?></td>
                </tr>
            </tbody>
        </table>
        <?php
     }
     function muestraDetalle($idVenta){
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th colspan="3" class="text-center">Detalle de venta</th>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    global $con;
                    $queryDetalle="SELECT
                    p.nombre,
                    dv.cantidad,
                    dv.precio,
                    dv.subTotal
                    FROM
                    ventas AS v
                    INNER JOIN detalleVentas AS dv ON dv.idVenta = v.id
                    INNER JOIN productos AS p ON p.id = dv.idProd
                    WHERE
                    v.id = '$idVenta'";
                    $resDetalle=mysqli_query($con,$queryDetalle);
                    $total=0;
                    while($row=mysqli_fetch_assoc($resDetalle)){
                        $total=$total+$row['subTotal'];
                ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><?php echo $row['subTotal'] ?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" class="text-right">Total:</td>
                    <td><?php echo $total; ?></td>
                </tr>

            </tbody>
        </table>
        <?php
        }
?>