<?php
    session_start();
    include "components/header.php";
?>
<div>
    <h1>Ordered products</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Payment Id</th>
            <th scope="col">Customer Id</th>
            <th scope="col">DateTime</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM CustomerOrder ORDER BY OrderId DESC";
                $result = mysqli_query($conn, $query);
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
                <td><?php echo $row['OrderId']; ?></td>
                <td><?php echo $row['PaymentId']; ?></td>
                <td><?php echo $row['CustomerId']; ?></td>
                <td><?php echo $row['DateTime']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Amount']; ?></td>
                <td><span class="<?php echo $className ?>"><?php echo $row['Status']; ?><span></td>
                <td><a href="order_details.php?orderId=<?php echo $row['OrderId']; ?>"class="btn btn-primary">Check</a></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<?php
    include "components/footer.php";
?>