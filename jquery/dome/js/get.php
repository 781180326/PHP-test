<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<form action="get.php"  method="post">
	<input type="text" name="uname"><br/>
	<input type="password" name="password"><br/>
	<input type="submit" value="提交"><br/>
	
	<?php   
		$password = $_POST["password"];
		$name = $_POST["uname"];
		echo "<input style='width:600px;height:50px;' type='textarea'  value='name:" .$name.   "password:" .$password. "'>"
	?>
</form>
</body>
</html>

