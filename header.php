<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<link rel='shortcut icon' href='<?php bloginfo('template_url') ?>/images/favicon.ico' />
<?php wp_head(); ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' - ', true, 'right'); ?><?php bloginfo('name'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie6.css" />
<![endif]-->
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="<?php bloginfo('template_url'); ?>/js/ThemeJS.js" type="text/javascript"></script>
<?php 
global $Panel;
$LBEnabled = $Panel->Settings('LightboxEnabled');
if ($LBEnabled == 'true') { ?>
<!--LightBox 2 Setup-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/lightbox.js"></script>
<?php }

if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--This is a plugin hook-->
<?php wp_head(); ?>

</head>

<body <?php if(is_page() || is_single()) echo 'onload="hideTags();"'; ?>>

<div id="container">
	<div id="wrapper">
		&nbsp; <!--Mozilla hack to show background-->
		<div id="header">
			
			<div id="masthead_wrapper">
				<h1 id="masthead"><a class="standard" href="<?php bloginfo('url'); ?>">mattrude.com</a></h1><h2 id="tagline"><?php bloginfo('description'); ?></h2>
			</div>
			
			<div id="headerimg">
				<?php if(is_home()) { ?>
					<a href="/banner-images/"><img src="<?php bloginfo('template_url'); ?>/images/header_images/header4.jpg" alt="" title="<?php bloginfo('name'); ?> Random Header Image" /></a>
				<?php }else{ ?>
					<a href="/banner-images/"><img src="<?php bloginfo('template_url'); ?>/functions/rotate.php" alt="" title="<?php bloginfo('name'); ?> Random Header Image" /></a>
				<?php } //endif ?>
			</div>
		</div><!--close header id-->
