<?php
  session_start();
  include "components/header.php";

  if(!isset($_GET["uid"]) && !isset($_POST["uid"])){
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['password'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        $sql = "INSERT INTO User(UserName, Email, Address, PhoneNo, Password, IsAdmin) VALUES('$username', '$email', '$address', $phone, '$password', 1)";
        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
            exit();
        }else{
            echo "Error".mysqli_error($conn);
        }
    }

?>
    <form action="#" method="POST">
        <h2>Register Admin</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" id="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input name="address" type="text" class="form-control" id="address" placeholder="Address">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="" placeholder="Password">
        </div>
    
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
<?php
    }else{
        $uid = 0;
        if(isset($_GET["uid"])){
            $uid = $_GET["uid"];
        }else{
            $uid = $_POST["uid"];
        }

        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['password'])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $password = $_POST["password"];
            $isAdmin = 0;
            if(isset($_POST["isAdmin"]) && $_POST["isAdmin"] == 1){
                $isAdmin = 1;
            }

            $sql_edit = "UPDATE User SET UserName = '$username', PhoneNo = $phone, Email = '$email', Address = '$address',  Password = '$password', IsAdmin = $isAdmin WHERE UserId = $uid";
            if(mysqli_query($conn, $sql_edit)){
               echo "Update success"; 
            }else{
                echo "error".mysqli_error($conn);
            }
        }

        $sql_read = "SELECT * FROM User WHERE UserId = $uid";
        $read_values = mysqli_query($conn, $sql_read);
        $edit_user = mysqli_fetch_assoc($read_values);


        echo '<form action="user.php" method="POST">
        <h2>Edit User</h2>
        <input type="hidden" name="uid" value="'.$uid.'">
        <div class="form-group">
            <label for="username">Username</label>
            <input name="username" type="text" id="username" value="'.$edit_user["UserName"].'" class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" value="'.$edit_user["Email"].'" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input name="phone" type="number" class="form-control" value="'.$edit_user["PhoneNo"].'" id="phone" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input name="address" type="text" class="form-control" value="'.$edit_user["Address"].'" id="address" placeholder="Address" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" value="'.$edit_user["Password"].'" id="" placeholder="Password" required>
        </div>';

        if($edit_user["IsAdmin"]){
            echo '
            <div class="form-check">
                <input name="isAdmin" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" checked >
                <label class="form-check-label" for="flexCheckDefault">
                    Is admin
                </label>
            </div>
    
            <button type="submit" class="btn btn-primary">Update</button>
        </form>';
        }else{
            echo '
            <div class="form-check">
                <input name="isAdmin" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" >
                <label class="form-check-label" for="flexCheckDefault">
                    Is admin
                </label>
            </div>
    
            <button type="submit" class="btn btn-primary">Update</button>
        </form>';
        }

?>
    

 <?php
    }
  include "components/footer.php";
 ?>