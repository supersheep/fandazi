<div id="bd">
	<div class="main">
	<div class="steps clear">
		<div class="step current">1.填写信息</div>
		<div class="step">2.上传海报</div>
		<div class="step">3.完成创建</div>
	</div>

	<form action="" method="post" class="create-form">
		
		<div class="row"><label for="title">聚餐标题</label><div class="item"><input type="text" name="title" id="title" value="<?=set_value('title');?>" /><?=form_error("title");?></div></div>
		<div class="row"><label for="category">活动分类</label><div class="item"><select name="category" id="category" value="<?=set_value('category');?>">
			<? foreach($category as $cate):?>
			<option value="<?=$cate->id;?>"><?=$cate->name;?></option>
			<? endforeach; ?>
		</select><?=form_error("category");?></div></div>
		<div class="row"><label for="date">活动时间</label><div class="item"><input type="text" name="date" id="date" value="<?=set_value('date');?>"><select name="time" id="time">
			<option value="16:30">16:30</option>
			<option value="17:30">17:30</option>
			<option value="18:30">18:30</option>
			<option value="19:30">19:30</option>
		</select><?=form_error("date");?></div></div>
		<div class="row"><label for="describe">活动介绍</label><div class="item"><textarea name="describe" id="describe" cols="30" rows="5"><?=set_value('describe');?></textarea><?=form_error("describe");?></div></div>
		<div class="row"><label for="dpurl">大众点评商户</label><div class="item"><input type="text" id="dpurl" name="dpurl" value="http://"><?=form_error("dpurl");?></div></div>
		<div class="row">
			<a href="/" class="btn-cancel">取消</a>
			<input type="submit" value="下一步" class="btn" />
		</div>
	</form>
</div>
</div>