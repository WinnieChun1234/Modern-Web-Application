<?php 

include 'config.php';
$connect = connectDb();

?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<script src="jquery-3.6.0.min.js"></script>
</head>
	
<body>

<div id="checkout">
	<form action ="invoice.php" method="post" id="invoice">

<?php 
	if (!isset($_session['UserId'])){

?>
	<div><h3>I'm a new customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I'm already a customer</h3></div>
	<span><strong>Please check out Below&nbsp;&nbsp;&nbsp;&nbsp; or &nbsp;&nbsp;&nbsp;&nbsp;</strong></span><span><a href="login.php">Sign In</a></span>
	<hr>
	<div><font size="4"><h3>Create Account: </h3></font></div>
		<div>Username &nbsp; <input type="text" placeholder="Desired Username" name="uname" required onchange="$('#myIFrame').attr('src','checkId.php?uname='+$(this).val())"><iframe style="height:30px;border:none" id="myIFrame"></iframe></div>
		<br>
		<div>Password &nbsp; <input type="password" placeholder="Desired Password" name="psw" required></div>
		<div><h4>Delivery Address: </h4></div>
		<br>
		<div>Full Name <input type="text" placeholder="Required" name="FullName" required></div>
		<br>
		<div>Company Name <input type="text" placeholder="" name="CompanyName" ></div>
		<br>
		<div>Address Line 1 <input type="text" placeholder="required" name="AddressLine1" required></div>
		<br>
		<div>Address Line 2 <input type="text" placeholder="" name="AddressLine2" ></div>
		<br>
		<div>City <input type="text" placeholder="Required" name="City" required></div>
		<br>
		<div>Region State District <input type="text" placeholder="" name="RegionStateDistrict" ></div>
		<br>
		<div>Country <input type="text" placeholder="required" name="Country" required></div>
		<br>
		<div>Postcode Zip Code <input type="text" placeholder="required" name="PostcodeZipCode" required></div>
		<br>
	<hr>
	<div>Your Order:(<a href="cart_page.php">change</a>)</div>
	<br>
	<div><strong>Free Standard Shipping</strong></div>
	<div id="itemDetails"></div>
	<br>
	<div><strong>Total Price: $<span id="price"></span></strong><div>
	<br><br><br>
	<button>confirm</button>


<?php }else{ ?>
	<div><h4>Delivery Address: </h4></div>
		<br>
		<div>Full Name <input type="text" placeholder="Required" name="FullName" required></div>
		<br>
		<div>Company Name <input type="text" placeholder="" name="CompanyName" ></div>
		<br>
		<div>Address Line 1 <input type="text" placeholder="required" name="AddressLine1" required></div>
		<br>
		<div>Address Line 2 <input type="text" placeholder="" name="AddressLine2" ></div>
		<br>
		<div>City <input type="text" placeholder="Required" name="City" required></div>
		<br>
		<div>Region State District <input type="text" placeholder="" name="RegionStateDistrict" ></div>
		<br>
		<div>Country <input type="text" placeholder="required" name="Country" required></div>
		<br>
		<div>Postcode Zip Code <input type="text" placeholder="required" name="PostcodeZipCode" required></div>
		<br>
	<hr>
	<div>Your Order:(<a href="cart_page.php">change</a>)</div>
	<br>
	<div><strong>Free Standard Shipping</strong></div>
	<div id="itemDetails"></div>
	<br>
	<div><strong>Total Price:<span id="price"></span></strong><div>
	<br><br><br>
	<input type="submit" name="confirm" value="confirm">confirm</button>
	</div>
	</form>
</div>

<?php } ?>

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
      $("#price").html(total);
     // CartNo();
	},"json")
}

$(function(){
	reloadCart();
})

</script>

</html>