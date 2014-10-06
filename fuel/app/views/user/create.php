
<?php if(!empty($create_error)) { ?>
<div class="alert alert-error"><?php echo $create_error; ?></div>
<?php }?>

<div class="row-fluid">

	<div class="span3 well">
		アップローダ作成
	</div>
	
	<div class="span4">
	  <form class="form-signin" method="post">
	     <input type="text" placeholder="Name" name="name" value="<?php echo empty($name)?"":$name; ?>"> <i class="icon-asterisk"></i><br />
	     <input type="text" placeholder="ID" name="id" value="<?php echo empty($id)?"":$id; ?>"> <i class="icon-asterisk"></i><br />
	     <textarea rows="3" placeholder="説明" name="description"><?php echo empty($description)?"":$description; ?></textarea> <i class="icon-asterisk"></i><br />
	     <button class="btn btn-large btn-primary" type="submit" name="create" value="true">Submit</button>
	  </form>
	</div>
</div>
