<?php
	$a = array("ad"=>"白斌","ap"=>null);

	var_dump(isset($a["ap"]));//boolean false
	/*@  :屏蔽错误信息*/
	/*
		$file_name = 'aaa.txt';
		$file = fopen($file_name,'r');
		$content = fread($file, filesize($file_name));

	 */
	$file_name = 'aaa.txt';
	$file = @fopen($file_name,'r');
	$content = @fread($file, filesize($file_name));
	echo $content;


	$str = "a   b  c d";
	$arr1 = explode(" ",$str);
	var_dump($arr1) ; /*
	array (size=7)
  0 => string 'a' (length=1)
  1 => string '' (length=0)
  2 => string '' (length=0)
  3 => string 'b' (length=1)
  4 => string '' (length=0)
  5 => string 'c' (length=1)
  6 => string 'd' (length=1)
	*/
  echo count($arr1);//7
?>