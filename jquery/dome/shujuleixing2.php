<?php
	//php是一个弱类型语言
	$myhome = '陕西省礼泉县';
	var_dump($myhome);
	$myhome2 = array('陕西','咸阳',3,4);
	var_dump($myhome2);

	//gettype(变量或常量);     用于检测,会返回变量会常量类型
	if(getType($myhome2)=='array'){
		echo '这是一个数组，可以进行遍历'.'<br/>';
	};
	echo getType($myhome).'<br/>';
	echo var_dump(getType($myhome)).'<br/>';

	//is_int() is_float() is_array() is_object() is_null()  is_resource() is_bool()   这些都返回布尔值
	define('NAME',100);
	var_dump(is_string(NAME));
	if(is_int(NAME)){
		echo '这是一个字符串'.'<br/>';
	}

	$student = array('张三','李四');
	if(is_array($student)){
		foreach($student as $key=>$value){
			echo 'student'.$key.'姓名是'.$value.'<br/>';
		}
	}