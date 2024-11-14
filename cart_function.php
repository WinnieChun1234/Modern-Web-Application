<?php

	include('config.php');
session_start();

	$connect = connectDb();

	if(!isset($_GET['action'])){
		die();
	}else if($_GET['action']=='a' && isset($_SESSION['UserId'])){

			$result = mysqli_query($connect, "select count(DISTINCT MusicId) count from cart where UserId='{$_SESSION['UserId']}';");
			echo mysqli_fetch_array($result)['count'];		

	}else if ($_GET['action']=='a' && !isset($_SESSION['UserId'])){

		if(!isset($_SESSION['cart'])){
			$_SESSION['cart']=[];
		}
		echo count($_SESSION['cart']);
		

	}else if($_GET['action']=='b' && isset($_SESSION['UserId'])){

			$stmt = mysqli_query($connect, "select sum(cart.Quantity) as Quantity,music.* from cart join music using (MusicId) where UserId = '{$_SESSION['UserId']}' group by MusicId");
			echo json_encode(mysqli_fetch_all($stmt, MYSQLI_ASSOC));

	}else if($_GET['action']=='b' && !isset($_SESSION['UserId'])){

			$data=array();
			if(isset($_SESSION['cart'])){
				foreach($_SESSION['cart'] as $k => $v){
					$result = mysqli_query($connect, "select * from music where MusicID=".$k);
					$row=mysqli_fetch_array($result);
					$row['Quantity']=$v;
					$data[]=$row;
				}
			}
			echo json_encode($data);

	}else if($_GET['action']=='delete'){
		if(isset($_SESSION['UserId'])){
			$sql="DELETE FROM cart WHERE UserId = '{$_SESSION['UserId']}' and MusicId ='{$_GET['MusicId']}'";
			mysqli_query($connect,$sql);
		}else{
			unset($_SESSION['cart'][$_GET['MusicId']]);
		}
	}else if($_GET['action']=='clear'){
		unset($_SESSION['cart']);
	}


?>