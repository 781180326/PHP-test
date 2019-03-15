(function(){
	//创建地图，设置坐标中心、缩放级别
	var map = new AMap.Map("container", {
		resizeEnable: true,
		center: [109.214749,34.37519],
		zoom: 13
	});

	map.clearMap(); // 清除地图覆盖物
	
	//定义marker对象数组
	var markers = [{
			id: 1,
			name: '兵马俑',
			icon: '1.jpg',
			position: [109.280651,34.384957]
		},
		{	
			id: 2,
			name: '八大奇迹馆',
			icon: '5.jpg',
			position: [109.233311,34.379892]
		},
		{	
			id: 3,
			name: '华清池',
			icon: '8.jpg',
			position: [109.211585,34.36474]
		},
		{	
			id: 4,
			name: '临潼博物馆',
			icon: '11.jpg',
			position: [109.217207,34.36428]
		},
		{
			id: 5,
			name: "王府井奥特莱斯临潼店",
			icon: '14.jpg',
			position: [109.175618,34.364142]
		},
		{
			id: 6,
			name: "骊山",
			icon: '17.jpg',
			position: [109.213704,34.36196]
		}
	];

	// 添加marker
	markers.forEach(function(marker) {
		new AMap.Marker({
			map: map,
			position: [marker.position[0], marker.position[1]],
			offset: new AMap.Pixel(-17, -42), 
			draggable: false,
			content: '<div class="marker_area" id="'+ marker.id + '"><div class="photo_thumb" style="background-image:url(image/' + marker.icon + ')"></div><span class="marker_area_name">'+ marker.name + '</span></div>' 
		});
	});


	AMap.plugin(['AMap.Autocomplete','AMap.PlaceSearch'],function() {
		var autoOptions = {
			input: "inputSearch"//使用联想输入的input的id
		};
		//构建输入提示类
		autocomplete = new AMap.Autocomplete(autoOptions);

		//构造地点选择类
	   var placeSearch = new AMap.PlaceSearch({
			map: map
		});

		//注册监听，当选中某条记录时会触发
		AMap.event.addListener(autocomplete, "select", select);
		//注意要对查询到的列表中的地点进行select（请注意这里的autocomplete 就是上面的autocomplete）
		// 也就是说第一个参数一定要是Autocomplete出来的输入提示对象
		function select(e) {
			if (e.poi && e.poi.location) {
				map.setZoom(15);
				map.setCenter(e.poi.location);
			}
		}
	});



	//添加缩放、移动条
	window.onload = function () {
		map.plugin(["AMap.ToolBar"], function () {
			map.addControl(new AMap.ToolBar());
		});
	};
	var newCenter = map.setFitView();


	//鼠标事件
	var mapContainer = $("#container");
	mapContainer.on("mouseenter", ".marker_area", function () {
		$(this).addClass("photo_hover");
	});
	mapContainer.on("mouseleave", ".marker_area", function () {
		$(this).removeClass("photo_hover");
	});
	


	//点击回到中心点
	AMap.event.addDomListener(document.getElementById('setCenter'), 'click', function () {
		
		map.setZoomAndCenter(14, [109.214749, 34.37519]);
		var marker = new AMap.Marker({
			map: map,
			position: [109.214749, 34.37519]
		});
	});
	
	//添加测距插件
	 map.plugin(["AMap.RangingTool"], function() {
		ruler1 = new AMap.RangingTool(map);
		AMap.event.addListener(ruler1, "end", function(e) {
			ruler1.turnOff();
		});
	
		//启用默认样式测距
		function startRuler1() {
			ruler1.turnOn();
		}

		$("#default-measure").on('click',this,function(){
				startRuler1();
		});
	});
	
					
					
})();