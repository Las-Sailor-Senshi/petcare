<?php
    include_once "stripe-php/init.php";
    
    \Stripe\Stripe::setApiKey("sk_test_51ISpEHCvI3J2RwLctmxJjh6jQbVR0YABezCR978OWYkcBS7dCNE89yUhilM2ZDHUqF1aHzizhYFCWVxLV0SyMU8U00WBOJFGb2");
    $token=$_POST['stripeToken'];

    $charge=\Stripe\Charge::create([
        'amount'=>1000,
        'currency'=>'usd',
        'description'=>'Pago a ecommerce',
        'source'=>$token
    ]);

    echo "<pre>";
    var_dump($charge);
    echo "</pre>";
?>