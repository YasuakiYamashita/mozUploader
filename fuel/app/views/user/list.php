
<div class="tiles row-fluid">
<?php foreach($list as $id => $row) { ?>
<?php if($id % 3 == 0) {?>
</div>
<div class="tiles row-fluid">
<?php } ?>
	<div class="span4">
		<a class="tile" href="<?php echo Uri::base(false); ?>page/<?php echo $row["charid"];?>/index.html">
		<div class="icon">
			<i class="icon-folder-open"></i>
		</div>
		<div class="data">
			<h4><?php echo $row["description"]; ?></h4>
		</div>
		</a>
	</div>
<?php } ?>

<?php if(empty($list)) { ?>
<div class="alert alert-error">権限のあるアップローダがありませんでしたー</div>
<?php }?>

</div>
