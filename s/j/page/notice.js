define(function(){
	$(".notice").click(function(){
		var el = $(this),
			id = el.attr("data-id"),
			href = el.attr("data-href");

		$.ajax({
			url:"/ajax/notice/read",
			data:{id:id},
			success:function(){
				location.href = href;
			}
		});
		return false;
	});
});