<?php 
$url='http://www.baidu.com'; 
$lines_string=file_get_contents($url); 
echo htmlspecialchars($lines_string); 


