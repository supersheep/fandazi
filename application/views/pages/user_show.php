<div id="bd">
	<style type="text/css">
	</style>
	<div class="card">
		<div class="avatar"><img src="<?=$user->avatar;?>" alt=""></div>
		<div class="info"><?=$user->name;?>
<ul>

	<li><?=$user->gender;?></li>
	<li><?=$user->company;?></li>
	<li><?=$user->duty;?></li>
	<li><?=$user->bio;?></li>
	<li><?=$user->school;?></li>
	<li><?=$user->graduation_year;?></li>
	<li><?=$user->major;?></li>
	<li><?=$user->interests;?></li>
</ul>
			<? 
	if($user->id == $current_user->id):
		?><a href="/account/setting">编辑个人资料</a><? 
	endif;
	?></div>
	</div>
	
</div>