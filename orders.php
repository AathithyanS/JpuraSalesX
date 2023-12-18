<?php
    include 'components/header.php';
?>

<div style="text-align: center;">
<?php 
    if(isset($_GET['now'])){
?>
<h3 id="msgOrder" style="text-algin: center; margin-top: 5%; color: green;
background-color: #b8e6b8; border-radius: 6px; padding: 20px 10px; margin-left: 35%; margin-right: 35%; ">Order successfully placed!</h3>
</div>
<?php

}
?>


<div class="small container cart-page">
    <table>
        <tr>
            <th style="text-align:left;">Order Id</th>
            <th style="text-align:left;">Ordered date</th>
            <th style="text-align:left;">Status</th>
            <th style="text-align:left;">Amount</th>
    <?php
    $uid = $_SESSION['uid'];
    $sql1 = "SELECT * FROM CustomerOrder WHERE CustomerId = $uid ORDER BY OrderId DESC";
    $result = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $className = 'orderStatus-w';
            if($row['Status'] == 'Confirmed'){
                $className = 'orderStatus-c';
            }elseif($row['Status'] == 'Shiped'){
                $className = 'orderStatus-s';
            }elseif($row['Status'] == 'Delivered'){
                $className = 'orderStatus-d';
            }elseif($row['Status'] == 'Canceled'){
                $className = 'orderStatus-ca';
            }
    ?>
        <tr>
            <td style="text-align:left;"><?php echo $row['OrderId']; ?></td>
            <td style="text-align:left;"><?php echo $row['DateTime']; ?></td>
            <td style="text-align:left;"><span class="<?php echo $className; ?>"><?php echo $row['Status']; ?></span></td>
            <td style="text-align:left;">$<?php echo $row['Amount']; ?></td>
        </tr>
    <?php
        }
    }else{
        echo "<h1 style='height: 42vh; color:#ff523b; text-align:center; padding-top:60px;'>No orders yet!</h1>";
    }  
    ?>
    </table>

</div>

<script>
  const element = document.getElementById("msgOrder");

    setTimeout(function() {
    element.style.display = "none";
    }, 5000);
</script>
<?php
    include 'components/footer.php';
?>