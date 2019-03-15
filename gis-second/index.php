<?php
	
	
	$markers = array(
		array('id'=>1,'name'=> '兵马俑','intro'=>'兵马俑，即秦始皇兵马俑，亦简称秦兵马俑或秦俑，第一批全国重点文物保护单位，第一批中国世界遗产，位于今陕西省西安市临潼区秦始皇陵以东1.5千米处的兵马俑坑内。','imagenum'=> 4,'image_start'=> 1,'local'=> '109.280651,34.384957','where'=>'西安市临潼区秦俑馆公路与秦陵北路交汇处东南','price'=>'￥3月15日-11月30日：150元/人；12月1日-3月14日：120元/人'),
		array('id'=>2,'name'=> '八大奇迹馆','intro'=>'世界八大奇迹馆坐落在陕西临潼骊山脚下。1995年建成并对游人开放。占地面积7180平方米。','imagenum'=> 3,'image_start'=> 5,'local'=> '109.280651,34.384957','where'=>'秦陵路中段168号','price'=>'￥30'),
		array('id'=>3,'name'=> '华清池','intro'=>'华清池，又名华清宫，包括原骊山国家森林公园，与颐和园、圆明园、承德避暑山庄并称为','imagenum'=> 3,'image_start'=> 8,'local'=> '109.211585,34.36474','where'=>'陕西省西安市临潼区华清路38号','price'=>'￥110'),
		array('id'=>4,'name'=> '临潼博物馆','intro'=>'西安临潼博物馆是一所地志性历史博物馆','imagenum'=> 3,'image_start'=> 11,'local'=> '109.217207,34.36428','where'=>'环城东路1号','price'=>'￥24'),
		array('id'=>5,'name'=> '王府井奥特莱斯临潼店','intro'=>'“奥特莱斯”是英文OUTLETS的中文直译。其英文原意是“出口、出路、排出口”的意思，在零售商业中专指由销售名牌过季、下架、断码商品的商店组成的购物中心，因此也被称为“品牌直销购物中心”。','imagenum'=> 3,'image_start'=> 14,'local'=> '109.175618,34.364142','where'=>'西安市临潼区凤凰大道11号王府井百货F2','price'=>'￥0'),
		array('id'=>6,'name'=> '骊山','intro'=>'中国四大皇家园林。骊山是秦岭山脉的一个支脉，海拔1302米，是秦岭晚期上升形成的突兀在渭河裂陷带内的一个孤立的地垒式断块山。','imagenum'=> 3,'image_start'=> 17,'local'=> '109.213704,34.36196','where'=>'西安市临潼区华清路3号','price'=>'￥110')
	);

	if(isset($_GET)){
        $str = '';
        $dbs = mysqli_connect('localhost','root','781180326','webgis');
        mysqli_query($dbs,"set names utf8");
        foreach( $markers as $key=>$value ){
            foreach( $value as $k=>$v ){
                $str.="'{$v}',";
            }
            $str = substr($str, 0, -1);
            $query = "insert into gisgaode values({$str})";
            $result = mysqli_query($dbs, $query) or die('error');
            $str = '';

        }
        echo $str;
	}


/*	CREATE TABLE `gisgaode` (
       `id` int(10)  NOT NULL AUTO_INCREMENT,
	   `name` varchar(50) not null,
       `intro` varchar(200) NOT NULL DEFAULT '',
       `imagenum` int NOT NULL,
      `image_start` int NOT NULL,
       `local` varchar(50) not null,
	   `where` varchar(50) not null,
	   `price` varchar(50) not null,
     PRIMARY KEY (`id`)
     ) ENGINE=MyISAM  DEFAULT CHARSET utf8 COLLATE utf8_general_ci;*/
	

?>