<?php
	//转换方式：
	//	1、自由转换
	//	2、强制转换   不会改变原变量
	//	3、settype()  作用于原变量
	//	4、具体转换函数   intval()转换为整形 floatval()转换为浮点型 strval()转换为字符串型  只针对标量类型  ：  int  float string bool
	
		
	
	//强制转换

	$a = 100;
	$a1 = (string)$a;
	var_dump($a1);
	var_dump($a);

	$b = '2008北京奥运会';
	$b = (int)$b;
	var_dump($b);

	$c = '今年2008北京奥运会';
	$c = (int)$c;
	var_dump($c);

	$d = '2008.8北京奥运会';
	$d = (float)$d;
	var_dump($d);

	$d = (int)$d;
	var_dump($d);

	$d = (array)$d;
	var_dump($d);


	//settype()
	
	$e = '2016年8月';
	settype($e,'float');
	var_dump($e);

	settype($e,'array');
	var_dump($e);

	// $e =  array('baidu','xinlang');
	// settype($e,'string');
	// var_dump($e);  报错，不能直接将数组转为字符串


	//具体转换函数
	
	$f ='500';
	$g = intval($f);
	var_dump($g); 
	var_dump($f); 

	$g = floatval($f);
	var_dump($g); 

	$g = strval($f);
	var_dump($g); 

	class user{

	}
	$h = new user();
	var_dump($h);
	// $h = strval($h); 报错  只作用于标量类型，object不是标量
	 
	$h = array('Baidu','xinlang','google');
	var_dump($h);
	// $h = strval($h);报错，只作用于标量类型，object不是标量

?>

