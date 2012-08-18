<div class="forbidden">
	<div class="hint">请先<a href="/login">登录</a></div>
	<div class="hint"><span id="count">3</span>秒后跳转</div>
</div>
<script type="text/javascript">
	var count = document.getElementById("count");
	var itv = setInterval(function(){
		count.innerHTML = Number(count.innerHTML)-1;
		if(count.innerHTML == 0){
			clearInterval(itv);
			location.href = "/login";
		}
	},1000);
</script>