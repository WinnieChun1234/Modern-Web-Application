<?php

session_start();
include('config.php');


if($_GET['op']=="login"){
	$connect=connectDb();
	$customerQ = mysqli_query($connect, "SELECT * FROM `login` WHERE UserId ='{$_POST['uname']}' and PW = '{$_POST['psw']}'");

	if(mysqli_fetch_assoc($customerQ)){
		$_SESSION['UserId']=$_POST['uname'];

		echo <<<EOD
		<meta http-equiv="refresh" content="3;url=./" />

		<H1>Logging in</H1>

EOD;

	}else{
		echo <<<EOD
		<meta http-equiv="refresh" content="3;url=./login.php" />

		<H1>Invalid Login, Please login again</H1>

EOD;

	}
	// createAccount();

}



// function createAccount(){
	// echo $_POST['uname']."";
	// echo $_POST['psw']."";
?>