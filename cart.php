<?php
session_start();
include("db/config.php");

$cart = $_SESSION["cart"] ?? [];

?>

<!DOCTYPE html>
<html>
<head>
<title>Cart | Finders</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("partials/navbar.php"); ?>

<section class="cart">

<h2>Your Cart</h2>

<?php if(count($cart)==0): ?>

<p>Your cart is empty</p>

<?php else: ?>

<?php
$total = 0;

foreach($cart as $id){

$result = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

$total += $row["price"];
?>

<div class="cart-item">

<img src="uploads/<?php echo $row['image']; ?>">

<div>
<h4><?php echo $row["title"]; ?></h4>
<p>$<?php echo $row["price"]; ?></p>
</div>

</div>

<?php } ?>

<h3>Total: $<?php echo $total; ?></h3>

<a href="checkout.php">Proceed To Checkout</a>


<?php endif; ?>

</section>

</body>
</html>
