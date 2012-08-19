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
				<div class="meal-detail"><span class="key">人均：</span>￥<?=$meal->shop->average;?></div>
				<?php if(FALSE):?>
				<div class="meal-tools">
					<div class="widget-share">分享到</div>
					<div class="widget-gcalendar">添加到日历</div>
				</div>
				<?php endif;?>

				<?php if($meal->status==0):?>
				<div class="info">活动已创建，请等待审核通过，会有站内消息通知 :)</div>
				<?php endif;?>
				<?php if(!$ishost && $logged && $meal->status==1):?>
					<?php if($attended):?>
						<div><span class="meal-attend-sure">我要参加</span><a href="javascript:;" id="J_unattend">取消</a></div>
					<?php else:?>
						<div class="meal-attend" id="J_attend">我要参加</div>
					<?php endif;?>
				<?php endif;?>
			</div>
			<div class="meal-pic">
				<img src="<?=$meal->pic_middle;?>">
			</div>
			</div>
		</div>

		<div class="meal-desc"><span class="key">活动介绍：</span><?=$meal->describe;?></div>
		
	</div>
	
	<div class="aside">
		<div class="aside-box participant">
			<div class="head">发起人</div>
			<div class="body">
				<div class="user clear">
					<img class="avatar" src="<?=$host->avatar;?>">
					<a class="name" href="/user/<?=$host->id;?>"><?=$host->name?></a>
					<p class="company"><?=$host->company;?></p>
					<p class="duty"><?=$host->duty;?></p>
				</div>
			</div>
		</div>

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
