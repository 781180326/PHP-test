<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		$name = $_POST["name"];
		$email = $_POST["email"];

		$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("mysql connect error!!!");
		$query = "INSERT INTO php_1 VALUES ('$name','$email')";
		$result = mysqli_query($dbs,$query) or die("mysql query error");
		mysqli_close($dbs);
		echo "thanks $name";
	?>
</body>
</html>