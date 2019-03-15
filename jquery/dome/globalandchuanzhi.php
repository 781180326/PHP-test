<?php
	
	function ech($name){
		echo $name.'在吃饭'.'<br/>';
	}
	ech('xiaobai');
	//echo $name;//报错，未定义变量
	// function ech(&$name){
	// 	echo $name.'在吃饭';
	// }
	// ech('xiaobai');报错，传址只能传变量
	function ech2(&$name){ //传址
		$name = $name."小姐";
		echo $name.'<br/>';
	}
	$name = 'aaa';
	ech2($name);
	echo $name.'<br/>';

	$aaa = 123;
	function haha(){
		$aaa = 222;   //函数内无法调用函数外变量
	}
	haha();
	echo $aaa.'<br/>';
	function he(){
		global $aaa;  //在函数内调用全局变量
		$aaa = 222;
	}
	he();
	echo $aaa.'<br/>';

	function h111(){
		global $ccc;   //强制定义全局变量
		$ccc = 4645;
	}
	h111();
	echo $ccc.'<br/>';

	$kkkkk = 'nnn';
	echo '<pre>';
	print_r($GLOBALS);
	echo '</pre>';
	function h222(){

		global $ccc;   //调用全局变量
		unset($ccc);	//移除函数内部的变量，虽然调用了全局变量，但是不影响函数外部变量
		//echo $ccc;   //undefined
	}
	h222();
	echo $ccc;



?>