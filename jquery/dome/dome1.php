<?php
	echo "常量、魔术变量、判断是否是变量、是否是常量";
	$myname = "aaaaaaa";//定义在 bianliangyu()函数的外面，所以函数内找不到
	define("MYNAME","baibinisme");
	echo $myname."<br/>";
	function bianliangyu(){//检测变量域
		// echo $myname;//并不能找到，当前范围内未定义 $myname，所以常规定义的变量算是局部变量
		echo MYNAME;//因为是常量，所以在当前范围内能找到，相当于全局变量
	}
	bianliangyu();
	echo "<br/>";
	$f=isset($myname);
	if($f){
		echo $myname;
	}else{
		echo 'false';
	}


	define ('NAME','baibin');
	echo NAME;
	if(defined('NAME')){
		echo "<br/>______true";
	}else{
		echo  "false";
	}


	echo __LINE__."<br/>";//输出当前行数
	echo __FILE__."<br/>";//输出文件地址


	function fun1(){
		echo __FUNCTION__;
	}
	fun1();
	echo "<br/>";
	class AA{
		public $hi = "白斌是帅哥！";//前面必须加上public  不然报错
		function fun2(){
			echo __CLASS__."<br/>";//输出所在类
			echo __METHOD__."<br/>";//输出所在类和当前方法
		}
	}
	$aa = new AA();
	$aa->fun2();//直接会调用类里面的方法
	echo $aa->hi;//不加echo 不会显示，所以相当于一个变量，但是注意，hi前面不能加$
?>