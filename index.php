<?php

include 'header.php';

?>

	<div id="Category">
		<ul>
			<h3>Category</h3>
			<?php 
			$sql='SELECT `Category` FROM `music` GROUP BY Category';
			$connect= connectDb();
			$catResult=mysqli_query($connect, $sql);
			while($row=mysqli_fetch_array($catResult)){
				echo "<li><a href='./?c={$row['Category']}'>{$row['Category']}</a></li>";

			}
			?>

		</ul>
	</div>
	<div id="navBar">

		<?php if(@$_GET['k']): ?>
			<span><a href='#'>Home</a></span>
			<h3>Searching Results</h3>

		<?php elseif(@$_GET['c']): ?>
			<span><a href='./'>Home</a></span> &gt; <span><a href='./?c=<?php echo $_GET['c']?>'><?php echo $_GET['c']?></a></span></div>

		<?php else: ?>
			<a href='#'>Home</a>
			<h3>All Music</h3>

		<?php endif; ?>
		
	<div><font size="5"><strong>Searching Results</strong></font></div>
	<br>
		
		<div class="music-container" style="display: flex; flex-direction: row; flex-wrap: wrap;">
			<?php 
$sql=<<<EOD
select concat('<span class="music-details">',
	'<div><a href="MusicInfo.php?MusicId=',MusicId,'">',MusicName,'</a></div>',
	'<div><img src="Materials/img_',MusicId,'.jpg"  class="composerImage"></div>',
	if(NewArrival,'<div>New Arrival</div>',''),
	'<div>Composer: ', Composer, '</div>',
	'<div>Price: ', Price,'</div>',
	'</span>\\n') from music
EOD;


		if(@$_GET['c']){
			$sql.=" where Category='{$_GET['c']}'";
		}else if(@$_GET['k']){

			$sql_list=array();

			$tok = strtok($_GET['k'], " \n\t");

			while ($tok !== false) {
			    //echo "Word=$tok<br />";

				$sql_list[] = $sql." where MusicName like '%{$tok}%' or MusicName like '%{$tok}%'";

			    $tok = strtok(" \n\t");
			}
			$sql=join(" UNION ",$sql_list);
			//echo $sql;
		}

			$result = mysqli_query($connect, $sql);
			while($row=mysqli_fetch_array($result)){
				echo $row[0];
			}
			?>
  			
		</div>
</body>
</html>
