<html><head>
<title>饭搭子</title>
<meta charset="UTF-8">

<script type="text/javascript" src="/s/j/sea.js"></script>
<script type="text/javascript" src="/s/j/jquery.js"></script>

<link rel="stylesheet" href="/s/c/base.css">
<?php foreach($css as $c):?>
<link rel="stylesheet" href="/s/c/<?=$c;?>.css">
<?php endforeach;?>
</head>
<body>
<div id="hd">
	<div class="hdmain">
	<div class="logo" style="line-height:60px;padding:0 7px;font-size:28px;color:#333;font-weight:700;color:#4180A5;"><a href="/">饭搭子<small style="position:relative;font-size:13px;top:-20px;margin-left:5px;">alpha</small></a></div>
	
	<?php if(!$logged):?>
	<ul class="nav-sub">
		<li><a href="/login">登录</a></li>
		<li><a href="/reg">注册</a></li>
	</ul>
	<?php else:?>
	<ul class="nav-sub">
		<li><a href="/user/<?=$current_user->id;?>"><?=$current_user->name;?></a></li>
		<li><a href="/logout">退出</a></li>
	</ul>
	<?php endif;?>
	</div>

</div>