<?php include('config.php');

session_start();

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<script src="jquery-3.6.0.min.js"></script>
	<title>main.html</title>
</head>
	
<body>
	<div class="search">
		<form action="./">
		<input type="text" placeholder="keywords(s)" name="k" class="topSearch" value="<?php echo @$_GET['k'];?>">
		<input type="submit" class="blueButton searchButton" value="Search">
		</form>
	</div>
<?php if(isset($_SESSION["UserId"])){ ?>
			<div class="accountDetails"> 
		<p>You are logged in as</p><?php echo ($_SESSION["UserId"]); ?>
		<span><a href="logout.php">Sign out</a></span>
		<button class="blueButton cart" type="submit" onclick="location='cart_page.php'">Cart</button><sup id="CartNo"></sup>
	</div>
<?php }else {?><div class="accountDetails"> 
		<span><a href="login.php">sign in</a></span>
		<span><a href="create_account.php">Register</a></span>
		<button class="blueButton cart" type="submit" onclick="location='cart_page.php'">Cart</button><sup id="CartNo"></sup>
	</div>
<?php } ?>


<script>

	function CartNo(){
		$("#CartNo").load("cart_function.php?action=a");

	}
	$(function(){
		CartNo();
	})
</script>
