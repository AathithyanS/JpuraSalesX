<?php  
  
  session_start();
  include 'components/header.php';

  
  if (isset($_POST["submit"])) {
    $target_dir = "../upload/";
    $fileId =  microtime() . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir .$target_dir .$fileId;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'png'];
    $msg="ada";
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
    
    echo $msg;

    $is_laptop = 0;
    if(isset($_POST["IsLaptop"])){
      $is_laptop = 1;
    }
     // Prepare the SQL statement
    $sql = "INSERT INTO Product(Title, Brand, Price, Quantity, Details, Image, Date, IsLaptop)
    VALUES ('".$_POST["Title"]."','".$_POST["Brand"]."','".$_POST["Price"]."','".$_POST["Quantity"]."','".$_POST["Details"]."','".$fileId."','".$_POST["Date"]."','".$is_laptop."')";

    // Execute the SQL statement
    if ($conn->query($sql) != TRUE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }else{
      header("Location: product.php");
    }
  }
?>
<form action="#" method="post"enctype="multipart/form-data">
  <h1>Add product</h1>
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" class="form-control" name="Title" placeholder="Title" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Brand</label>
    <input type="text" class="form-control" name="Brand"  placeholder="Brand" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" class="form-control" name="Price" placeholder="Price" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input type="number" class="form-control" name="Quantity" placeholder="Quantity" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Details</label>
    <input type="textbox" class="form-control"  name="Details" placeholder="Details" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date</label>
    <input type="Date"  name="Date" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label><br>
    <img width="100px" style="display:none;" id="blah" src="#" alt="your image" />
    <input type="file" id="fileToUpload" name="fileToUpload" accept="image/png, image/gif, image/jpeg" onchange="readURL(this);" class="form-control-file" id="exampleFormControlFile1" >
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input"  name="IsLaptop" id="exampleCheck1">
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