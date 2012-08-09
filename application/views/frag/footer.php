<div id="ft">
<div class="ftmain">
	<a href="#">问题反馈</a>|<a href="#">加入我们</a>|<a href="#">关于我们</a>
</div>
</div>

<script type="text/javascript">
<?php if(isset($jsdata)):?>
$(window).data(<?=json_encode($jsdata);?>);
<?php endif;?>
</script>
<?php foreach($js as $j):?>
<script type="text/javascript" src="/s/j/<?=$j;?>.js"></script>
<?php endforeach;?>

</body></html>