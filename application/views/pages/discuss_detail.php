<div class="bd">
	<div>
		<div class="avatar">
			<img src="<?=$discuss->avatar;?>" alt="<?=$discuss->username;?>">
			<p><a href="/user/<?=$discuss->user;?>"><?=$discuss->username;?></a></p>
		</div>
		<div class="body">
			<div class="title"><?=$discuss->title;?></div>
			<div class="content"><?=$discuss->content;?></div>
			<div class="misc"><?=$discuss->create_time;?></div>
		</div>
	</div>
	<div>
		<? foreach($replies as $reply):?>
			<div>
				<div class="avatar">
					<img src="<?=$reply->avatar;?>" alt="<?=$reply->username;?>">
					<p><a href="/user/<?=$reply->user;?>"><?=$reply->username;?></a></p>
					<p class="misc"><?=$reply->create_time;?></p>
				</div>
			</div>
		<? endforeach;?>
		<? if($logged):?>
		<form action="" method="post" >
			回应
			<textarea name="content" id="content" cols="30" rows="10">asdasd</textarea>
			<input type="submit" value="提交" />
		</form>
		<? else:?>
			<p><a href="/login">登录</a> 后即可回应</p>
		<? endif;?>
	</div>
</div>