<div id="bd">
	<div class="main clear">
		<ul class="aside">
			<li><a href="/msg/mail">收件箱</a></li>
			<li><a href="/msg/mail/outbox">发件箱</a></li>
			<li><a href="/msg/notice">提醒</a></li>
		</ul>
		<div class="tab-body">
			<? if(count($notices)):?>
			<ul>
			<? foreach($notices as $notice): ?>
			<li class="notice" data-id="<?=$notice->id?>" data-href="<?=$notice->ref_url;?>">
				<a href="#"><?=$notice->content?></a></li>
			<? endforeach;?>
			</ul>
			<? else:?>
			<p>没有未读的消息</p>
			<? endif;?>
		</div>
	</div>
</div>