<?php
    include "Database/config.php";
    session_start();
    if(isset($_GET["logOut"])){
        $_SESSION["IsULogin"] = 0;
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang = "en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--we have added this view port tag and set initial scale to 1 so that our side shoudl be adjustable according to different devices especially for mobile devices-->
        <title>RedStore | The #1 Ecommerce Website </title>
        <link rel="stylesheet" href="CSS/style.css"> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"><!--poppins font from google fonts website then select popping select some types and then embed-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><!--link to connect to font awesome 4 to use different icons, just type font awesome 4 cdn and click on first link and copy the url and past it here with rel="stylesheet"-->
    </head>

    <body>

        <!--making header-->
    <div class="header">
        <div class="container">

            <!--making navigation bar consist of logo and menu links-->
            <div class="navbar">
                <div class="logo">
                    <a href="./"><img src="images/logo.png" alt="RedStore logo" width=200px></a>
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
                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" alt="cart" width=30px height=30px></a><!--adding cart image in navigation section -->
                <img src="images/menu.png" class="menu-icon" onclick="menutoggle()"><!--this is the menu icon which  will be displayed on smaller screens with 3 lines, and when we click on it, it will open upside down or like dropdown menu, to open like this we have pass one menutoggle function to it which we have written in the end in js-->
            </div>

        
            <!--making another section in header class container-->
            <div class="row">

                <!--dividing this section into 2 columns-->
                <!--1st column for heading button and text-->
                <div class="col-2">
                    <h1>Give Your Workout<br>A New Style!</h1>
                    <p>Success isn't always about greatness. It's about consistency.
                    Consistent <br>hard work gains success. Greatness will come.
                    </p>
                    <a href="" class="btn">Buy Now &#8594;</a><!--where &#8594 is the code of arrow icon in explore now button-->
                </div>

                <!--2nd for image-->
                <div class="col-2">
                    <img src="images/banner1.png" alt="header image">
                </div>

            </div>
        </div>
    </div>

    <div class="categories">
        <div class="small container">,<!--container class to edit images section-->
            <div class="row">

                <!--3 columns for 3 images-->
                <div class="col-3">
                    <img src="images/pro1.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/pro2.jpg" alt="">
                </div>
                <div class="col-3">
                    <img src="images/pro3.jpg" alt="">
                </div>
    
            </div>
        </div>

    </div>
     
     <div class="small container">
        <h2 class="title">Latest Products</h2>
        <div class="row">
        <?php 
            $sql1 = "SELECT * FROM Product ORDER BY ProductId DESC LIMIT 8";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-4">
            <a href="product-detail.php?pid=<?php echo $row["ProductId"];?>">
                <img src="upload/<?php echo $row["Image"]; ?>">
                <h4><?php echo $row["Title"]; ?></h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                    <p>$<?php echo $row["Price"]; ?>.00</p>
        </a>
        </div>
        <?php
                }
            }
        ?>
        </div>
    </div>

    <div class="offer">
        <div class="container">
            <div class="row">
                
                <div class="col-2">
                   <img src="images/exclusive.png" class="offer-img"> 
                </div>

                <div class="col-2">
                    <p>Exclusively available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <small>
                        The Mi Smart Band 4 features a 39.9% larger (than Mi Band 3) AMOLED color full-touch display with adjustable brightness, so everything is clear as can be
                    </small>
                    <a href="" class="btn">Buy Now &#8594;</a>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="testimonial">
        <div class="small container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the prinitng and typesetting industry. Lorem Ipsum has been the industry;s standard dummy text ever
                    </p>
                    <div class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                     </div>
                     <img src="images/user-1.png">
                     <h3>Sean Parker</h3>
                </div>

                <div class="col-3"><!--3 columns-->

                    <!--add " or left quote before comment-->
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the prinitng and typesetting industry. Lorem Ipsum has been the industry;s standard dummy text ever
                    </p>
                    <div class="rating"><!--add stars for rating of product from font awesome 4-->
                        <i class="fa fa-star" aria-hidden="true"></i><!--add 4 black start and one transparent star to show 4 out of 5 rating-->
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                     </div>
                     <img src="images/user-2.png"><!--image of person-->
                     <h3>Mike Smith</h3><!--name of person-->
   
                </div>

                <div class="col-3"><!--3 columns-->

                    <!--add " or left quote before comment-->
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    <p>
                        Lorem Ipsum is simply dummy text of the prinitng and typesetting industry. Lorem Ipsum has been the industry;s standard dummy text ever
                    </p>
                    <div class="rating"><!--add stars for rating of product from font awesome 4-->
                        <i class="fa fa-star" aria-hidden="true"></i><!--add 4 black start and one transparent star to show 4 out of 5 rating-->
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                     </div>
                     <img src="images/user-3.png"><!--image of person-->
                     <h3>Mable Joe</h3><!--name of person-->
   
                </div>

            </div>
        </div>
    </div>

    <!----------brands-------------->

    <div class="brands">
        <div class="small container">
            <div class="row">
                <div class="col-5">
                     <img src="images/logo-godrej.png">
                </div>

                <div class="col-5">
                    <img src="images/logo-oppo.png">
               </div>


               <div class="col-5">
                <img src="images/logo-coca-cola.png">
                </div>


                <div class="col-5">
                 <img src="images/logo-paypal.png">
                </div>


                 <div class="col-5">
                   <img src="images/logo-philips.png">
                </div>

            </div>
        </div>
    </div>
    
    <?php
        include "components/footer.php"
    ?>