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
		if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['date']) && isset($_GET['scoreshot'])){
			$id=$_GET['id'];
			$date = $_GET['date'];
			$name = $_GET['name'];
			$score = $_GET['score'];
			$scoreshot = $_GET['scoreshot'];
		}else if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])){
			
			$id=$_POST['id'];
			$name=$_POST['name'];
			$score = $_POST['score'];


		}
		else{
			echo "sorry,you not delete";
		}

		if(isset($_POST['submit'])){
			if($_POST['confirm'] == 'yes'){
				@unlink("image/".$scoreshot);

				$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("error connect");

				$query = "delete from php_score where id = $id "  ;
				mysqli_query($dbs,$query) or die("error");
				mysqli_close($dbs);

				echo "success delete";
				

			}else{
				echo "no delete";
				

			}

		}else if(isset($id) && isset($name) && isset($date) && isset($score) && isset($scoreshot)){
			echo "are you sure you delete this?<br/>";
			echo "<form action='{$_SERVER["PHP_SELF"]} 'method='post' />";
			echo '<input type="radio" name="confirm" value="yes" />yes ';
			echo '<input type="radio" name="confirm" value="no" checked />no ';
			echo '<input type="submit" name="submit" value="sub" />';
			echo '<input type="hidden" name="id" value="'.$id.'" />';
			echo '<input type="hidden" name="name" value="'.$name.' "/>';
			echo '<input type="hidden" name="score" value="'.$score.' "/>';
			echo '</form>';

		}

		echo '<a href="remove.php">return</a>';


	?>
</body>
</html>