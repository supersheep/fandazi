<div id="bd">

	<div class="main">
		<div class="card box clear">
			<div class="avatar"><img src="<?=$user->avatar;?>" alt=""></div>
			<div class="info">
				<div class="title"><span class="name"><?=$user->name;?></span><? if($user->id == $current_user->id): ?><a href="/account/setting">编辑个人资料</a><? endif;?></div>
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
			<? foreach($recent_meals as $meal):?>
			<div class="meal clear">
				<div class="pic">
					<a href="/meal/<?=$meal->id;?>">
						<img src="<?=$meal->pic_small;?>" alt="">
					</a>
				</div>
				<div class="info">
					<div class="title"><?=$meal->title;?></div>
					<div class="info-row">餐馆：<?=$meal->shop->name;?></div>
					<div class="info-row"><?=$meal->start;?></div>
				</div>
			</div>
			<? endforeach;?>
		</div>
	</div>
	
	
</div>