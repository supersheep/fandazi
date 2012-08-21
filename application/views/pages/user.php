<div id="bd">
	
	<div><?=$user->name;?><?php if($user->id == $current_user->id):?>
		<a href="/account/setting">编辑个人资料</a>
	<?php endif;?></div>
	
</div>