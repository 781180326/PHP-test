<!DOCTYPE html>
<html>
<head>
	<title>发送email</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$name = $_POST["name"];
		$pass = $_POST["password"];
		$home = $_POST["home"];
		$sex = $_POST["sex"];
		$db = mysqli_connect('localhost','root','781180326','php_project') or die("error connect");
		$query = "INSERT INTO php_1  VALUES ( '$name' , '$pass' , '$home', '$sex')"; 
		/*$query = "INSERT INTO php_1(name,password,home,sex)  VALUES ( '$name' , '$pass' , '$home', '$sex')";*/
		/*查询语句中的表名后面的括号里写的列名不用带引号，values后面的数据如果是字符串必须带引号，而且，如果向表中插入一个完整的行，就不用写列名*/
		$result = mysqli_query($db,$query) or die(" query");
		mysqli_close($db);
		echo $result;
	?>
</body>
</html>