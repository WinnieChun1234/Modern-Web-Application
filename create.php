<?php

include('config.php');

if($_GET['op']=="createAccount")
{

	$connect= connectDb();
	mysqli_query($connect, "INSERT INTO `login`(`UserId`, `PW`) VALUES ('{$_POST['uname']}','{$_POST['psw']}')");

}



?>

<meta http-equiv="refresh" content="2;url=./" />