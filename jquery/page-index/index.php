<?php
    header("Content-Type: text/html;charset=utf-8");
    define('HOST','localhost');
    define('NAME','root');
    define('PWD','781180326');
    define('DATABASE','php_project');
    $dbs = mysqli_connect(HOST, NAME, PWD, DATABASE);
            mysqli_query($dbs,'set names utf8');//set names utf8   数据链接，查询操作
    $str = '';
    $id = 10*intval($str, 10);//字符串转十进制整数
    $query = "select * from jq order by id  LIMIT 10 OFFSET  {$id} ";//limit 要在 order by后面
    $result = mysqli_query($dbs, $query) or die('error'.mysqli_error($dbs));//要养成在开发阶段进行异常处理的习惯
    while( $data = mysqli_fetch_array($result) ){
        $str .= '"'.$data["name"].'":"' .$data["title"].'",';  //字符串拼接
    }
    $str = substr($str,0,-1);
    $str = '{'.$str.'}';
    echo $str;

    //json 数据格式 ： { "key":"value", "key":"value" }
?>