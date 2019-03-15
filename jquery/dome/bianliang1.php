<?php
	//变量
	$home = "陕西省咸阳市礼泉县";
	$here = $home;//传值
	$there = &$home;//传址
	echo $home;
	echo "<br>";
	echo $here;
	echo "<br>";
	echo $there;
	$there = "咸阳市史德镇";//传址后别名的值改变，他的值就会改变
	echo "<br>";
	echo $there;

	//常量  命名规则建议大写
	define("MYHOME","中国付家庄");
	echo "<br>";
	echo MYHOME;
	define("MHOME","中国中国");//常量的值不会更改
	echo "<br>";
	echo MYHOME;
	echo "<br>";
	//函数
	function fun1(){
		//echo $home;//报错，作用范围不对，变量必须在函数范围内才能获取
		echo MYHOME;
		$home = "啦啦啦，我家在礼泉";
		echo "<br>";
		echo $home;
	}
	fun1();

	echo "<br>";
	echo M_PI;//PI常量
	echo "<br>";
	echo PHP_OS;//操作系统常量
	echo "<br>";
	echo PHP_VERSION;//PHP版本常量

	//魔术常量   不同环境会返回不同的值
	echo "<br>";
	echo __LINE__;//返回当前代码行号   是两个下划线
	echo "<br>";
	echo __FILE__;//返回当前文件在服务器端的位置
	echo "<br>";

	function fun2(){
		echo __FUNCTION__;//返回当前函数名
	}
	fun2();
	echo "<br>";

	class class1{
		function fun3(){
			echo __CLASS__;//返回当前类名
			echo "<br/>--------------------------<br/>";
			echo __METHOD__;//返回类的当前方法
		}
	}
	$object1 = new class1();//实例化一个对象
	$object1->fun3();//对象调用方法

	echo "<br>";
	// echo $qqqqqq;//没有这个变量，报错；
	var_dump($qqqqqq);//报错，并返回null
	var_dump($home);//获取变量的类型
	$f = isset($qqqqqq);//检测变量是否存在,返回boolean值
	var_dump($f);
	echo "<br>";
	$d = isset($home);
	if($d){
		echo $home;
	}else{
		echo "变量不存在";
	}



	echo "<br>";

	//检测常量是否存在  define是定义   defined是检测
	$de = defined("URL");
	if($de){
		echo URL;
	}else{
		echo "您没有定义URL常量，请定义";
	}


?>