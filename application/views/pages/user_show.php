<div id="bd" class="clear">

	<div class="main">
		<div class="card box clear">
			<div class="avatar">
				<img src="<?=$user->avatar;?>" alt="">
				<? if(!$logged || $current_user->id!=$user->id):?>
				<div class="func">
					<? if(!$followed):?>
					<a id="J_follow" href="#">关注TA</a>
					<? else:?>
					<a href="" id="J_unfollow">取消关注</a>
					<? endif;?>
					<a id="J_mail" href="/msg/mail/new?to=<?=$user->id;?>">写私信</a>
				</div>
				<? endif;?>
			</div>
			<div class="info">
				<div class="title"><span class="name"><?=$user->name;?></span>
					<? if($current_user && $user->id == $current_user->id): ?><a href="/account/setting">编辑个人资料</a><? endif;?></div>
				<div class="detail">
					<ul class="basic detail-group clear">
						<li><?=$user->gender==1?"男":"女";?></li>
						<li><?=$user->cityname;?></li>
						<li><?=$user->bio;?></li>
						<li><?=$user->interests;?></li>
					</ul>
					<ul class="work detail-group clear">
						<li><?=$user->company;?></li>
						<li><?=$user->duty;?></li>
					</ul>
					<ul class="study detail-group clear">
						<li><?=$user->school;?></li>
						<li><?=$user->graduation_year;?></li>
						<li><?=$user->major;?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="recent_meals box">
			<div class="title">最近参加的聚餐</div>
			<? foreach($recent_meals as $k=>$meal):?>
			<div class="meal clear <?if($k==count($recent_meals)-1):?>last<?endif;?>">
				<div class="pic">
					<a href="/meal/<?=$meal->id;?>">
						<img src="<?=$meal->pic_small;?>" alt="">
					</a>
				</div>
				<div class="info">
					<div class="title"><a href="/meal/<?=$meal->id;?>"><?=$meal->title;?></a></div>
					<div class="info-row">餐馆：<?=$meal->shop->name;?></div>
					<div class="info-row"><?=$meal->start;?></div>
				</div>
			</div>
			<? endforeach;?>
		</div>
	</div>
	
	<div class="aside">
		
		<div class="box followers">
			<div class="head">饭醉同伙</div>
			<div class="body">
				<ul class="clear">
					<?foreach($followers as $follower):?>
					<li><a href="/user/<?=$follower->id;?>"><img src="<?=$follower->avatar_small;?>" alt="<?=$follower->name;?>"></a></li>
					<?endforeach;?>
				</ul>
			</div>
		</div>
	</div>
	
</div>