<?php
	header("Content-type: text/html; charset=utf-8");
	require 'connect.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>introduce</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 	<div class="wrap">
 		<a href="index.php">主页</a>
		<?php
			if(isset($_GET["user_id"])){
				$dbs = mysqli_connect(host,name,pw);
					mysqli_select_db($dbs,"meities");

				if( !$dbs ->set_charset("utf8")){
					die("charset : no set");
				}
				mysqli_query($dbs,"set names utf8");


				$query = "select * from user_intro where user_id={$_GET["user_id"]}";
				$result = mysqli_query($dbs,$query) or die("error :query".mysqli_error($dbs));
				
				if(mysqli_num_rows($result)==1){
					$data = mysqli_fetch_assoc($result);
		?>
					<h2><?php echo "{$data["user_zh"]}的个人信息："  ?></h2>
					<!-- 这里应该还显示个人兴趣爱好，但是目前还没有建立这个表。 -->
					<table>
					<tr><td>姓名：</td><td><?php echo $data["user_name"]; ?></td></tr>
					<tr><td>性别：</td><td><?php echo $data["user_sex"]; ?></td>
					</tr>
					<tr><td>地址：</td><td><?php echo $data["user_address"]; ?></td></tr>
					
					<tr><td><img <?php echo "src='image/"."{$data["user_pic"]}' alt='{$data["user_name"]}'" ?> /></td></tr>
					</table>
		<?php
				}

				if($_GET["user_id"] == $_SESSION["user_id"]){
					echo "<a href='changeIntro.php'>修改个人信息</a>";
				}

				mysqli_close($dbs);
			}

		?>
</div>
 </body>
 </html>