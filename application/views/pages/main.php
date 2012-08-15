<div id="bd" class="clear">
	
	<div class="main">
		
		<div class="filter">
			<div class="filter-row">
				<div class="title">餐馆：</div>
				<div class="tags">
				<?php foreach($taste as $tst):?>
					<a class="tag"><?=$tst->name;?></a>
				<?php endforeach;?></div>
			</div>

			<div class="filter-row">
				<div class="title">标签</div>
				<div class="tags">
				<?php foreach($cate as $cat):?>
					<a class="tag"><?=$cat->name;?></a>
				<?php endforeach;?>
				</div>
			</div>
		</div>

		<div class="datings">
			<?php foreach($meals as $meal):?>
			<div class="dating">
				<div class="pic">
					<img src="<?=$meal->pic_small;?>" alt="">
				</div>
				<div class="info">
					<div class="title"><?=$meal->title;?></div>
					<div class="info-row">餐馆：<?=$meal->shop->name;?></div>
					<div class="info-row">聚会将于<?=$meal->start;?>举行</div>
					<div class="participants clear">
						<?php foreach($meal->participants as $user): ?>
							<div class="user"> <img src="<?=$user->avatar;?>" alt="<?=$user->name;?>" class="avatar"> </div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>

		<div class="more">
			<div class="load">浏览更多</div>
		</div>



	</div>	

	<div class="aside">
		<div class="box"><a href="/meal/create" class="btn">发起聚餐</a></div>
		<div class="box">
		<div class="head">今日聚餐</div>
		<div class="body"></div>
		</div>
		<div class="box">
		<div class="head">热门餐馆</div>
		<div class="body"></div>
		</div>
		<div class="box">
		<div class="head">热门饭搭子</div>
		<div class="body"></div>
		</div>
	</div>

</div>