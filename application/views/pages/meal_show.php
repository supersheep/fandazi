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
				<? if(FALSE):?>
				<div class="meal-tools">
					<div class="widget-share">分享到</div>
					<div class="widget-gcalendar">添加到日历</div>
				</div>
				<? endif;?>

				<? if($meal->status==0):?>
				<div class="info">活动已创建，请等待审核通过，会有站内消息通知 :)</div>
				<? endif;?>
				<? if(!$ishost && $logged && $meal->status==1):?>
					<? if($attended):?>
						<div><span class="meal-attend-sure">我要参加</span><a href="javascript:;" id="J_unattend">取消</a></div>
					<? else:?>
						<div class="meal-attend" id="J_attend">我要参加</div>
					<? endif;?>
				<? endif;?>
			</div>
			<div class="meal-pic">
				<img src="<?=$meal->pic_middle;?>">
			</div>
			</div>
		</div>

		<div class="meal-desc"><span class="key">活动介绍：</span><?=$meal->describe;?></div>
		
		<div class="discuss">
			<div class="title">讨论<a href="/meal/<?=$meal->id;?>/discuss/create">发起话题</span></div>
			<table class="content-list">
				<tr>
					<td width="54%"></td>
					<td width="22%"></td>
					<td width="12%"></td>
					<td width="12%"></td>
				</tr>
				<? foreach($discuss as $dis):?>
				<tr>
					<td class="dtitle"><?=$dis->title;?></td>
					<td class="dfrom"></td>
					<td class="dreply"></td>
					<td class="dtime"></td>
				</td>
				<? endforeach;?>
			</table>

		</div>
	</div>
	
	<div class="aside">
		<div class="aside-box participant">
			<div class="head">发起人</div>
			<div class="body">
				<div class="user clear">
					<? if(count($host)): ?>
					<img class="avatar" src="<?=$host->avatar_small;?>">
					<a class="name" href="/user/<?=$host->id;?>"><?=$host->name?></a>
					<p class="company"><?=$host->company;?></p>
					<p class="duty"><?=$host->duty;?></p>
					<? endif;?>
				</div>
			</div>
		</div>

		<div class="aside-box participant">
			<div class="head">谁参加这次聚餐</div>
			<div class="body">
			<? foreach($meal->participants as $user): ?>
			<? if(count($user)):?>
				<div class="user clear">
					<img class="avatar" src="<?=$user->avatar_small;?>">
					<a class="name" href="/user/<?=$user->id;?>"><?=$user->name?></a>
					<p class="company"><?=$user->company;?></p>
					<p class="duty"><?=$user->duty;?></p>
				</div>
			<? endif;?>
			<? endforeach;?>
			</div>
		</div>
	</div>

</div>
