<div id="bd">
	
	<form action="" method="post">
		
		<div class="row"><label for="title">聚餐标题</label><div class="item"><input type="text" name="title" id="title" /></div></div>
		<div class="row"><label for="category">活动分类</label><div class="item"><select name="category" id="category">
			<?php foreach($category as $cate):?>
			<option value="<?=$cate->id;?>"><?=$cate->name;?></option>
			<?php endforeach; ?>
		</select></div></div>
		<div class="row"><label for="time">活动时间</label><div class="item"><input type="text" name="time" id="time"></div></div>
		<div class="row"><label for="describe">活动介绍</label><div class="item"><textarea name="describe" id="describe" cols="30" rows="5"></textarea></div></div>
		<div class="row"><label for="addshop">大众点评商户</label><div class="item"><input type="text" value="http://"></div></div>
		<div class="row"><input type="submit" value="提交" class="btn" /></div>

	</form>
</div>