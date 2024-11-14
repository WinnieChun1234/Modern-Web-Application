<?

	include "config.php";
	session_start();
	$connect = connectDb();

	$result = mysqli_query($connect, "select * from login where UserId='".$_GET['uname']."'");
	if(mysqli_fetch_assoc($result)){
		echo "<font color=red>Duplicate Username</font>";
	}