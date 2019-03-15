MyClass = {

	imgdiv: function(){//ajax加载
		var recommend = document.getElementById('recommend'),
			aLi = recommend.getElementsByTagName('li'),
			show_div = recommend.getElementsByTagName('div')[0],
			aImg = show_div.getElementsByTagName("img");
		
		for( var i=0; i<aLi.length; i++ ){
			aLi[i].onclick = function(){
				for( var i=0; i<aLi.length; i++ ){
					aLi[i].className = "";
				}
				this.className = "action";
				var id = this.dataset.id;
				var xml = new XMLHttpRequest();
				xml.open('get',"imgdiv.php?id="+id,true);
				xml.send();
				xml.onreadystatechange = function(){
					if(xml.readyState == 4){
						if(xml.status == 200){
							var arr = xml.responseText.split(" ");
							for(var i = 0; i < aImg.length;i++){
								aImg[i].src = arr[i];
							}
						}
					}
				}
					
			}
		}
	},
	pic_num: function(){//轮播图函数
			var pic_div = document.getElementById('pic-href'),
				pic_ul = pic_div.getElementsByTagName("ul")[0],
				pic_Li = pic_div.getElementsByTagName("li"),
				pic_prev = document.getElementById("prev"),
				pic_next = document.getElementById("next"),
				pic_span = pic_div.getElementsByTagName("p")[0].getElementsByTagName("span"),
				len = pic_Li.length,
				index = 0;
				
			function move(){
				if( ++index === len ){
					index = 0;
					pic_ul.style.left = 0 + "px";
				}
				pic_ul.style.left = ( -900 * index ) + "px";
			 }
			
			function btn_show(){
				clearInterval( pic_div.timer );
				pic_prev.style.display = "block";
				pic_next.style.display = "block";
			}
			function btn_hide(){
				pic_div.timer = setInterval(move, 2000);
				pic_prev.style.display = "none";
				pic_next.style.display = "none";
			}
			function prev_down(){
				( --index == -1 ) && ( index = len-1 );
				pic_ul.style.left = ( -900 * index ) + "px";
				clearInterval( pic_div.timer );
				return false;
			}
			function next_down(){
				( ++index == len ) && ( index = 0 );
				pic_ul.style.left = ( -900 * index ) + "px";
				clearInterval( pic_div.timer);
				return false;
			}
			 
			for( i = 0; i < len; i += 1){
				(function(i){
					pic_Li[i].addEventListener("mouseover", btn_show, false);
					pic_Li[i].addEventListener("mouseout", btn_hide, false);
					pic_span[i].addEventListener("mouseover", function (){
						clearInterval( pic_div.timer );
						index = i;
						pic_ul.style.left = ( -900 * index ) + "px";
					}, false);
					pic_span[i].style.backgroundImage = "url(image/"+(i+1)+".jpg)";
					pic_span[i].style.backgroundSize = "cover";
				})(i);
			}
			
			pic_prev.addEventListener("mouseover", btn_show, false);
			pic_next.addEventListener("mouseover", btn_show, false);
			pic_prev.addEventListener("mousedown", prev_down, false);
			pic_next.addEventListener("mousedown", next_down, false);
			
			pic_div.timer = setInterval(move, 2000); 
		} 
		
};
MyClass.imgdiv();
MyClass.pic_num();