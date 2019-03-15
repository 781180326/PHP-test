<?php
	//问题  中文乱码？？？已解决   解决乱码问题之后要创建新的数据库表。用来存放个人爱好，和爱好分类


	header("Content-type: text/html; charset=utf-8");
	require "connect.php";
	session_start();
	//数据库得新建爱好表，组织表结构，添加爱好选择
	if(isset($_POST["submit"])){
		$name = trim($_POST["name"]);
		$sex = $_POST["sex"];
		$address = trim($_POST["address"]);
		$birthday = $_POST["birthday"];
		$pic = trim($_FILES["pic"]["name"]);
		$pic_size = $_FILES["pic"]["size"];
		$pic_type = $_FILES["pic"]["type"];
		$re = "/^image\//i";
		$dbs = mysqli_connect(host,name,pw);
			mysqli_select_db($dbs,"meities");
		if( !$dbs ->set_charset("utf8")){
			die("charset : no set");
		}
		mysqli_query($dbs,"set names utf8");
		$name = mysqli_real_escape_string($dbs,$name); //格式化字符串里的非法字符
		$address = mysqli_real_escape_string($dbs,$address);

		//正则匹配:preg_match返回匹配的个数，可以有第三个参数，第三个参数存储匹配的值   
		if(preg_match($re, $pic_type)==1 && $pic_size>0 ){

			if($_FILES["pic"]["error"]==0){

				$target = "image/".$pic;
				//echo $_FILES["pic"]["tmp_name"].'!!!!';//上传到服务器上的路径名
				//将临时文件另存为 $target路径
				if( move_uploaded_file($_FILES["pic"]["tmp_name"],$target)){
					if(!empty($birthday)){
						$query = "update user_intro set user_name='{$name}',user_sex='{$sex}',user_address='{$address}',user_birthday='{$birthday}',user_pic='{$pic}' where user_id={$_SESSION["user_id"]}";
					}else{
						$query = "update user_intro set user_name='{$name}',user_sex='{$sex}',user_address='{$address}',user_pic='{$pic}' where user_id={$_SESSION["user_id"]}";
					}
					
					$result = mysqli_query($dbs,$query) or die("error:query1".mysqli_error($dbs));
					
					echo "ok";
					
				}
			}else{
				echo "文件上传出错";
			}
		}else{

			echo "文件类型出错或者没有上传文件";
			if(!empty($birthday)){
				$query = "update user_intro set user_name='{$name}',user_sex='{$sex}',user_address='{$address}',user_birthday='{$birthday}' where user_id={$_SESSION["user_id"]}";
			}else{
				$query = "update user_intro set user_name='{$name}',user_sex='{$sex}',user_address='{$address}' where user_id={$_SESSION["user_id"]}";
			}
			
			$result = mysqli_query($dbs,$query) or die("error:query1".mysqli_error($dbs));
			
			echo "ok";
		}

	}

?>
	
<!DOCTYPE html>
<html>
<head>
	<title>changeintro</title>
	<meta charset="utf-8">
	<style>
	body{background:-webkit-linear-gradient(top,yellow,#75ed75,yellow);
			background:-moz-linear-gradient(top,yellow,#75ed75,yellow);
			background:-ms-linear-gradient(top,yellow,#75ed75,yellow);
			background:linear-gradient(top,yellow,#75ed75,yellow);
			-ms-filter:"progid:DXImageTransform:Microsoft.gradient(GradientType=0,startColorstr=#ffffff,endColor = #f8f8f8)";
			+background:#f9f9f9;}
	.wrap{width:600px;margin:0 auto;}
	h2{color:green; text-shadow: 3px 3px 2px yellow; font-size: 3em;}
	p{margin-bottom: 10px; color: red;}
	span{color:red;}
	img{border:none;}
	div{margin-top:8px;}
	a{text-decoration: none;color:green;}
	label{display: inline-block;width:80px;text-align: center;}
	input{border-radius: 6px;border:1px solid blue;margin:3px 0 10px 0;}
	input[type=text]{text-indent: 6px;}
	input[type=submit]{width:60px;margin-top: 50px;}
	</style>
</head>
<body>
	<div class="wrap">
		<h2>meities : 个人信息</h2>
		<ul><li><a href="index.php">主页</a></li></ul>

		<!-- 上传文件 必须在表单里加上 enctype="multipart/form-data" -->
		<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" >
			<label for="name">姓名：</label>
			<input type="text" name="name" id="name"><br>
			<label for="sex">性别：</label>
			<input type="radio" name="sex" id="sex" value="1" checked>男
			<input type="radio" name="sex" id="sex" value="0">女<br>
			<!-- 地址这里应该用select option，用js的方法获取地址 -->
			<!-- <select>
				<option>aaaa</option>
				<option>bbbb</option>
				<option>aaaa</option>
			</select> -->
			<label for="address">地址：</label>
			<input type="text" name="address" id="address"><br>
			<label for="birthday">生日：</label>
			<input type="date" name="birthday" id="birthday"><br>
			<label for="pic">上传照片:</label>
			<input type="file" name="pic" id="pic"><br>
			<input type="submit" name="submit" value="修改">
		</form>
	</div>
</body>
</html>