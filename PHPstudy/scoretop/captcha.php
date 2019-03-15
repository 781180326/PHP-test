<?php
	define("CHPTCHA_NUMCHARS",6);
	define("CAPTCHA_WIDTH", 100);
	define("CAPTCHA_HEIGHT", 25);
	$pass_phrase = "";
	for($i = 0; $i < CHPTCHA_NUMCHARS; $i++){
		$pass_phrase .= chr(rand(97,122));	
	}
	
	$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);
	
	$bg_color = imagecolorallocate($img, 255, 255, 255);
	$text_color = imagecolorallocate($img, 0, 0, 0);
	$graphic_color = imagecolorallocate($img, 0, 100, 64);
	
	imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);
	
	for($i = 0; $i < 5; $i++){
		imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
	}
	
	for($i = 0; $i < 50; $i++){
		imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
	}
	
	//imagestring($img, 5, 5, 5, $pass_phrase,  $text_color);
	imagettftext($img, 24, 0, 5, CAPTCHA_HEIGHT, $text_color,  "yankclipper2lasital.ttf", $pass_phrase);
	
	setcookie("CHPTCHA", $pass_phrase,time()+3600);
	
	header("Content-type: image/png;");//向浏览器请求png图片，浏览器只返回png图片
	
	imagepng($img);
	imagedestroy($img);	
	
	
?>