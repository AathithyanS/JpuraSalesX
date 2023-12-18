<?php 

    include "components/header.php";

    $pid = "";
    if(isset($_GET["pid"])){
        $pid = $_GET['pid'];
    }else{
        $pid = $_POST['pid'];
    }
    $sql1 = "SELECT * FROM Product WHERE ProductId = ".$pid;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result); 

    $Title = $row["Title"];
    $Brand = $row["Brand"];
    $Price = $row["Price"];
    $Quantity = $row["Quantity"];
    $Details = $row["Details"];
    $Image = $row["Image"];
    $Date = $row["Date"];
    $IsLaptop = $row["IsLaptop"];

    if (isset($_POST['add_to_cart'])) {
        // Get the product ID and quantity
        $product_id = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
        $product_price = $_POST['product_price'];
        $product_image_url = $_POST['product_image_url'];
        $product_title = $_POST['product_title'];
        
        setcookie('cart['.$product_id.'][quantity]', $product_quantity, time() + (86400 * 30), "/");
        setcookie('cart['.$product_id.'][price]', $product_price, time() + (86400 * 30), "/");
        setcookie('cart['.$product_id.'][image_url]', $product_image_url, time() + (86400 * 30), "/");  
        setcookie('cart['.$product_id.'][title]', $product_title, time() + (86400 * 30), "/");   
        
        header('Location: cart.php');
    }
?>
    <div class="small-container single-product">
        <div class="row"  style="padding-left: 16.5%; padding-right: 16.5%;">
            <div class="col-2">
                    <img src="upload/<?php echo $Image; ?>" id="product-img">
                    <div class="small-img-row">
                        
                    <!-- <div class="small-img-col">
                            <img src="upload/<?php echo $Image; ?>" width="100%" class="small-img">
                    </div>

                    <div class="small-img-col">
                        <img src="images/gallery-2.jpg" width="100%" class="small-img">
                    </div>
                    
                    <div class="small-img-col">
                        <img src="images/gallery-3.jpg" width="100%" class="small-img">
                    </div>
                    
                    <div class="small-img-col">
                        <img src="images/gallery-4.jpg" width="100%" class="small-img">
                    </div> -->

                    </div>
            </div>

            <div class="col-2">
                <p>Home/ <?php echo $IsLaptop?"Laptop":"Phone"; ?> </p>
                <h1><?php echo $Title; ?></h1>
                <h4>$<?php echo $Price; ?>.00</h4>
                <form action="product-detail.php?pid=<?php echo $pid; ?>" method="POST">
                    <input name="product_quantity" type="number" value="1" max="<?php echo $Quantity; ?>" min="1">
                    <input name="product_id" value="<?php echo $pid; ?>" hidden="hidden" />
                    <input name="product_image_url" value="<?php echo $Image; ?>" hidden="hidden" />
                    <input name="product_price" value="<?php echo $Price; ?>" hidden="hidden" />
                    <input name="product_title" value="<?php echo $Title; ?>" hidden="hidden" />
                    <input name="add_to_cart" value="true" hidden="hidden" />
                    <br>
                    <input type="submit" class="btn" value="Add To Cart" style="width: 200px; font-size:16px; font-weight:600; font-family: 'Poppins', sans-serif;">
                </form>
                <h3>Product Details <i class="fa fa-indent" aria-hidden="true"></i></h3>
                <br>
                <p><?php echo $Details; ?></p>
            </div>
        </div>
    </div>

    <!-- <div class="small container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div> -->


    <!-- <div class="small container">
       <div class="row">
           <div class="col-4">
               <img src="Images/product-9.jpg">
               <h4>Red Printed T-shirt</h4>
               <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
               </div>
               <p>$50.00</p>
           </div>

           <div class="col-4">
              <img src="Images/product-10.jpg">
              <h4>Red Printed T-shirt</h4>
              <div class="rating">
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>$50.00</p>
          </div>

          <div class="col-4">
              <img src="Images/product-11.jpg">
              <h4>Red Printed T-shirt</h4>
              <div class="rating">
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star-half-o" aria-hidden="true"></i>
                 <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <p>$50.00</p>
          </div>

          <div class="col-4">
              <img src="Images/product-12.jpg">
              <h4>Red Printed T-shirt</h4>
              <div class="rating">
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star" aria-hidden="true"></i>
                 <i class="fa fa-star-half-o" aria-hidden="true"></i>
              </div>
              <p>$50.00</p>
          </div>
       </div>
    </div> -->
 
    <?php
        include "components/footer.php"
    ?>