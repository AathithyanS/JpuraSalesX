<?php

include "components/header.php";

require_once('vendor/autoload.php');

$stripToken =  $_GET['stripeToken'];
$customerName =  $_GET['customerName'];
$email =  $_GET['email'];
$phone =  $_GET['phone'];
$address =  $_GET['address'];
$total =  $_GET['total'];
$uid = $_SESSION['uid'];

\Stripe\Stripe::setApiKey('sk_test_51MyGntHJZZKzKLNmhymYKY1MyMDGEH3gQ61yQtKMGSvqI6BzsLUlwxpOPLTbANwVXkplgLZG4WxdAWSqmWfdPNoD00YmPHGuUT');
$charge = \Stripe\Charge::create([
    'source' => $stripToken,
    'description' => "Purches form JpuraSalesX",
    'amount' => $total * 100,
    'currency' => 'usd',
  ]);

  $paymentId = $charge['id'];

  $sql = "INSERT INTO CustomerOrder (PaymentId, CustomerId, DateTime, Address, Phone, Email, Amount, Status) VALUES ( '$paymentId', $uid, NOW(), '$address', '$phone', '$email', $total, 'Waiting')";
        if(mysqli_query($conn, $sql)){
          if (!empty($_COOKIE['cart'])) {
            $last_uid = mysqli_insert_id($conn);
            $subTotal = 0;
            foreach ($_COOKIE['cart'] as $product_id => $product) {
                $quantity = $product['quantity'];
                $price = $product['price'];
                $subTotal += ($price * $quantity);
                $tax = 5/100.00 * $subTotal;
                $total = $subTotal + $tax;
                $last_id = mysqli_insert_id($conn);
                $sql = "INSERT INTO OrderProduct (OrderId, ProductId, Quantity) VALUES ($last_uid, $product_id, $quantity)";
                if(mysqli_query($conn, $sql)){
                  setcookie('cart['.$product_id.'][quantity]', 0, time() - 3600, "/");
                  setcookie('cart['.$product_id.'][price]', 0, time() - 3600, "/");
                  setcookie('cart['.$product_id.'][image_url]', '', time() - 3600, "/");
                  setcookie('cart['.$product_id.'][title]', '', time() - 3600, "/");
                }else{
                    echo "Error".mysqli_error($conn);
                }
        
            }
            header("Location: orders.php?now=true");
            exit();
          }
        }else{
            echo "Error".mysqli_error($conn);
        }
?>