<?php



include 'header.php';



?>
	<br><br><br>
	<section>
		<form action="verifyLogin.php?op=login" class="createAcForm" method="post">
		<h3>US MUSIC SHOP-LOGIN</h3>
		<div><input type="text" placeholder="Username" name="uname" required></div>
		<br>
		<div><input type="password" placeholder="Password" name="psw" required></div>
		<br>
		<button type="submit">SUBMIT</button>
		<button type="submit"><a href="create_account.php">CREATE</a></button>		
	</section>
</body>
</html>
