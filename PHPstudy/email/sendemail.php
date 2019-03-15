<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style>
	label{display: block;}
	input{margin-bottom: 10px;margin-top: 2px;width:150px;}
	textarea{width:150px;}
	</style>
</head>
<body>
	<h2>use php send email for database</h2>
	<?php
		
		$subject = "";/*先复制为空字符串，否则第一次直接从sendemail.php近入会找不到 $subject 和$text ，第一次直接从sendemail.php进入没有submit 所以第一个判断进不去，如果在这里就赋值POST，那第一次进入的时候也找不到值，会有警告*/
		$text = "";

		if(isset($_POST["submit"])){ //如果没有点击submit，$_POST["submit"]是没有设置的，所以必须点击提交按钮，才能进入这里，比如第一次直接从sendemail.php进来就不会进这个判断里面
			$subject = $_POST["subject"];
			$text = $_POST["text"];
			$onoff = false;
			if( empty($subject) && empty($text) ){
				echo "your subject and text not write";
				$onoff = true;
			}
			if( !empty($subject) && empty($text) ){
				echo "your text not write";
				$onoff = true;
			}
			if( empty($subject) && !empty($text) ){
				echo "your subject not write";
				$onoff = true;
			}
			if( !empty($subject) && !empty($text) ){

				$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("mysql connect error");

				$query = "select * from php_1";

				$result = mysqli_query($dbs,$query) or die("mysql query error");

				while($arr = mysqli_fetch_array($result)){
					echo "name:".$arr["name"]." email:".$arr["email"]."<br/>";
					echo "$subject <br/>";
					echo "$text  <br/><br/><br/>";
				}

				mysqli_close($dbs);
			}
		}else{
			$onoff = true;
		}

		if($onoff){
	?>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label for="subject">subject:</label>
			<input type="text" id="subject"  name="subject" value="<?php echo $subject; ?>"><br/>
			<label for="text">text:</label>
			<textarea id="text" name="text"><?php echo $text; ?></textarea><br>
			<input type="submit" value="sendemail" name="submit">
		</form>

	<?php

		}

	?>

</body>
</html>