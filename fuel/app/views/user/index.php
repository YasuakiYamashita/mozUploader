
<?php if(!empty($user_log)) { ?> 
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Well done!</strong> <?php echo $user_log; ?>
      </div>
<?php } ?>

<?php if(!empty($user_error)) { ?> 
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> <?php echo $user_error; ?>
      </div>
<?php } ?>

<div class="tiles row-fluid">
	<div class="span4">
		<a class="tile" href="<?php echo Uri::base(false); ?>signout.html">
		<div class="icon">
			<i class="icon-off"></i>
		</div>
		<div class="data">
			<h4>Sign Out</h4>
		</div>
		</a>
	</div>
	<div class="span4">
		<a class="tile" href="<?php echo Uri::base(false); ?>user/setting.html">
		<div class="icon">
			<i class="icon-wrench"></i>
		</div>
		<div class="data">
			<h4>Setting User Page</h4>
		</div>
		</a>
	</div>
	<div class="span4">
		<a class="tile" href="<?php echo Uri::base(false); ?>user/create.html">
		<div class="icon">
			<i class="icon-plus-sign"></i>
		</div>
		<div class="data">
			<h4>Create Uploader</h4>
		</div>
		</a>
	</div>
</div>