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
        (idCliente,idPago,fecha) VALUES
        ('".$_SESSION['idCliente']."','".$charge['id']."',now());";
        $resVenta=mysqli_query($con,$queryVenta);
        $id=mysqli_insert_id($con);
        /*if($resVenta){
            echo "La venta fue exitosa con el id=".$id;
        }*/
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

        }
    }
?>