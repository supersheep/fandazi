<div id="bd">
	<div class="main clear">
		<ul class="aside">
			<li><a href="/msg/mail">收件箱</a></li>
			<li><a href="/msg/mail/outbox">发件箱</a></li>
			<li><a href="/msg/notice">提醒</a></li>
		</ul>
		<div class="tab-body">
			<div class="row">来自:<a href="/user/<?=$mail->user_id;?>"><?=$mail->user_name?></a></div>
			<div class="row">时间:<?=$mail->create_time?></div>
			<div class="row mail_detail_title">标题:<?=$mail->title;?></div>
			<div class="row">
				<?=$mail->content;?>
			</div>
			<?if($mail->from_user_id!==$current_user->id):?>
			<div class="row">
			<a href="/msg/mail/new?reply=<?=$mail->id;?>" class="btn">回复</a>
			</div>
			<?endif;?>
		</div>
	</div>
</div>