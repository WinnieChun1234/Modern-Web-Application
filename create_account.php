<?php



include 'header.php';



?>

	<br><br><br>
	<section>
		<form action="create.php?op=createAccount" class="createAcForm" method="post">
			<h3>US MUSIC SHOP-CREATE ACCOUNT</h3>
			<div><input type="text" placeholder="Desired Username" id="username" name="uname" required></div>
			<br>
			<div><input type="password" placeholder="Desired Password" id="password" name="psw" required></div>
			<br>
			<button type="submit" class="confirmBtn" value="creatAccount">CONFIRM	</button>
			<button><a href="login.php">BACK</a></button>
		</form>
	</section>
</body>
</html>
