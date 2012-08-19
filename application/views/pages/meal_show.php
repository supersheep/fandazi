<div id="bd" class="clear">
	
	<!-- 主体内容 -->
	<div class="main">
		<!-- 饭聚内容 -->
		<div class="meal-info">
			<h2 class="title"><?=$meal->title;?></h2>
			<div class="content clear">
			<div class="meal-info-detail">
				<div class="meal-detail"><span class="key">餐馆：</span><?=$meal->shop->name;?></div>
				<div class="meal-detail"><span class="key">时间：</span><?=$meal->start;?></div>
				<div class="meal-detail"><span class="key">地点：</span><?=$meal->shop->address;?></div>
				<div class="meal-detail"><span class="key">费用：</span><?=$meal->shop->average;?></div>
				<!--div class="meal-tools">
					<div class="widget-share">分享到</div>
					<div class="widget-gcalendar">添加到日历</div>
				</div-->
				<?php if(!$ishost && $logged):?>
				<div class="meal-attend" id="J_attend">马上参加</div>
				<?php endif;?>
				<!--div class="meal-full">人数已满</div-->
			</div>
			<div class="meal-pic">
				<img src="<?=$meal->pic_middle;?>">
			</div>
			</div>
		</div>

		<div class="meal-desc"><span class="key">说明：</span><?=$meal->describe;?></div>
		
	</div>
	
	<div class="aside">
		<div class="aside-box participant">
			<div class="head">谁参加这次聚餐</div>
			<div class="body">
			<?php foreach($meal->participants as $user): ?>
				<div class="user clear">
					<img class="avatar" src="<?=$user->avatar;?>">
					<a class="name" href="/user/<?=$user->id;?>"><?=$user->name?></a>
					<p class="company"><?=$user->company;?></p>
					<p class="duty"><?=$user->duty;?></p>
				</div>
			<?php endforeach;?>
			</div>
		</div>
	</div>

</div>

</div>
