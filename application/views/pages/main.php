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
			
			<?php for($i=0;$i<5;$i++):?>
			<div class="dating">
				
				<div class="pic">
					<img src="" alt="">
				</div>
				<div class="info">
					<div class="title">吃吃小菜聊聊天--互联网同行交流</div>
					<div class="info-row">餐馆：兰心餐厅[晚餐]</div>
					<div class="info-row">聚会将于3天后举行</div>
					<div class="participants clear">
						<div class="user"> <img src="/s/i/default_avatar.png" alt="" class="avatar"> </div>
						<div class="user"> <img src="/s/i/default_avatar.png" alt="" class="avatar"> </div>
						<div class="user"> <img src="/s/i/default_avatar.png" alt="" class="avatar"> </div>
						<div class="user"> <img src="/s/i/default_avatar.png" alt="" class="avatar"> </div>
					</div>
				</div>
			</div>
			<?php endfor;?>

		</div>

		<div class="more">
			<div class="load">浏览更多</div>
		</div>



	</div>	

	<div class="aside">
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