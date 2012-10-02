<div id="bd" class="clear">
	
	<div class="main">
		
		<div class="filter">
			<div class="filter-row">
				<div class="title">餐馆：</div>
				<div class="tags">
				<a class="tag" href="/?cate=<?=$cateid;?>&taste=all">全部</a>
				<? foreach($taste as $tst):?>
					<a class="tag" href="/?cate=<?=$cateid;?>&taste=<?=$tst->id;?>"><?=$tst->name;?></a>
				<? endforeach;?></div>
			</div>

			<div class="filter-row">
				<div class="title">标签</div>
				<div class="tags">
				<a class="tag" href="/?cate=all&taste=<?=$tasteid;?>">全部</a>
				<? foreach($cate as $cat):?>
					<a class="tag" href="/?cate=<?=$cat->id;?>&taste=<?=$tasteid;?>"><?=$cat->name;?></a>
				<? endforeach;?>
				</div>
			</div>
		</div>

		<div class="meals clear">
			<? foreach($meals as $meal):?>
			<div class="meal">
				<div class="pic">
					<a href="/meal/<?=$meal->id;?>">
						<img src="<?=$meal->pic_small;?>" alt="">
					</a>
				</div>
				<div class="info">
					<div class="title"><?=$meal->title;?></div>
					<div class="info-row">餐馆：<?=$meal->shop->name;?></div>
					<div class="info-row">聚会将于<?=$meal->start;?>举行</div>
					<div class="participants clear">
						<? foreach($meal->participants as $user): ?>
							<div class="user"> <img src="<?=$user->avatar;?>" alt="<?=$user->name;?>" class="avatar"> </div>
						<? endforeach;?>
					</div>
				</div>
			</div>
			<? endforeach;?>
		</div>

		<div class="more">
			<div class="load">浏览更多</div>
		</div>



	</div>	

	<div class="aside">
		<div class="box"><a href="/meal/create" class="btn">发起聚餐</a></div>
		<div class="box">
		<div class="head">即将开始</div>
		<div class="body">
			
		</div>
		</div>
		
		<div class="box">
		<div class="head">热门聚餐</div>
		<div class="body">
			<? foreach($hotmeal as $meal): ?>
				
			<? endforeach; ?>
		</div>
		</div>
		

		<div class="box">
		<div class="head">热门饭搭子</div>
		<div class="body">
			<? foreach($hotuser as $user): ?>
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

		<div class="box">
		<div class="head">热门餐馆</div>
		<div class="body"></div>
		</div>
	</div>

</div>