
<div id="bd">
<div id="form">
	<div class="reg-form-inner">
		<h3 class="welcome">欢迎来到饭搭子，你可以</h3>	
		<form action="/reg" method="post">
		<fieldset>
			<legend>使用第三方账号登录</legend>
			<div class="row"><img src="http://www.sinaimg.cn/blog/developer/wiki/240.png"></div>
		</fieldset>
		<fieldset>
			<legend>或者注册一个账号</legend>

		<div class="row">
			<label for="email">邮箱：</label>
			<input type="text" id="email" name="email" value="<?=set_value('email');?>" />
			<?=form_error("email");?>
		</div>

		<div class="row">
			<label for="name">名号：</label>
			<input type="text" id="name" name="name" value="<?=set_value('name');?>" />
			<?=form_error("name");?>
		</div>

		<div class="row">
			<label for="password">密码：</label>
			<input type="password" id="password" name="password" />
			<?=form_error("password");?>
		</div>

		<div class="row">
			<label for="invitecode">邀请码：</label>
			<input type="text" id="invitecode" name="invitecode" value="<?=set_value('invitecode');?>" />
			<?=form_error("invitecode");?>
		</div>

		<div class="row">
			<label for="city">城市：</label>
			<select name="city" id="city" value="<?=set_value('city');?>" >
				<?php foreach($cities as $ci):?>
				<option value="<?=$ci->id;?>"><?=$ci->name;?></option>
				<?php endforeach;?>
			</select>
		</div>
		<div>
			<input type="submit" value="注册" class="btn">
		</div>
		</fieldset>
		</form>
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

