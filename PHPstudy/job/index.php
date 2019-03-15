<?php 
header("Content-Type: text/html;charset=utf-8");
require 'connect.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>search danger job</title>
	<meta http-equiv="Content-Type" content="text/html;charset = utf-8">
	<style type="text/css">
	h1{color: red;text-shadow: 2px 2px 3px yellow;font-size: 50px;margin:15px;text-indent:2em;}
	p{margin:0;padding:0;color:#653223;}
	input{border-radius: 4px;box-shadow: 0px 0px 30px red;}
	input[name="jobname"]{width:200px;}
	</style>
</head>
<body>
	<h1>risky jobs</h1>
	<p>danger! your dream job is out there.</p>
	<p>do you have the guts to go gind it?</p>

	<h3>risky jobs - search</h3>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
	<fieldset>
		<legend>find your job</legend>
		<input type="text" name="jobname">
		<input type="submit" name="submit" value="submit">
	</fieldset>
	</form>


	<?php
		if(isset($_POST['submit'])){
			$jobname = $_POST['jobname'];
			$search = str_replace(',', '   ', $jobname);
			$reg = '/\s+/';
			$search_arr = preg_split ($reg, $search);
			$query_arr = [];
			foreach ($search_arr as $key => $value) {
				$query_arr[] = "description like '%{$value}%' ";
			}
			$query = implode(" or ", $query_arr);
			$dbs = mysqli_connect(host,name,pw);
			mysqli_select_db($dbs,'php_project');

			if( !$dbs ->set_charset("utf8")){
				die("not set");
			}
			// $dbs ->set_charset("utf8")   yes
			// mysqli_query($dbs, "SET NAMES UTF8");   yes
			//$mysqli_query("set names utf8");    no
			if(!empty($query)){
				$query = "select * from job where ".$query;
				$result = mysqli_query($dbs,$query) or die("error : query".mysqli_error($dbs));
				echo mysqli_num_rows($result)."<br>";//读取出来的全是乱码

				while($row = mysqli_fetch_assoc($result)){
					foreach ($row as  $value) {
						echo $value.'&nbsp;&nbsp;&nbsp;';
					}
					echo "<br/>";
				}
			}
		}

	?>
</body>
</html>