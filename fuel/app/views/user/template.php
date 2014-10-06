<section class="container">
    <div class="row-fluid">

      <header class="page-header">
        <h1><img src="<?php echo $user_img; ?>" alt="UserIMG" class="img-polaroid" /> User Page <small> <?php echo $user_name; ?></small></h1>
      </header>
    </div>
    
    <div class="row-fluid">
      <ul class="nav nav-tabs">
        <li<?php if(Uri::string() == "user/index") { ?> class="active" <?php } ?>><a href="<?php echo Uri::base(false); ?>user/index.html"><i class="icon-user"></i> Home</a></li>
        <li<?php if(Uri::string() == "user/setting") { ?> class="active" <?php } ?>><a href="<?php echo Uri::base(false); ?>user/setting.html"><i class="icon-wrench"></i> Setting</a></li>
        <li<?php if(Uri::string() == "user/list") { ?> class="active" <?php } ?>><a href="<?php echo Uri::base(false); ?>user/list.html"><i class="icon-th-list"></i> List</a></li>
      </ul>
      
<?php if(!empty($content)) echo $content; ?>
      
    </div>
</section>