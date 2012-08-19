<div id="bd" class="">

	<div class="steps clear">
		<div class="step">1.填写信息</div>
		<div class="step current">2.上传海报</div>
		<div class="step">3.完成创建</div>
	</div>

	<iframe src="" frameborder="0" name="upload" width="500" height="100" style=""></iframe>
	<div class="upload_poster clear">
		<div class="preview">
			<img src="<?=$meal->pic_middle;?>" alt="" class="img" id="img_preview">
		</div>
		<form action="/upload/poster" target="upload" method="post" class="upload" enctype="multipart/form-data">
			<input type="hidden" name="mealid" value="<?=$meal->id;?>">
			<div style="margin:40px 0 20px 0;">从你的电脑中挑选一张喜爱的图片</div>
			<div style='margin:20px 0;'><input type="file" name="userfile"></div>
			<div id="submit-wrap"><input type="submit" value="上传" class="btn"></div>
		</form>
	</div>
	<script type="text/javascript">
		function upload_success(msg){
			var id = $(window).data("mealid");
			var submit_wrap = $("#submit-wrap");
			var btn_finish = $('<a/>').addClass("btn").attr("id","btn_finish").attr("href","/meal/"+id).html("完成创建");
			$("#img_preview").attr("src",msg);
			submit_wrap.find("#btn_finish").remove();
			submit_wrap.append(btn_finish);
		}

		function upload_fail(msg){
			alert(msg);
		}
	</script>
</div>