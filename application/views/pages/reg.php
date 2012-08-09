
<div id="bd">
<div id="form">
	<div class="reg-form-inner">
		<h3 class="welcome">欢迎来到饭搭子，你可以</h3>	
		<fieldset>
			<legend>使用第三方账号登录</legend>
			<div class="row"><img src="http://www.sinaimg.cn/blog/developer/wiki/240.png"></div>
		</fieldset>
		<fieldset>
			<legend>或者注册一个账号</legend>

		<div class="row">
			<label for="email">邮箱：</label>
			<input type="text" id="email" name="email" />
		</div>

		<div class="row">
			<label for="name">名号：</label>
			<input type="text" id="name" name="name" />
		</div>

		<div class="row">
			<label for="password">密码：</label>
			<input type="password" id="password" name="password" />
		</div>

		<div class="row">
			<label for="city">城市：</label>
			<select name="city" id="city">
				<?php foreach($cities as $ci):?>
				<option value="<?=$ci->id;?>"><?=$ci->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		<div class="">
			<input type="submit" value="注册" class="btn">
		</div>
		</fieldset>
	</div>

</div>


<div class="slide">
	<ul>
		<li class="spic">
			<img src="s/i/jucan1.jpg" alt="">
		</li>
	</ul>
</div>
</div>

