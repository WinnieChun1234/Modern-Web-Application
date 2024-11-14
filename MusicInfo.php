<?php

include 'header.php';
$connection= connectDb();

$sql="select * from music where MusicID = {$_GET['MusicId']};";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_array($result);
//var_dump($row);

?>

	
	<span><a href="./">Home</a></span> > <span><a href="#"><?php echo $row['MusicName'];?></a></span>
	<br><br>
	<div><font size='+2'><strong><?php echo $row['MusicName']; ?></strong><font></font></div>
	<br>
  		<div class="music-details">
  			<img src="Materials/img_<?php echo $row['MusicId']; ?>.jpg" alt=music picture width=20%>
  			<br>
  			<audio controls autoplay>
  				<source src="Materials/m<?php echo $row['MusicId']; ?>.mp3" type="audio/mpeg">
  			</audio>
  			<div><font size='3'>Composer: <?php echo $row['Composer']; ?></div>
  			<br>
  			<div><font size='3'>Published:  <?php echo $row['Published']; ?></div>
  			<br>
  			<div><font size='3'>Category:  <?php echo $row['Category']; ?></div>
  			<br>
  			<div><font size='3'>Description:  <?php echo $row['Description']; ?></div>
  			<br>
  			<div><strong>Price: $<?php echo $row['Price']; ?></strong></div>
  			<br>
  		<div>
  			<form action="AddToCart.php" method="post">
  				<span>Order:</span>
  				<input type="hidden" name="MusicId" value="<?php echo $row['MusicId']; ?>">
  				<input type="number" name="noOfOrder" value=1>
  				<button type="submit" class="AddToCart">Add to Cart</button>
  			</form>
  		</div>
  		</div>
</body>
</html>
