<div id="ft">
<div class="ftmain">
	<a href="#">问题反馈</a>|<a href="#">加入我们</a>|<a href="#">关于我们</a>
</div>
</div>

<?php if(isset($jsdata)):?>
<script type="text/javascript">
$(window).data(<?=json_encode($jsdata);?>);
</script>
<?php endif;?>
<?php foreach($js as $j):?>
<script type="text/javascript" src="/s/j/<?=$j;?>.js"></script>
<?php endforeach;?>
<?php if(isset($jsmain)):?>
<script type="text/javascript">
	seajs.use("page/<?=$jsmain;?>");
</script>
<?php endif;?>
</body></html>