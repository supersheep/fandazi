<style type="text/css">
	.main{width:720px;}
	.main .box{background-color: #fff;border:1px solid #ccc;border-radius: 5px;}
	.card{margin-bottom:10px;padding:10px;}
	.card .avatar{border:1px solid #ccc;border-radius: 5px;float:left;margin-right:10px;}
	.card .avatar img{border-radius: 5px;}
	.card .info{float:left;margin-left:0px;}
	.card .info .title{padding:8px 15px;}
	.card .info .title .name{font-size:18px;margin-right:8px;}
	.card .info .detail .detail-group{margin-bottom:5px;}
	.card .info .detail li{float:left;margin-left:15px;}
	.recent_meals{}
	.recent_meals .title{border-bottom:1px solid #ccc;padding:10px;}

	.recent_meals .meal .pic{float:left;margin:10px;width:120px;}
	.recent_meals .meal .title{border:none;padding:0}
	.recent_meals .meal .info{margin-left:120px;}
</style>
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