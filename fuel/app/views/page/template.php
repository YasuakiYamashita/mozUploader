<section class="container">
    <div class="row-fluid">

      <header class="span8 page-header">
        <h1><img src="<?php echo $user_img; ?>" alt="UserIMG" class="img-polaroid" /> <?php echo $uploader["name"]; ?> <small> <?php echo $uploader["charid"]; ?></small></h1>
      </header>
      
      <div class="span4 well well-small page-header">
        <?php echo $uploader["description"]; ?>
      </div>
    </div>
    
    <div class="row-fluid">
      <ul class="nav nav-tabs">
        <li<?php if(Uri::string() == "page/".$charid."/index") { ?> class="active" <?php } ?>><a href="<?php echo Uri::base(false); ?>page/<?php echo $charid; ?>/index.html"><i class="icon-leaf"></i> Home</a></li>
        <li<?php if(Uri::string() == "page/".$charid."/setting") { ?> class="active" <?php } ?>><a href="<?php echo Uri::base(false); ?>page/<?php echo $charid; ?>/setting.html"><i class="icon-wrench"></i> Setting</a></li>
      </ul>
      
<?php if(!empty($content)) echo $content; ?>
      
    </div>
</section>