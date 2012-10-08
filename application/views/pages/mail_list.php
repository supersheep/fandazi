<div id="bd">
	<div class="main clear">
		<ul class="aside">
			<li><a href="/msg/mail">收件箱</a></li>
			<li><a href="/msg/mail/outbox">发件箱</a></li>
			<li><a href="/msg/notice">提醒</a></li>
		</ul>
		<div class="tab-body">
			<div class="title"><?=$this->current_user->name;?>的<?if($box=="out"):
			?>发件箱<?else:
			?>收件箱<?endif;?>
			</div>
			<? if(count($mails)):?>
				<table width="100%">
					<tr>
						<th width="20%"><?if($box=="out"):
							?>寄给<?else:?>来自<?endif;?>
						</th>
						<th width="40%">标题</th>
						<th width="40%">时间</th>
					</tr>
				<? foreach($mails as $mail) :?>
				<tr>
					<td><a href="/user/<?=$mail->user_id;?>"><?=$mail->user_name;?></a></td>
					<td><a href="/msg/mail/<?=$mail->id;?>"><?=$mail->title;?></a></td>
					<td><?=$mail->create_time;?></td>
				</tr>
				<? endforeach;?>
				</table>
			<? else:?>
				收件箱空空如也
			<? endif;?>
		</div>
	</div>
</div>