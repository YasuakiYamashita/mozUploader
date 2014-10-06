
<?php if(!empty($setting_error)) { ?>
<div class="alert alert-error"><?php echo $setting_error; ?></div>
<?php }?>

<div class="alert alert-info">新パスワードは入力しなければ更新されません</div>

<div class="row-fluid">

	<div class="span3">
		<ul class="nav nav-tabs nav-stacked">
		   <li><a href="https://ja.gravatar.com/" target="_blank"><i class="icon-file"></i> Iconを変更(外部ページ)</a></li>
		   <li><a href="#"><i class="icon-fire"></i> UserNameは変更できません</a></li>
		</ul>
	</div>
		
	<div class="span4">
	  <form class="form-signin" method="post">
	     <input type="text" placeholder="Email" name="email" value="<?php echo empty($email)?"":$email; ?>"> <i class="icon-asterisk"></i><br />
	     <input type="password" placeholder="NewPassword" name="new_password"><br />
	     <input type="password" placeholder="NewPassword" name="new_password2"><br />
	     <input type="password" placeholder="OldPassword" name="old_password"> <i class="icon-asterisk"></i><br />
	     <button class="btn btn-large btn-primary" type="submit" name="setting" value="true">Submit</button>
	  </form>
	</div>
</div>
