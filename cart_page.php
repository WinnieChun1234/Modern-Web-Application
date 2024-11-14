<?php

include 'header.php';
//echo "<pre>";
//var_dump($_SESSION);
//echo "</pre>";
?>
	<br>
	<h2>My shopping Cart</h2>
	<br>
	<div id="itemDetails">
	<!-- <div>
		<div>Music Name: Symphony NO.41 Jupiter, 1st Movement  Allegro Vivace</div>
		<br>
		<div>Quantity: 1</div>	
		<br>
		<button>delete</button>
	</div> -->
	<hr>
	</div>
	<div>Total Price: <span id="price"></div>
	<br><br><br><br>
	<span><button onclick="location='./'">Back</button><span>
	<span><button onclick="location='checkout_page.php'">checkout</button></span>

<script>

// function displayInfo(id){
// 	id=='' ? url="" 
// }

//CartNo();
function reloadCart(){

	$.get("cart_function.php?action=b",function(details){
		var total=0;
		console.log(details);
		var html="";
		for(var i in details){
	      var Num=details[i];
	      total+=Num.Price * Num.Quantity;
	      html+="<p><b>Music Name:</b> "+Num.MusicName+"</p>";
	      html+="<p><b>Quantity:</b> "+Num.Quantity+"</p>";
	      html+="<p><button onclick='removeMusic("+Num.MusicId+")'>Delete</button></p>";
	      html+="<hr>";

	    }
			
      $("#itemDetails").html(html);
      $("#price").html(total);
      CartNo();
	},"json")
}

function removeMusic(id){
	$.get("cart_function.php?action=delete&MusicId="+id,function(){
		reloadCart();CartNo();
	})
}

$(function(){
	reloadCart();
})

</script>