<div id="bd">
	
	<form action="" method="post">
		
		<div class="row"><label for="title">聚餐标题</label><div class="item"><input type="text" name="title" id="title" value="<?=set_value('title');?>" /><?=form_error("title");?></div></div>
		<div class="row"><label for="category">活动分类</label><div class="item"><select name="category" id="category" value="<?=set_value('category');?>">
			<?php foreach($category as $cate):?>
			<option value="<?=$cate->id;?>"><?=$cate->name;?></option>
			<?php endforeach; ?>
		</select><?=form_error("category");?></div></div>
		<div class="row"><label for="time">活动时间</label><div class="item"><input type="text" name="time" id="time" value="<?=set_value('time');?>"><?=form_error("time");?></div></div>
		<div class="row"><label for="describe">活动介绍</label><div class="item"><textarea name="describe" id="describe" cols="30" rows="5" value="<?=set_value('describe');?>"></textarea><?=form_error("describe");?></div></div>
		<div class="row"><label for="dpurl">大众点评商户</label><div class="item"><input type="text" id="dpurl" name="dpurl" value="http://"><?=form_error("dpurl");?></div></div>
		<div class="row"><input type="submit" value="提交" class="btn" /></div>

	</form>
</div>