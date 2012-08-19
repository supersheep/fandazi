define(function(require) {
	$("#J_attend").on("click", function() {
		var data = $(window).data(),
			mealid = data.mealid;
		$.ajax({
			url: "/ajax/meal/attend",
			dataType:"json",
			data: {
				mealid: mealid
			}
		}).success(function(e) {
			if(e.code==200){
				location.reload();
			}else{
				alert(e.msg);
			}
		});
	});

	$("#J_unattend").on("click", function() {
		var data = $(window).data(),
			mealid = data.mealid;

		$.ajax({
			url: "/ajax/meal/unattend",
			dataType:"json",
			data:{
				mealid: mealid
			}
		}).success(function(e){
			if(e.code==200){
				location.reload();
			}else{
				alert(e.msg);
			}
		});

	});
});