<?php
	header("Content-type: text/html; charset=utf-8");
	require 'connect.php';
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>meities</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<h2>meities 主页</h2>
		<?php
			$dbs = mysqli_connect(host,name,pw);
				mysqli_select_db($dbs,"meities");
			if(isset($_COOKIE["user_id"])){
				if(!isset($_SESSION["user_id"])){
					$_SESSION["user_id"] = $_COOKIE["user_id"];
				}
				$query ="select * from user_intro where user_id = {$_SESSION["user_id"]}";
				$result = mysqli_query($dbs,$query);
				$row = mysqli_fetch_assoc($result);
				echo "<em>welcome,{$row["user_zh"]}</em><br>";
				echo "<a href='introduce.php?user_id={$_SESSION["user_id"]}'>个人信息</a><br>";
				echo "<a href=''>互补配对</a><br>";
				echo "<a href='sign.php?out=1'>注销</a>";
			}else{
				echo "<a href='sign.php'>登录</a><br>";
				echo "<a href='login.php'>注册</a>";
			}
			echo "<hr>";

			if(isset($_SESSION["user_id"])){
				//查询其他用户
				$query = "select * from user_intro where user_id != {$_SESSION["user_id"]}";
				$data = mysqli_query($dbs,$query);
				while($row = mysqli_fetch_assoc($data)){
					echo "<div><img href='image/{$row["user_pic"]}' alt='{$row["user_zh"]}'/><br/>";
					//这里指向个人简介页面,后面跟一个get方法的user_id来定位
					echo "<a href='introduce.php?user_id={$row["user_id"]}'>{$row['user_zh']}</a></div>";
				}
			}else{
				$query = "select * from user_intro";
				$data = mysqli_query($dbs,$query);
				while($row = mysqli_fetch_assoc($data)){
					echo "<div><img src='image/{$row["user_pic"]}' alt='{$row["user_zh"]}'/><br/>";
					//这里指向个人简介页面,后面跟一个get方法的user_id来定位
					echo "<span>{$row['user_zh']}<span></div>";
				}
			}
			

			mysqli_close($dbs);
		?>


	</div>
</body>
</html>
	
