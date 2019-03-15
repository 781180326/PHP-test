<?php 
/*$url='http://www.baidu.com'; 
$handle=fopen($url,"rb"); 
$lines_string=""; 
do{ 
    $data=fread($handle,1024);
     if(strlen($data)==0) {
        break;
    } 
    $lines_string.=($data.'<br/>'); 
}while(true); 
fclose($handle); 
echo htmlspecialchars($lines_string);*/

$handle=fopen('url.txt',"rb"); 
$data = fread($handle,512);
echo $data;