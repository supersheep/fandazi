<div id="bd">
	<div class="main clear">
		<ul class="aside">
			<li><a href="/msg/mail">收件箱</a></li>
			<li><a href="/msg/mail/outbox">发件箱</a></li>
			<li><a href="/msg/notice">提醒</a></li>
		</ul>
		<div class="tab-body">
			<form method="post">
			<div class="row">To:  <?=$user->name?></div>
			<input type="hidden" name="to_user_id" value="<?=$user->id;?>" />
			<div class="row"><input class="input-text" type="text" id="title" name="title" value="<?=$title;?>" /></div>
			<div class="row"><textarea name="content" id="content" class="input-text" cols="30" rows="7"><?=$content;?></textarea></div>
			<input type="submit" value="发出去" class="btn">
			</form>
		</div>
	</div>
</div>