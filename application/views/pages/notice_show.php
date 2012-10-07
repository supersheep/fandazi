<div id="bd">
	<div class="main clear">
		<ul class="aside">
			<li>私信</li>
			<li>提醒</li>
		</ul>
		<div class="tab-body">
			<? if(count($notices)):?>
			<ul>
			<? foreach($notices as $notice): ?>
			<li data-id="<?=$notice->id?>">
				<a href="<?=$notice->ref_url;?>"><?=$notice->content?></a></li>
			<? endforeach;?>
			</ul>
			<? else:?>
			<p>没有未读的消息</p>
			<? endif;?>
		</div>
	</div>
</div>