<?php
	header("Content-Type: text/html;charset=utf-8");
	if(isset($_GET)){
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$dbs = mysqli_connect('localhost','root','781180326','webgis');
			mysqli_query($dbs,"set names utf8");
			$query = "select * from gisgaode where id={$id}";
			$result = mysqli_query($dbs, $query);
			$data =  mysqli_fetch_assoc($result);
			$str = '';
			foreach( $data as $key=>$value ){
				$str.="\"{$key}\":\"{$value}\",";
			}
			$str = substr($str, 0, -1);
			
			echo '{'.$str.'}';
		}
	}
?>