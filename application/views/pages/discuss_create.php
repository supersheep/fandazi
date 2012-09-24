<div id="bd">
	<div class="main">

	<form action="" method="post" class="create-form">
		<div class="title">谈论</div>
		<div class="row"><label for="title">讨论标题</label><div class="item"><input type="text" name="title" id="title" value="<?=set_value('title');?>" /><?=form_error("title");?></div></div>

		<div class="row"><label for="content"></label><div class="item"><textarea name="content" id="content" ><?=set_value('content');?></textarea><?=form_error("content");?></div></div>
		
		<div class="row">
			<input type="submit" class="btn" value="发布">
		</div>
	</form>
</div>
</div>