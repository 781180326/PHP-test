<?php 
$url='http://www.baidu.com'; 
$ch=curl_init(); 
$timeout=5; 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
$lines_string=curl_exec($ch); 
curl_close($ch); 
echo htmlspecialchars($lines_string);