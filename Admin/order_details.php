<?php
    session_start();
    include 'components/header.php';
    $orderNo = $_GET['orderId'];

    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $sQuery = "UPDATE CustomerOrder SET Status = '$status' WHERE OrderId = $orderNo";
        mysqli_query($conn, $sQuery);
    }

    $proQuery = "SELECT OrderProduct.Quantity, Product.Title, Product.Price, Product.Image
    FROM OrderProduct
    JOIN Product ON OrderProduct.ProductId = Product.ProductId
    WHERE OrderProduct.OrderId = $orderNo";
?>
<div class="small container cart-page">
    <h1 class="orderHeading">Order #<?php echo $orderNo?></h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
            $subTotal = 0;
            $result = mysqli_query($conn, $proQuery);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $subTotal += ($row['Price'] * $row['Quantity']);
        ?>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="../upload/<?php echo $row['Image']; ?>">
                    <div>
                        <p><?php echo $row['Title']; ?></p>
                        <small>Price: $<?php echo $row['Price']; ?></small>
                    </div>
                </div>
            </td>
            <td><span style="padding-top: 5px; padding-bottom: 5px; padding-left: 12px; padding-right: 12px; border: 2px solid #4E73DE;"><?php echo $row['Quantity']; ?></span></td>
            <td>$<?php echo $row['Price']*$row['Quantity']; ?>.00</td>
        </tr>
    <?php 
            }
        }
        $tax = 2/100.00 * $subTotal;
        $total = $subTotal + $tax;
    ?>
</div>
<div class="total-price">
    <table>
        <tr>
            <td>Subtotal</td>
            <td>$<?php echo $subTotal; ?>.00</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>$<?php echo $tax; ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$<?php echo $total; ?></td>
        </tr>

    </table>
    <div class="statusBtn">
        <h2>Update the status of the order</h2>
        <a  class="orderStatus-w" href="order_details.php?orderId=<?php echo $orderNo; ?>&status=waiting" style="margin-top:50px;">Waiting</a>
        <a style="margin-top:50px;" class="orderStatus-c" href="order_details.php?orderId=<?php echo $orderNo; ?>&status=Confirmed">Confirmed</a>
        <a style="margin-top:50px;" class="orderStatus-s" href="order_details.php?orderId=<?php echo $orderNo; ?>&status=Shiped">Shiped</a>
        <a style="margin-top:50px;" class="orderStatus-d" href="order_details.php?orderId=<?php echo $orderNo; ?>&status=Delivered">Delivered</a>
        <a style="margin-top:50px;" class="orderStatus-ca" href="order_details.php?orderId=<?php echo $orderNo; ?>&status=Canceled">Cancel</a>
    </div>
</div>


<?php
    include 'components/footer.php';
?>
