<!DOCTYPE html>
<html>
<head>
	<title>score</title>
	<link rel="shortcut icon" href="">
	<meta charset="utf-8">
	<style>
	.topscore{height:30px;line-height: 30px;background: orange;text-align: center;}
	</style>
</head>
<body>
	<?php 
		$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("error in musql_connect");
		$query="select * from php_score where display=1 order by score desc,date";
		$data = mysqli_query($dbs,$query) or die("error in mysql_query");
		$index = 0;

		echo "<table>";
		while($row = mysqli_fetch_array($data)){
			if($index==0){
				echo "<p class='topscore'>topscore:".$row["score"]."</p>";
			}
			echo "<tr><td>score:".$row["score"]."<br/>";
			echo "name:".$row["name"]."<br/>";
			echo "date:".$row["date"]."</td>";
			echo "<td><img src='image/".$row["scoreshot"]."'/></td></tr>";

			$index ++;
		}
		echo "</table>";
		mysqli_close($dbs);
	?>
</body>
</html>