define(function(require) {
	$("#J_attend").on("click", function() {
		var data = $(window).data(),
			mealid = data.mealid;
		$.ajax({
			url: "/ajax/meal/attend",
			data: {mealid: mealid
			}
		}).success(function(e) {
			console.log(e);
		});

	});
});