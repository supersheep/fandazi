
<div id="bd">
<form id="form" action="" method="post">
	<div class="reg-form-inner">
		<h3 class="welcome">登录饭搭子</h3>	
		
		<fieldset>
			<legend>使用饭搭子账号登录</legend>

		<div class="row">
			<label for="email">邮箱：</label>
			<input type="text" id="email" name="email" />
			<?php if($errcode == -1):?>
			<span class="err">用户不存在</span>
			<?php endif;?>
		</div>

		<div class="row">
			<label for="password">密码：</label>
			<input type="password" id="password" name="password" />
			<?php if($errcode == -2):?>
			<span class="err">密码错误</span>
			<?php endif;?>
		</div>

		<div>
			<input type="submit" value="登录" class="btn">
		</div>
		</fieldset>

		<fieldset>
			<legend>或使用第三方账号登录</legend>
			<div class="row"><img src="http://www.sinaimg.cn/blog/developer/wiki/240.png"></div>
		</fieldset>
	</div>

</form>

</div>

