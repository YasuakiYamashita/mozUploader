
<div class="nav-collapse collapse">
	<ul class="nav nav-pills pull-right">
		<li class="dropdown">
			<a href="<?php echo Uri::base(false); ?>user/setting.html" title="Settings"><i class="icon-cog icon-white"></i> Settings</a>
		</li>
		<li class="dropdown">
			<a href="<?php echo Uri::base(false); ?>user/index.html" title="Settings" data-toggle="dropdown"><i class="icon-white icon-user"></i> <?php echo $user['name']; ?></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo Uri::base(false); ?>user/index.html">Profile</a></li>
				<li><a href="<?php echo Uri::base(false); ?>user/list.html">Uploader List</a></li>
				<li><a href="<?php echo Uri::base(false); ?>signout.html">Sign Out</a></li>
			</ul>
		</li>
	</ul>
</div>
