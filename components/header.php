<?php 
    include "Database/config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0"><!--we have added this view port tag and set initial scale to 1 so that our side shoudl be adjustable according to different devices especially for mobile devices-->
        <title>All Products - RedStore</title>
        <link rel="stylesheet" href="CSS/style.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"><!--poppins font from google fonts website then select popping select some types and then embed-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!--link to connect to font awesome 4 to use different icons, just type font awesome 4 cdn and click on first link and copy the url and past it here with rel="stylesheet"-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
    </head>

    <body>

        <div class="container">

            <!--making navigation bar consist of logo and menu links-->
            <div class="navbar">
                <div class="logo">
                    <a href="./">
                        <img src="images/logo.png" alt="RedStore logo" width=200px>
                    </a>
                </div>
    
                <!--menu-->
                 <nav> 
                    <ul id="MenuItems"><!--use this id in js-->                        
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Products.php">Products</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        
                        <?php 
                                if(isset($_SESSION["IsULogin"]) && $_SESSION["IsULogin"]){
                            ?>
                                <li><a href="Orders.php">Orders</a></li>
                                <li><a href="index.php?logOut=1">Logout</a></li>
                            <?php
                                }else{
                            ?>
                                <li><a href="account.php">Account</a></li>
                            <?php
                                }
                            ?>
                        </li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" alt="cart" width=30px height=30px></a>
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>