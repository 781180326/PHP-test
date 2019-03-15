<?php
	$aaa="我是你爸爸!";

	echo "aaaa$aaa\n<br/>";//如果不使用转义字符 \ 浏览器会把$ 符号当作变量开头，所以会输出变量
	// echo "aa$aaabbb\n";  //浏览器找不到$aaabbb变量
	echo "aa{$aaa}bbb\n<br/>";
	echo "aaaaa\$aaa<br/>";
	echo '$aaa<br/>';  //单引号不会识别转义,所以这样不会输出变量
	echo 'aa\n\t\r<br/>';//单引号不会识别转义
	echo 'aaa'.$aaa.'bbb<br/>';//单引号可以通过 . 来连接变量

	//定界符   <<<baibin后面不能有内容空格和tab都不能，EOF;前面不能有内容，空格或tab都不行，貌似老版本EOF;后面不能有分号(;)    
	//定界符中不需要转义就可表示想要表达的   当然，转义符也可以实现自己的转义作用
	//这个定界符中的<<<baibin  ...baibin ; 就是定界符
	$myname = <<<baibin
	<html>
		<head></head>
		<body>
			<h1>啊啊啊啊“$aaa"“\$aaa”</h1>
			<span>烦烦烦\</span>
		</body>
	</html>
baibin;
	echo $myname;


	$pwd = '781180326';
	$pass = <<<pass
	<div style="width:400px;height:400px;background-color:#ccc;border:1px solid #000;">
		$pwd
	</div>
pass;
	//最后一句前面不能有任何字符和空格，后面也不能有
	//定界符前面第一句后也不能有空格，只可以有换行
	echo "{$pass}\n";



	//资源resource
	//
	//
	//
	//删除变量
	// $heihei="";
	$heihei=null;
	var_dump($heihei);
	unset($heihei);
	// var_dump($heihei);//报错，删除了
	// var_dump($hou);//报错，不存在
	?>