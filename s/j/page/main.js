define(function(){
	/*
	$(".meal .pic img").each(function(i,e){
		var image = new Image(),
			src = e.getAttribute("data-src");

		image.src = src;
		$(image).load(function(img,i){
			var w = this.width,
				h = this.height,
				dh = 120,dw = 120,
				ow,oh;
			if(w/h>dw/dh){
				oh = dh;
				ow = w/h * oh;
			}else{
				ow = dw;
				oh = ow / (w/h);
			}
			$(e).attr("src",src).css({
				marginLeft:(dw-ow)/2,
				marginTop:(dh-oh)/2,
				width:ow,
				height:oh,
				display:"block"
			});
		});
	});*/
});