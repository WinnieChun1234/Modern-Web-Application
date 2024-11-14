<?php 
	include "config.php";
	session_start();
	$connect = connectDb();
	if(!isset($_SESSION['UserId'])){
		
	$connect= connectDb();
	mysqli_query($connect, "INSERT INTO `login`(`UserId`, `PW`) VALUES ('{$_POST['uname']}','{$_POST['psw']}')");

	}
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="jquery-3.6.0.min.js"></script>
</head>
	
<body>

	<h1>Invoice Page</h1>
	<div>
		<span><strong>Full Name:</strong><?php echo $_POST['FullName']?></span>
		&nbsp&nbsp&nbsp<span><strong>Company:</strong><?php echo $_POST['CompanyName']?></span>
	</div>
	<div><strong>Address Line 1:</strong><?php echo $_POST['AddressLine1']?></div>
	<div><strong>Address Line 2:</strong><?php echo $_POST['AddressLine2']?></div>
	<div>
		<span><strong>City:</strong><?php echo $_POST['City']?></span>
		&nbsp; &nbsp; &nbsp;<span><strong>Region:</strong><?php echo $_POST['RegionStateDistrict']?></span>
		&nbsp; &nbsp; &nbsp;<span><strong>Country:</strong><?php echo $_POST['Country']?></span>
	</div>
	<div><strong>Postcode:</strong><?php echo $_POST['PostcodeZipCode']?></div>
	<br>
	<div id="itemDetails"></div>
	<br>
	<div><strong>Total Price: HK$<span id="price"></strong></div>
	<hr>
	<div style="text-align: center; margin: 1em;"><strong>Thanks for ordering. Your music will be delivered within 7 workings days</strong></div>
	<div style="text-align: center;"><button onclick="location='./'">OK</button></div>


<script>

// function displayInfo(id){
// 	id=='' ? url="" 
// }

//CartNo();
function reloadCart(){

	$.get("cart_function.php?action=b",function(details){
		var total=0;
		//console.log(details);
		var html="";
		for(var i in details){
	      var Num=details[i];
	      total+=Num.Price * Num.Quantity;
	      html+="<p>"+Num.Quantity+" x "+Num.MusicName+" &nbsp; &nbsp;$"+Num.Price+"</p>";

	    }
			
      $("#itemDetails").html(html);
      $("#price").html(total)
      $.get("cart_function.php?action=clear");
     // CartNo();
	},"json")
}

$(function(){
	reloadCart();
})

</script>
</body>
</html>

