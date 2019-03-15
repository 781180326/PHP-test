<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	
	<?php 
	
		$dbs = mysqli_connect('localhost','root','781180326','PHP_project') or die("error for connect");
		//mysqli_select_db($dbs,'PHP_project');

		if(isset($_POST['submit'])){ //如果点击submit

			$delete = $_POST['delete']; //这里的 $_POST['delete'] 中存的是一个数组,因为在建立表单时，复选框的name 的值后面加上了 [] ，这个数组中存的是选中的各个复选框的值value

			foreach($delete as $k=>$value){
				$query = "delete from php_1 where id = $value";
				mysqli_query($dbs,$query) or die("error delete");
			}

			echo "reomove some people";
		}

	?>




	<!-- 动态建立表单  $_SERVER['PHP_SELF']是自己的地址 -->
	<form method="post" action=" <?php  echo $_SERVER['PHP_SELF']  ?> ">
	<?php 
		$query = "select * from php_1";
		$result = mysqli_query($dbs,$query) or die("error query");
		while($row = mysqli_fetch_array($result)){
			//这里的复选框的 name 值加上了 [] ,将选中的框的值存入一个名为 delete 的数组
			//复选框的value是数据库中当前行的id
			echo '<input type="checkbox" name="delete[]" value="'.$row['id'].'" />';
			echo $row['name'].' ';
			echo $row['email'].'<br/>';
		}
		mysqli_close($dbs);
	?>
	<input type="submit" value="remove" name="submit">
	</form>
</body>
</html>