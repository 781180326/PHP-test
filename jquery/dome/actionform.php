<?php
	//empty()测试是否为空
	$uname = empty($_POST['uname']) ? "没有填写姓名":$_POST['uname'];
	$age = empty($_POST['age']) ? "没有填写年龄":$_POST['age'];
	$tel = empty($_POST['tel']) ? "没有填写电话":$_POST['tel'];
	$address = empty($_POST['address']) ? "没有填写地址":$_POST['address'];
	$qq = empty($_POST['qq']) ? "没有填写qq":$_POST['qq'];
	$msg = empty($_POST['msg']) ? "没有填写自我评价":$_POST['msg'];
	echo "姓名：{$uname}<br/>年龄：{$age}<br/>电话：{$tel}<br/>地址：{$address}<br/>qq：{$qq}<br/>自我评价：{$msg}";
?>