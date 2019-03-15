<?php 
$url='http://www.baidu.com'; 
$lines_array=file($url,FILE_IGNORE_NEW_LINES ); 
//$lines_string=implode('',$lines_array); 
//echo htmlspecialchars($lines_string); 
var_dump( $lines_array );

foreach ($lines_array as $line_num => $line) {
    echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}