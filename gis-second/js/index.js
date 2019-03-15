$(function(){
	var setting = {
		"width":900,
		"height":234,
	};
	Poster.init($(".poster-main"),setting);
});
		
$(function(){
	//图片预加载
	var oImg= document.getElementById('img');
	var oImage = new Image();
	var arr = [];
	for(var i = 1; i < 20; i++){
		arr[i] = "image/"+i+".jpg";
	}
	var icur = 0, i = 0;
	
	//先加载一张图片，加载完成后执行递归函数（进行图片预加载）
	oImage.src = arr[i];
	oImage.onload = function(){
		  oImg.src = arr[i];
		  getImg();
	}
	function getImg(){
		oImage.src = arr[icur];
		oImage.onload = function(){
			icur++;
			if(icur < arr.length){
				getImg();
			}  
		}
	}
			
	//show //hidden side-bar-hidden
	function hide(){
		$("#dide-bar div").animate({"left":"-410%"},300);
		$('#container').animate({"width":"95%"},300);	
	}
	$('#side-bar .nav #search ').click(function(){
		hide();
		$('#container').animate({"width":"75%"},500);
		$('#side-bar .side-hidden').eq($('.nav li').index(this)).animate({"left":"100%"},500);
	});
	//hidden side-bar-hidden
	$('#side-bar .side-hidden .none').click(hide);
	$('#side-bar .nav  #run').click(function(){
		hide();
		$('.box').add($('.box-hid-1')).css('display','block');
	});
	
	
	$('.marker_area').click(function(){
		$('#img-intro').html('');
		var htmlobj=$.ajax({
			url:'get.php?id='+$(this).attr('id'),
			async:false,
			type: "get",
			dataType: "text",
			success: function(data) {
				var obj =$.parseJSON( data );
				var star =  parseInt(obj['image_start']);

				for(var i = 0; i < parseInt(obj['imagenum']); i++){
					$('<img>').attr('src','image/'+(star+i)+'.jpg').appendTo('#img-intro');
					console.log(i);
				}
				$('.box-hid-2 .intro h3').html(obj['name']);
				$('.box-hid-2 .intro div p span').eq(0).html(obj['price']);
				$('.box-hid-2 .intro div p').eq(1).html(obj['intro']);
				$('.box-hid-2 .intro div p').eq(2).html(obj['where']);
			}/*,
			error:function(){
				alert("error");	
			}*/
		});
		$('.box').add($('.box-hid-2')).css('display','block');
	});
	$('.box .drop').click(function(){
		$('.box').add($('.box-hid-1')).add($('.box-hid-2')).css('display','none');
	});
	
});