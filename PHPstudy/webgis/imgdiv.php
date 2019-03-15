<?php
	header("Content-type: text/html; charset=utf-8");
	$dbs = mysqli_connect("localhost","root","781180326","webgis");
		   mysqli_query($dbs,"set names utf8");
	$query = "select img_index,img_num from webgis where id={$_GET['id']}";
	$result = mysqli_query($dbs,$query);
	$row = mysqli_fetch_assoc($result);
	$img_index = $row['img_index'];
	$img_num = $row['img_num'];
	$str = '';
	for($i = $img_index; $i < ($img_num + $img_index); $i++){
		$str .= "image/{$i}.jpg ";
	}
	echo $str;
	
?>