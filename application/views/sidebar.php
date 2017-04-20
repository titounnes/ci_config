	<?php foreach($data as $key=>$value):?>
	<li class="treeview treeview-login">
		<a href="#" level="0">
			<i class="fa fa-<?= lang($key.'_icon')?>"></i>
			<?= lang($key)==''?$key:lang($key)?>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu" style="display: none; padding-left: 15px;">
			<?= menuTree($value,$key,0) ?>
		</ul>
	<li>
	<?php endforeach ?>
