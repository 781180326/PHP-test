<?php
#加载页面
function curl_get($url){
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_HEADER,1);
    $result=curl_exec($ch);
    $code=curl_getinfo($ch,CURLINFO_HTTP_CODE);
    if($code!='404' && $result){
     return $result;
    }
    curl_close($ch);
}
#获取页面url链接
function get_page_urls($spider_page_result){
   $get_url_result=preg_match_all("/<a[^>]+href=(['\"])(.+)\\1/",$spider_page_result,$out);
   if($get_url_result){
     return $out[1];
   }else{
     return;
   }
}
#相对路径转绝对路径
function xdtojd($base_url,$url_list){
 if(is_array($url_list)){
  foreach($url_list as $url_item){
    if(preg_match("/<a[^>]+href=[\"']([^\"']+)[\"'][^>]+>/",$url_item)){
      $result_url_list[]=$url_item;
    }else {
     if(preg_match("/^\//",$url_item)){
      $real_url = $base_url.$url_item;
     }else{
      $real_url = $base_url."/".$url_item;
     }
     #$real_url = 'http://www.sumpay.cn/'.$url_item; 
     $result_url_list[] = $real_url; 
    }
  }
   return $result_url_list;
 }else{
   return;
 }
}
#删除其他站点url
function other_site_url_del($jd_url_list,$url_base){
 if(is_array($jd_url_list)){
  foreach($jd_url_list as $all_url){
    echo $all_url;
    if(strpos($all_url,$url_base)===0){
     $all_url_list[]=$all_url;
    }  
  }
  return $all_url_list;
 }else{
  return;
 }
}
#删除相同URL
function url_same_del($array_url){
   if(is_array($array_url)){
     $insert_url=array();
     $pizza=file_get_contents("url.txt");
     if($pizza){
        $pizza=explode("\r\n",$pizza);
        foreach($array_url as $array_value_url){
         if(!in_array($array_value_url,$pizza)){
          $insert_url[]=$array_value_url; 
         }
        }
        if($insert_url){
           foreach($insert_url as $key => $insert_url_value){
             #这里只做了参数相同去重处理
             $update_insert_url=preg_replace('/=[^&]*/','=leesec',$insert_url_value);
             foreach($pizza as $pizza_value){
                $update_pizza_value=preg_replace('/=[^&]*/','=leesec',$pizza_value);
                if($update_insert_url==$update_pizza_value){
                   unset($insert_url[$key]);
                   continue;
                }
             }
           }
        }     
     }else{
        $insert_url=array();
        $insert_new_url=array();
        $insert_url=$array_url;
        foreach($insert_url as $insert_url_value){
         $update_insert_url=preg_replace('/=[^&]*/','=leesec',$insert_url_value);
         $insert_new_url[]=$update_insert_url;  
        }
        $insert_new_url=array_unique($insert_new_url);
        foreach($insert_new_url as $key => $insert_new_url_val){
          $insert_url_bf[]=$insert_url[$key];
        } 
        $insert_url=$insert_url_bf;
     }
     return $insert_url;
   }else{
    return; 
   }
}
$argv = array('http://www.baidu.com');
$current_url=$argv[0];
$fp_puts = fopen("url.txt","ab");//记录url列表 
$fp_gets = fopen("url.txt","r");//保存url列表 
$url_base_url=parse_url($current_url);
if($url_base_url['scheme']==""){
  $url_base="http://".$url_base_url['host'];
}else{
  $url_base=$url_base_url['scheme']."://".$url_base_url['host'];
}
do{
  $spider_page_result=curl_get($current_url);
  $url_list=get_page_urls($spider_page_result);
  if(!$url_list){
   continue;
  }
  $jd_url_list=xdtojd($url_base,$url_list);
  $h =  htmlspecialchars(implode('', file( $jd_url_list[0] ))) ;
  $b=preg_match_all("/((http|ftp|https):\/\/)[\w\-_]+(\.[\w\-_]+)+/",$h,$result);

	for($i = 0; $i < $b; $i++){
		 fputs($fp_puts,$result[0][$i]."\r\n"); 
	}
		
}while ($current_url = fgets($fp_gets,1024));//不断获得url 
preg_match_all("/<a[^>]+href=[\"']([^\"']+)[\"'][^>]+>/",$spider_page_result,$out);
fclose($fp_puts);
fclose($fp_gets);
#echo a href;
#var_dump($out[1]);
?>