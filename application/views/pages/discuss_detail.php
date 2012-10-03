<div id="bd">
	<div class="main well">
	<h2 class="title"><?=$discuss->title;?></h2>
	<div class="topic clear">
		<div class="avatar">
			<img src="<?=$discuss->avatar;?>" alt="<?=$discuss->username;?>">
		</div>

		<div class="body">
			<div class="misc"><?=$discuss->create_time;?><span style="margin-left:28px;">来自<a href="/user/<?=$discuss->user;?>"><?=$discuss->username;?></a></span></div>
			<div class="content"><?=$discuss->content;?></div>
		</div>
	</div>
	<?if(count($replies)):?>
	<div class="replies"><? foreach($replies as $reply):
		?><div class="reply clear">
			<div class="avatar">
				<img src="<?=$reply->avatar;?>" alt="<?=$reply->username;?>">
			</div>
			<div class="body">
				<div class="misc">
					<?=$reply->create_time;?><a style="margin-left:10px;" href="/user/<?=$reply->user;?>"><?=$reply->username;?></a>
				</div>
				<p class="content"><?=preg_replace("/\n+/", "<br />", $reply->content);?></p>
			</div>
		</div><? endforeach;
	?></div><?endif;?><? if($logged):
	?><form action="" method="post" class="form" >
		<h4>回应 ··· </h4>
		<textarea autocomplete="off" name="content" id="content" cols="30" rows="5" class="input-text"></textarea>
		<input type="submit" class="btn" value="回之" />
	</form><? else:
	?><p><a href="/login">登录</a> 后即可回应</p><? endif;?>
	</div>
</div>