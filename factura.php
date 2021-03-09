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
        if($resVenta){
            echo "La venta fue exitosa con el id=".$id;
        }
    }
?>