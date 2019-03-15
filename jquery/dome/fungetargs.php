<?php
	//任意数量变量  相当于js中的arguments
	function stu_name(){
		$arr = func_get_args();
		foreach ($arr as $key => $value) {
			echo "学号{$key}的名字是{$value}<br/>";
		}
		echo "学生总数：".func_num_args().'<br/>';
		echo func_get_args()[1];
		echo func_get_arg(1).'<br/>';
	}
	stu_name('张三','李四','王五');



	//变量函数
	$a = "show_data";
	function show_data(){
		echo date("Y-m-d").'<br/>';
	}
	$a();  //变量名与函数名相同

	//递归
	function jc($i){

		if($i>1){
			$s = $i*jc($i-1);
		}else{
			$s = 1;
		}
		return $s;
	}

	echo jc(10);
	
?>