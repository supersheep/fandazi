<div id="bd">
	<div class="main clear">
		<div class="tab-body">
			<div class="row">来自:<a href="/user/<?=$mail->user_id;?>"><?=$mail->user_name?></a></div>
			<div class="row">时间:<?=$mail->create_time?></div>
			<div class="row mail_detail_title">标题:<?=$mail->title;?></div>
			<div class="row">
				<?=$mail->content;?>
			</div>
			<div class="row">
			<a href="/mail/new/?reply=<?=$mail->id;?>" class="btn">回复</a>
			</div>
		</div>
	</div>
</div>