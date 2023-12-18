<?php 
    $subTotal = 0;
    $description = "";
    include('components/header.php');
    if (!empty($_COOKIE['cart'])) {
        foreach ($_COOKIE['cart'] as $product_id => $product) {
            $quantity = $product['quantity'];
            $price = $product['price'];
            $image_url = $product['image_url'];
            $title = $product['title'];

            $description = $description."Title: ".$title." Quantity: ".$quantity." Price".$price;

            $subTotal += ($price * $quantity);
        }
    }
 
    $tax = 5/100.00 * $subTotal;
    $total = $subTotal + $tax;

    if(isset($_POST['customerName']) && !empty($_POST['customerName']) && 
   isset($_POST['email']) && !empty($_POST['email']) && 
   isset($_POST['phone']) && !empty($_POST['phone']) && 
   isset($_POST['address']) && !empty($_POST['address'])) {
        $S_token = $_POST['stripeToken'];
        header('Location: action.php?stripeToken='.$S_token.'&customerName='.$_POST['customerName'].'&email='.$_POST['email'].'&phone='.$_POST['phone'].'&address='.$_POST['address'].'&total='.$total);
    } else if (isset($_POST['customerName']) && $_POST['description']){
        echo "<div style='text-align:center;'><h5 style='text-aglin:center; color:red; margin-top: 100px'>Fileds can't be empty!</h5></div>";
    }

   
    
?>
<style>
    .stripe-button-el {
background-color: orange !important;
}
    </style>
<div class="checkoutForm" style="width: 40%; margin: 8% 30%;">
<h2 style='color:#ff523b; text-align:center; margin-bottom:40px;'>Check out</h2>
    <form id="payment-form" style="margin: 0px;" action="" method="post"><!--registraition form-->
        <input name="customerName" type="text" placeholder="Customer Name" required>
        <input name="email" type="email" placeholder="Email" required>
        <input name="phone" type="number" placeholder="Contact Phone No" required>
        <input name="address" type="text" placeholder="Delivery Address" required>
        <input name="description" hidden="hidden" value="<?php echo $description; ?>" />
        <p style='text-align:center; font-weight: 600; margin-top: 20px; margin-bottom: 20px'>Total: $<?php echo $total; ?></p>
        <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="pk_test_51MyGntHJZZKzKLNmyRoYPYucHjBxwrLp1Wmrpe9WP5VIsIxTRR9uSk1xzT4GWDWLLlyuB8PR0uGXCqsWLyDa1bHN000abgdvpG"
            data-name="Store Payment"
            data-image="images/logo.png"
            data-label="Paynow"
            data-description=<?php echo $description; ?>
            data-amount = "<?php echo $total*100; ?>"
            >
        </script>
    </form>
</div>
 

<?php 
    include('components/footer.php');
?>