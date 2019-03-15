<?php
	require_once('require_once.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>romove</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("error in connect");
		$query = "select * from php_score";

		$data = mysqli_query($dbs,$query) or die("error in query");

		echo "<table>";
		while($row = mysqli_fetch_array($data)){

			echo "<tr><td><strong>".$row["name"]."&nbsp;</strong></td>";
			echo "<td>&nbsp;".$row['date']."</td>";
			echo "<td>&nbsp;".$row['score']."</td>";
			echo '<td><a href="removescore.php?id='.$row['id'].'&amp;date='.$row['date'].'&amp;name='.$row['name'].'&amp;score='.$row['score'].'&amp;scoreshot='.$row['scoreshot'].'">remove</a></td>';
			if($row['display'] == 0){
				echo '<td><a href="see.php?id='.$row['id'].'&amp;date='.$row['date'].'&amp;name='.$row['name'].'&amp;score='.$row['score'].'&amp;scoreshot='.$row['scoreshot'].'">approve</a></td>';
			}
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($dbs);



	?>
</body>
</html>