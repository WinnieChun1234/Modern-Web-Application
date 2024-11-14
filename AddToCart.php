<?php
	
include 'header.php';
$connect= connectDb();

if(!isset($_SESSION['UserId']) && !isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
	
	$_SESSION['cart'][$_POST['MusicId']]=(INT)($_POST['noOfOrder']);

}else if(!isset($_SESSION['UserId']) && isset($_SESSION['cart'])){
	
	$cartStatus = @($_SESSION['cart'][$_POST['MusicId']]);

	if(!$cartStatus){
		$_SESSION['cart'][$_POST['MusicId']]=(INT)($_POST['noOfOrder']);
	}else{
		$_SESSION['cart'][$_POST['MusicId']]+= (INT)($_POST['noOfOrder']);
	}
}else{

	$connect= connectDb();
	$sql="INSERT INTO `cart` (`MusicId`, `UserId`, `Quantity`) VALUES ('{$_POST['MusicId']}', '{$_SESSION['UserId']}', '{$_POST['noOfOrder']}')";
	mysqli_query($connect, $sql);

	//		die($sql);
	// $stmt = mysqli_stmt_init();
	// $stmt->prepare($connect, "INSERT INTO `CART` (`MusicId`, `UserId, `Quantity`) VALUES (?, ? ,?)");
	// $stmt->bind_param('sss', $_POST['MusicId'], $_SESSION['UserId'], $_POST['noOfOrder']);
	// $stmt->execute();
}	
header("location: cart_page.php");

?>