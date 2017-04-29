　$(document).keypress(function(event){
　　　　console.log(event.keyCode);
		var key = event.keyCode;
		var tmp = 10;
		var i = 0;
		//console.log(width);
		if(key == "119"){
			if(i<100){
			setTimeout(function(){
				$("#div1").css({'left':i++});
			},1000);
			i++;
		}
	}
　});