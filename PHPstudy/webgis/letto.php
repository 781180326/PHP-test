<!DOCTYPE html>
<html>
<head>
	<title>临潼区旅游网</title>
	<meta charset="utf-8">
	<base target="_blank">
	<link rel="shotcut icon" type="image/x-icon" href="image/index.ico">
	<meta name="description" content="临潼区旅游网，来自西安科技大学">
	<meta name="keywords" content="兵马俑、临潼、华清池、八大奇迹、西安科技大学">
    <link href="css/css.css" rel="stylesheet" type="text/css">
	<link href="css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
	
    <!-- nav start -->
	<div class="wrap"> 
		<div id="header" class="gradient radiu">
			<div class="icon"></div>
            <div class="nav">
            	<ul>
                	<li><a href="index.html">首页</a></li>
                    <li><a href="#">历史</a></li>
                    <li><a href="#">景点</a></li>
                    <li><a href="#">住宿</a></li>
                    <li><a href="#">推荐</a></li>
                    <li><a href="#">周边地图查询</a></li>
                </ul>
            </div>
		</div>
	</div>
    <!-- nav end -->
    
    
    
    <!-- content start -->
    <div class="wrap">
    	<div id="content" class="gradient radiu">
        	<?php
				if( isset($_GET["id"])){
					$dbs = mysqli_connect("localhost","root","781180326","webgis");
					mysqli_query($dbs,"set names utf8");
					$query = "select * from webgis where id = {$_GET['id']}";
					
					$result = mysqli_query($dbs,$query);
					$row = mysqli_fetch_assoc($result);
					$i = $row["img_index"];
					$index = $i + $row["img_num"];
						
					echo "<div style='float:left;width:70%;'>";
					while($i < $index ){
						echo "<div style='float:left;width:30%;height:250px;background:#ccc;margin-right:3%;margin-bottom:10px;'>
							<img style='width:100%;height:250px;' src= 'image/{$i}.jpg ' />
						</div>";
						$i ++;
					} 
					echo "</div>";
					
					echo "<div style='float:right;right:10px;margin-top:10px;width:30%;text-align:left;';>";
					echo "<p>景点名称:  <span>{$row['name']}</span></p>";
					echo "<p>门票价格:  <span>{$row['price']}</span> </p>";
					echo "<p>景点介绍:  <span>{$row['introduce']}</span></p>";
					echo "<p>开放时间:  <span>{$row['opentime']}</span> - <span>{$row['closetime']}</span></p>";
					echo "</div>";
					
					mysqli_close($dbs);
				}
				
				
			?>
        		
        </div>
    </div>
	<!-- content end -->
    
    <!-- footer start -->
    <div class="wrap">
        <div id="footer" class="gradient radiu">
            ©2017 
            <a href="#">西安科技大学</a>
            <a href="#">authod:bwhite</a>
        </div>
    </div>
    <!-- footer end -->
    <script src="js/MyClass.js" type="text/javascript"></script>

</body>
</html>