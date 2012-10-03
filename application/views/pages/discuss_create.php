<div id="bd">
	<div class="main well">

	<form action="" method="post" class="create-form">
		<div class="row">
			<label for="title" >标题</label>
			<div class="item">
			<input type="text" name="title" id="title" value="<?=set_value('title');?>" class="input-text" />
			<?=form_error("title");?>
			</div>
		</div>

		<div class="row">
			<label for="content" >正文</label>
			<div class="item">
			<textarea name="content" id="content" rows="7" class="input-text"><?=set_value('content');?></textarea>
			<?=form_error("content");?>
			</div>
		</div>
		<div class="row">
			<input type="submit" class="btn btn-submit" value="发布">
		</div>
	</form>
</div>
</div>