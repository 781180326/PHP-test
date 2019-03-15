<!DOCTYPE html>
<html>
<head>
	<title>addphp</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(isset($_POST["submit"])){
			$name = trim($_POST["name"]);
			$score = trim($_POST["score"]);
			$scoreshot = trim($_FILES["scoreshot"]["name"]);
			$scoresize = $_FILES["scoreshot"]["size"];
			$scoretype = $_FILES["scoreshot"]["type"];
			$MAX_SIZE = $_POST["MAX_SIZE"];


			if(!empty($name) && is_numeric($score) && !empty($scoreshot)){
				if($scoresize>0 && $scoresize<$MAX_SIZE && $scoretype == "image/gif" || $scoretype == "image/jpeg" || $scoretype == "image/pjpeg" || $scoretype == "image/png"){
					if($_FILES["scoreshot"]["error"] == 0){

						$target = "image/".$scoreshot;
						echo $_FILES["scoreshot"]["tmp_name"].'!!!!';
						//将临时文件另存为 $target路径
						if( move_uploaded_file($_FILES["scoreshot"]["tmp_name"],$target)){

							$dbs = mysqli_connect("localhost","root","781180326","php_project") or die("error in mysql_connect");

							$name = mysqli_real_escape_string($dbs,$name);
							$score = mysqli_real_escape_string($dbs,$score);
							$scoreshot = mysqli_real_escape_string($dbs,$scoreshot);

							$query="insert into php_score (date,name,score,scoreshot) values (NOW(),'$name', $score, '$scoreshot')";

							$data = mysqli_query($dbs,$query) or die("error in mysql_query");

							echo "<p>thsnks for add score!</p>";
							echo "<p><strong>name:</strong>".$name."<br/>";
							echo "<strong>score:".$score."<br/>";
							echo "<img src='".$target."'/></p>";
							echo "<p><a href='index.php'>back to score html </a></p>";

							mysqli_close($dbs);
						}

					}else{
						echo "the file up error";
					}


				}else {
					echo "please enter right image";
				}

				//删除临时文件
				@unlink($_FILES["scoreshot"]["tmp_name"]);
			}else {
				echo "please enter all of the information to add you height score.";
			} 
		}	
		
	?>
</body>
</html>