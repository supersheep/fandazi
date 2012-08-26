<div id="bd">
	<div class="main">
	<iframe src="" frameborder="0" width="0" height="0" id="ifrm_upload" name="ifrm_upload"></iframe>
	
	<div class="row clear">
		<label class="label" for="avatar">头像</label>
		<div class="avatar_wrap clear">
			<img src="<?=$current_user->avatar;?>" alt="<?=$current_user->name;?>" id="avatar_img">
			<form action="/upload/avatar" target="ifrm_upload" class="avatar_form" method="post" enctype="multipart/form-data">
				<input type="file" name="userfile" id="userfile">
				<input type="submit" value="开始上传" class="btn">
			</form>
		</div>
	</div>
	<form action="" method="post" id="info_form">
	<div class="row clear"><label class="label" for="company">公司</label><input type="text" class="textfield" name="company" id="company" value="<?=$current_user->company;?>"></div>
	<div class="row clear"><label class="label" for="">职位</label><input type="text" class="textfield" name="duty" id="duty" value="<?=$current_user->company;?>"></div>
	<div class="row clear"><label class="label" for="">城市</label><select name="city" id="city">
		<? foreach($cities as $city):?>
		<option value="<?=$city->id;?>" <? if($current_user->city==$city->id):?>selected<? endif;?>><?=$city->name;?></option>
		<? endforeach;?>
	</select></div>
	<div class="row clear"><label class="label" for="bio">个人介绍</label><textarea name="bio" class="textfield" id="bio" cols="30" row clears="10"><?=$current_user->bio;?></textarea></div>
	<div class="row clear"><label class="label" for="school">毕业学校</label><input type="text" class="textfield" name="school" id="school" value="<?=$current_user->school;?>"></div>
	<div class="row clear"><label class="label" for="graduation_year" value="<?=$current_user->graduation_year;?>">毕业年份</label>
		<select name="graduation_year" id="graduation_year">
			<? for($i = (int) date("Y");$i > 1976;$i--):?>
			<option value="<?=$i;?>" <? if($current_user->graduation_year==$i):?>selected<? endif;?>><?=$i;?></option>
			<? endfor;?>
		</select></div>
	<div class="row clear"><label class="label" for="interests">兴趣</label><input type="text" class="textfield" name="interests" id="interests" value="<?=$current_user->interests;?>"></div>
	<div class="row clear"><input type="submit" value="保存" class="btn submit"></div>
	</form>
	<script type="text/javascript">
		function upload_success(msg){
			$("#avatar_img").attr("src",msg);
		}

		function upload_fail(msg){
			alert(msg);
		}
	</script>
	</div>
</div>