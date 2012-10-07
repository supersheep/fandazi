define(function(require) {
	$("#J_follow").click(function(){
		var data = $(window).data();
		$.ajax({
			url:"/ajax/follow/",
			dataType:"json",
			data:{userid:data.userid},
			success:function(json){
				if(json.code == 200){
					location.reload();
				}else{
					alert(json.msg);
				}
			}
		});
		return false;
	});
});