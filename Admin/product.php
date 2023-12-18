<?php
    session_start();

    include "components/header.php";
    if(isset($_GET['delete'])){
        $img = "../upload/".$_GET['img'];
        unlink($img);
        $delId = $_GET['delete'];
        $sql = "DELETE FROM Product WHERE ProductId = $delId";
        ob_start();
        if(mysqli_query($conn, $sql)){
            header("Location: product.php");
            ob_end_flush();
            exit();
        }else{
            header("Location: 404.html");
            exit();
        }
    }

?>

<div style="overflow: auto; max-height: 100vh;">
    <h2>Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Brand</th>
            <th scope="col">Price[LKR]</th>
            <th scope="col">Quantity</th>
            <th scope="col">Details</th>
            <th scope="col">IsLaptop</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <th scope="col">AddImages</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql1 = "SELECT * FROM Product ORDER BY ProductId DESC";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row["ProductId"]."</td>"."<td>".$row["Title"]."</td>"."<td>".$row["Brand"]."</td>"."<td>".$row["Price"]."</td>"."<td>".$row["Quantity"]."</td>"."<td>".$row["Details"]."</td>"."<td>".$row["IsLaptop"]."</td>"."</td>"."<td> <img src='../upload/".$row["Image"]."' width='100px' /></td>"."</td>"."<td>".$row["Date"]."</td>".'';

            ?>
                    <td><a href="#" class="btn btn-warning">Add Images</a></td>
                    <td><a href="edit_product.php?pid=<?php echo $row["ProductId"]; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="product.php?delete=<?php echo $row["ProductId"]; ?>&img=<?php echo $row["Image"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php
    include "components/footer.php"
?>
      
            