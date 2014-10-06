<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo empty($title)?"アップローダ":$title; ?></title>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=0.5,user-scalable=yes,initial-scale=1.0">
<?php echo Asset::css("bootstrap.css"); ?>
<?php echo Asset::css("responsive.css"); ?>
<?php echo Asset::css("style.css"); ?>
<?php echo Asset::css("elusive-webfont.min.css"); ?>
<!--[if lte IE 8]><script src="/wp-content/themes/html5.theme/common/js/html5.js" type="text/javascript"></script><![endif]-->

<script src="http://code.jquery.com/jquery.min.js"></script>
<?php echo Asset::js("bootstrap.js"); ?>
<script src="https://google-code-prettify.googlecode.com/svn/loader/prettify.js"></script>
<?php echo Asset::js("application.js"); ?>

</head>
<body>
	<nav class="navbar navbar-fixed-top">

		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse"><i class="icon-list"></i></button>
				<a href="<?php echo Uri::base(false); ?>" title="Green mind | bootstrap" class="brand"><i class="icon-leaf"></i> Uplo@der </a>
<?php if(!empty($nav)) echo $nav; ?>

			</div>
		</div>
	</nav>
	
<?php if(!empty($header)) echo $header; ?>

<div class="page-container">
	<section class="page-content">
<?php if(!empty($content)) echo $content; ?>

	</section>
</div>

	<footer id="footer" class="footer">
		<p><i class="icon-github"></i><a href="https://github.com/YasuakiYamashita/mozUploader">MozUploader</a></p>
		<p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License v2.0</a>.</p>
		<p>Based on <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>. Hosted on <a href="http://pages.github.com/">GitHub</a>. Icons from <a href="http://aristeides.com/elusive-iconfont/">Elusive Icons</a>. Web fonts from <a href="http://www.google.com/webfonts">Google</a>.<p></p>
	</footer>
</body>
</html>
