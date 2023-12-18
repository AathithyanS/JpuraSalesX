<?php 

    include "components/header.php";
    if(isset($_GET['checkLog']) && $_GET['checkLog']){
        if(isset($_SESSION["IsULogin"]) && $_SESSION["IsULogin"]){
            header('Location: checkout.php?');
        }else{
            header('Location: account.php');
        }
    }

    if (isset($_GET['remove_product'])) {
        $product_id = $_GET['remove_product'];
        setcookie('cart['.$product_id.'][quantity]', 0, time() - 3600, "/");
        setcookie('cart['.$product_id.'][price]', 0, time() - 3600, "/");
        setcookie('cart['.$product_id.'][image_url]', '', time() - 3600, "/");
        setcookie('cart['.$product_id.'][title]', '', time() - 3600, "/");
        header('Location: cart.php');
        exit;
      }

?>
    <div class="small container cart-page">
            <?php
                if (!empty($_COOKIE['cart'])) {
                    $subTotal = 0;
                    echo "<table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>";
                    foreach ($_COOKIE['cart'] as $product_id => $product) {
                        $quantity = $product['quantity'];
                        $price = $product['price'];
                        $image_url = $product['image_url'];
                        $title = $product['title'];

                        $subTotal += ($price * $quantity);
            ?>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="upload/<?php echo $image_url; ?>">
                        <div>
                            <p><?php echo $title; ?></p>
                            <small>Price: $<?php echo $price; ?>.00</small>
                            <a href="cart.php?remove_product=<?php echo $product_id; ?>">Remove</a>
                        </div>
                    </div>
                </td>
                <td><span style="padding-top: 5px; padding-bottom: 5px; padding-left: 12px; padding-right: 12px; border: 2px solid #ff523b;"><?php echo $quantity; ?></span></td>
                <td>$<?php echo ($price * $quantity); ?>.00</td>
            </tr>
            <?php 
                    }
                    $tax = 2/100.00 * $subTotal;
                    $total = $subTotal + $tax;
            ?>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$<?php echo $subTotal;?>.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$<?php echo $tax;?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>$<?php echo $total;?></td>
                </tr>

            </table>
            
        </div>
        <a href="?checkLog=1" style="float: right; width:480px; text-align:center; padding-top: 10px; padding-bottom: 10px; border-radius: 0px" class="btn">Checkout</a>
    

<?php
    }
    else{
        echo "<h1 style='height: 42vh; color:#ff523b; text-align:center; padding-top:60px;'>Cart is empty</h1>";
    }
?>
    </div>
<?php
    include "components/footer.php";
?>