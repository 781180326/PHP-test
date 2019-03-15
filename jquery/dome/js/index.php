<?php
	$name = $_POST["name"];
	$password = $_POST["password"];
	$email = $_POST["Email"];
?>


<html>

<head>
	<title>表单提交</title>
	<meta charset="utf-8">
</head>


<body>

	<h2>MY &nbsp;&nbsp;&nbsp;PHP</h2>
	<div>
		
		<p>name:<?php echo $name; ?></p>
		<p>password:<?php echo $password; ?></p>
		<p>email:<?php echo $email; ?></p>
	</div>
</body>
</html>