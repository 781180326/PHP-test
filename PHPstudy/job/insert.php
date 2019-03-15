<?php
	header("Content-type: text/html; charset=utf-8");
	require 'connect.php';
	$dbs = mysqli_connect(host,name,pw) or die("error : connect1");
	mysqli_select_db($dbs,"php_project") or die("error : connect2");

	if( !$dbs ->set_charset("utf8")){
		die("charset : no set");
	}
	
	$value['西安'] = [["title"=>"电焊","description"=>"电焊焊工，啦啦啦啦啦啦啦啦啦啦啦啦啦啦阿拉啦啦啦啦啦阿拉啦啦啦啦啦啦爱啦啦阿拉啦啦...","zip"=>"10086","company"=>"西安科技大学"]];


	//在双引号中可以直接使用变量，但是对于数组之类的元素提取是会出错的，所以应该把变量放在大括号中{}
	foreach($value  as $key=>$values){
		foreach($values as $v){
			$query = "insert into job(title,description,city,zip,company,datatime) values('{$v['title']}','{$v['description']}','$key','{$v['zip']}','{$v['company']}',now())";
		}
	}
	

	// $query = "select distinct title,description,city,zip,company from job";
	$result = mysqli_query($dbs,$query) or die("query error". mysqli_error($dbs));
	//mysql_fetch_array是已关联索引数组取出！换了百分之百行
	// while($row = mysqli_fetch_assoc($result)){
	// 	foreach ($row as  $value) {
	// 		echo $value.'&nbsp;&nbsp;&nbsp;';
	// 	}
	// 	echo "<br/>";
	// }

		mysqli_close($dbs);

		//使用distinct 排除相同的行
?>