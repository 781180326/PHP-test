<?php
	header("Content-type: text/html; charset=utf-8");
	require 'connect.php';
	session_start();
	$string = "";
	$dbs = mysqli_connect(host,name,pw);
		mysqli_select_db($dbs,"meities") or die("connet error");

	if(isset($_SESSION["user_id"])){
		$query = "select * from user_intro where user_id = {$_SESSION["user_id"]}";
		$result = mysqli_query($dbs,$query);
		$row = mysqli_fetch_assoc($result);
		$string = "welcome {$row["user_name"]} ,<a  href='?out=1' >注销</a>";
	}
	if(isset($_GET["out"])){
		$_SESSION = array();
		setcookie("user_id",'',time()-360000);
		setcookie(session_name(),"",time()-3600);
		session_destroy();
		$string = "<a href='index.php'>主页</a>";
	}
	if(isset($_POST["submit"])){
		if( !empty($_POST["userzh"]) && !empty($_POST["userpw"]) ){
			$userzh = trim($_POST["userzh"]);
			$userpw = $_POST["userpw"];

			$query = "select * from user_intro where user_zh='{$userzh}' and user_pw=SHA({$userpw})";
			$result = mysqli_query($dbs,$query) or die("error query");
			if(mysqli_num_rows($result) == 1){
				$data = mysqli_fetch_assoc($result);
				$_SESSION["user_id"] = $data["user_id"];
				setcookie("user_id",$data["user_id"],time()+360000);
				$string = "sign in , welcome {$data["user_zh"]},<a href='index.php'>主页</a>";
			}else{
				$string = "请输入正确的用户名和密码";
			}
		}else{
			$string = "请输入用户名和密码";
		}
	}
	mysqli_close($dbs);
?>
<!DOCTYPE html>
<html>
<head>
	<title>meities sign</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<h2>sign : in meities</h2>
		<p><?php echo $string;?></p>
		<?php if(!isset($_SESSION["user_id"])){?>
		<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
			<label for="userzh">username:</label>
			<input type="text" name="userzh" id="userzh">
			<label for="userpw">password</label>
			<input type="password" name="userpw" id="userpw">
			<input type="submit" name="submit" value="sign in">
		</form>
		<?php  }; ?>
	</div>
</body>
</html>

