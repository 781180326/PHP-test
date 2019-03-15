<?php
	header("Content-type: text/html; charset=utf-8");
	require "connect.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>sign</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
	$string = "";
	if(isset($_POST['submit'])){
		if( !empty($_POST['userzh']) && !empty($_POST['userpw']) ){
			$zh = trim($_POST['userzh']);
			$pw = $_POST['userpw'];
			
			$dbs = mysqli_connect(host,name,pw);
				mysqli_select_db($dbs,"meities");
			$query = "select * from user_intro where user_zh='{$zh}'";
			$data = mysqli_query($dbs,$query)  or die("error:mysql query".mysqli_error($dbs));
			if( mysqli_num_rows($data) == 0 ){
				$query = "insert into  user_intro(user_zh,user_pw,create_date)  values( '{$zh}' , SHA({$pw}) ,now())";
				mysqli_query($dbs,$query) or die("error:mysql query");
				$string = "<strong>sign ok</strong>";
			}else{
				$string = "<p>this username not use,you notfirst</p>";
			}

			mysqli_close($dbs);
		}else{			
			$string = "<p>please enter username and password</p>";
		}
	}
?>
<body >
	<div class="wrap">
		<h2>sign : in meities</h2>
		<p><?php echo $string;?></p>
		<form method="POST" action=" <?php echo $_SERVER['PHP_SELF'] ?>">
			<label  for="userzh">username:</label>
			<input type="num" name="userzh" id="userzh" value="<?php $zh ?>">
			<span></span>
			<label for="userpw">password:</label>
			<input type="password" name="userpw" id="userpw">
			<input type="submit" name="submit" value="submit">
			<?php echo "<a href='sign.php'>登陆</a>     <a href='index.php'>返回主页</a>"; ?>
		</form>
	</div>
	<script>
	var userzh = document.forms[0].userzh;
	document.forms[0].onsubmit = function(){
		if( !username.nextElementSibling.innerHTML == '' ){
			alert("请输入合法字符");
			return false;
		}
	}
	userzh.oninput = function(){
		var strArr = this.value.split("");
		this.nextElementSibling.innerHTML = '';
		this.style.cssText = "";
		for( var i = 0, length = strArr.length; i < length; i++){
			if(strArr[i] == " "){
				this.nextElementSibling.innerHTML = '请输入合法字符';
				this.style.cssText = "border:1px solid red";
			}
		}
	}
	</script>
</body>
</html>
