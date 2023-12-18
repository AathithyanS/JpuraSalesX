<?php
    session_start();

    include "components/header.php";

   
    //Delete check
    if(isset($_GET['delete'])){
        $delId = $_GET['delete'];
        $sql = "DELETE FROM User WHERE UserId = $delId";
        ob_start();
        if(mysqli_query($conn, $sql)){
            header("Location: Index.php");
            ob_end_flush();
            exit();
        }else{
            header("Location: 404.html");
            exit();
        }
    }

?>

<div>
    <h2>User details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Password</th>
            <th scope="col">IsAdmin</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql1 = "SELECT * FROM User ORDER BY UserId DESC";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row["UserId"]."</td>"."<td>".$row["UserName"]."</td>"."<td>".$row["Email"]."</td>"."<td>".$row["PhoneNo"]."</td>"."<td>".$row["Address"]."</td>"."<td>".$row["Password"]."</td>"."<td>".$row["IsAdmin"]."</td>".'';

            ?>
                    <td><a href="user.php?uid=<?php echo $row["UserId"]; ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="index.php?delete=<?php echo $row["UserId"]; ?>" class="btn btn-danger">Delete</a></td>
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
      
            