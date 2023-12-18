<?php  
  
  session_start();
  include 'components/header.php';
    $pid = "";
    if(isset($_GET["pid"])){
        $pid = $_GET['pid'];
    }else{
        $pid = $_POST['pid'];
    }
  $sql1 = "SELECT * FROM Product WHERE ProductId = ".$pid;
  $result = mysqli_query($conn, $sql1);

    $Title = "";
    $Brand =  "";
    $Price =  "";
    $Quantity =  "";
    $Details =  "";
    $Image =  "";
    $Date =  "";
    $IsLaptop =  "";
    
  if(!isset($_POST["submit"]) && mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result); // Add this line to fetch the row from the result set
    $Title = $row["Title"];
    $Brand = $row["Brand"];
    $Price = $row["Price"];
    $Quantity = $row["Quantity"];
    $Details = $row["Details"];
    $Image = $row["Image"];
    $Date = $row["Date"];
    $IsLaptop = $row["IsLaptop"];
  }else{

    $sql = "";
    $pid = $_POST['pid'];
    $is_laptop = 0;
    if(isset($_POST["IsLaptop"])){
      $is_laptop = 1;
    }
    if($_FILES['fileToUpload']['error'] != 4 || $_FILES['fileToUpload']['size'] != 0 && $_FILES['fileToUpload']['error'] != 0){
        unlink("../upload/".$_POST['oldImg']);
        $target_dir = "../upload/";
        $fileId =  microtime() . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir .$target_dir .$fileId;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png'];
        // check type
        if (!in_array($imageFileType, $allowedTypes)) {
            $msg = "Type is not allowed";
        } // Check if file already exists
        elseif (file_exists($target_file)) {
            $msg = "Sorry, file already exists.";
        } // Check file size
        elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
            $msg = "Sorry, your file is too large.";
        } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        }
        // Upload image to server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $sql = "UPDATE Product SET Title = '".$_POST["Title"]."', Brand = '".$_POST["Brand"]."', Price = '".$_POST["Price"]."', Quantity = '".$_POST["Quantity"]."' , Details = '".$_POST["Details"]."', Date = '".$_POST["Date"]."', Image = '".$fileId."', IsLaptop = '".$is_laptop."' WHERE ProductId = $pid";
    }else{
        $sql = "UPDATE Product SET Title = '".$_POST["Title"]."', Brand = '".$_POST["Brand"]."', Price = '".$_POST["Price"]."', Quantity = '".$_POST["Quantity"]."', Details = '".$_POST["Details"]."', Date = '".$_POST["Date"]."', IsLaptop = '".$is_laptop."' WHERE ProductId = $pid";
    }
    if ($conn->query($sql) != TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }else{
      header("Location: product.php");
    }
  }
?>
<form action="edit_product.php?pid=<?php echo $pid ?>" method="post"enctype="multipart/form-data">
    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
    <h1>Edit Product</h1>
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input value="<?php echo $Title; ?>" type="text" class="form-control" name="Title" placeholder="Title" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Brand</label>
    <input type="text" value="<?php echo $Brand; ?>" class="form-control" name="Brand"  placeholder="Brand" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input value="<?php echo $Price; ?>" type="number" class="form-control" name="Price" placeholder="Price" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input value="<?php echo $Quantity; ?>" type="number" class="form-control" name="Quantity" placeholder="Quantity" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Details</label>
    <input value="<?php echo $Details; ?>" type="textbox" class="form-control"  name="Details" placeholder="Details" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date</label>
    <input value="<?php echo $Date; ?>" type="Date"  name="Date" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label><br>
    <img width="100px" src="../upload/<?php echo $Image; ?>" id="blah" src="#" alt="your image" />
    <input type="hidden" value="<?php echo $Image; ?>" name="oldImg"/>
    <input  value="<?php echo $Image; ?>" type="file" id="fileToUpload" name="fileToUpload" accept="image/png, image/gif, image/jpeg" onchange="readURL(this);" class="form-control-file" id="exampleFormControlFile1" >
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input"  name="IsLaptop" id="exampleCheck1"  <?php 
        if($IsLaptop){
            echo "checked";
        }
    ?>>
    <label class="form-check-label" for="exampleCheck1">Is Laptop</label>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
    include 'components/footer.php'
?>

<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result)
      $('#blah').attr('style', "display:content");
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>