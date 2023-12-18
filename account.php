<?php 

    include "components/header.php";
    if(isset($_SESSION["IsULogin"]) && $_SESSION["IsULogin"] != 0){
        header("Location: index.php");
        exit();
    }
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['password'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $password = $_POST["password"];

        $sql = "INSERT INTO User(UserName, Email, Address, PhoneNo, Password, IsAdmin) VALUES('$username', '$email', '$address', $phone, '$password', 0)";
        if(mysqli_query($conn, $sql)){
            $_SESSION["IsULogin"] = 1;
            $query = "SELECT * FROM User WHERE Email = '$email' && Password = '$password'";
            $data = mysqli_query($conn, $query);
            if(mysqli_num_rows($data) > 0){
                $_SESSION["IsULogin"] = 1;
                $row = mysqli_fetch_assoc($data);
                $uid = $row['UserId'];
                $_SESSION["uid"] = $uid;
                header("Location: index.php");
                exit();
            }
            header("Location: index.php");
            exit();
        }else{
            echo "Error".mysqli_error($conn);
        }
    }

    if(isset($_POST["lEmail"]) && isset($_POST["lPassword"])){
        $email = $_POST["lEmail"];
        $password = $_POST["lPassword"];
        $query = "SELECT * FROM User WHERE Email = '$email' && Password = '$password'";
        $data = mysqli_query($conn, $query);
        if(mysqli_num_rows($data) > 0){
            $_SESSION["IsULogin"] = 1;
            $row = mysqli_fetch_assoc($data);
            $uid = $row['UserId'];
            $_SESSION["uid"] = $uid;
            header("Location: index.php");
            exit();
        }
    }
?>

 <!----------------Account Page---------------->
    <div class="account-page">
      <div class="container">
            <div class="row">

                <div class="col-2"><!--1 column for image and other for form-->
                    <img src="images/banner1.png">
                </div>
                
                <div class="col-2">
                    <div class="form-container"><!--column for form-->
                        <div class="form-btn"><!--button for login and register-->
                            <span onclick="login()">Login</span><!--use js-->
                            <span onclick="register()">Register</span>
                            <hr id="Indicator"><!--red orange bar-->
                        </div>

                        <form method="POST" action="#" id="LoginForm"><!--login form-->
                            <input name="lEmail" type="email" placeholder="Email" required>
                            <input name="lPassword" type="password" placeholder="Password" required>
                            <button type="Submit" class="btn">Login</button>
                            <a href="">Forgot Password?</a>
                        </form>

                        <form method="POST" action="#" id="RegForm"><!--registraition form-->
                            <input name="username" type="text" placeholder="Username" required>
                            <input name="email" type="email" placeholder="Email" required>
                            <input name="phone" type="number" placeholder="phone" required>
                            <input name="address" type="text" placeholder="Address" required>
                            <input name="password" type="password" placeholder="Password" required>
                            <button type="Submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

            function register(){//by 

                RegForm.style.transform = "translateX(0px)";//in Css, by default we set translatex(100) so by default, we are at register, thats why when person clicks on register, everything stayed there stayed there
                LoginForm.style.transform = "translateX(0px)";
                Indicator.style.transform = "translateX(100px)";//As mentioned above, in css translatex(100) is set, so for indicator to be by default on register, we set it to 100px;
            }

            function login(){

                RegForm.style.transform = "translateX(300px)";//when person clicks on login, login form shift to 300px forward and register form goes 300px outside, but we cannot see it as we use overflow=hidden in css, if want to see, then remove overflow property.
                LoginForm.style.transform = "translateX(300px)";
                Indicator.style.transform = "translateX(0px)";//as by default on 100px or on register, so when clicks on login, it comes back to 0 px
            }
    </script>

    <?php
        include "components/footer.php"
    ?>