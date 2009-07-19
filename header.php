<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<link rel='shortcut icon' href='http://www.mattrude.com/favicon.ico' />
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

<script src="<?php bloginfo('template_url'); ?>/js/ThemeJS.js"></script>
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
			
			<!--UNCOMMENT THE FOLLOWING SECTION OF CODE FOR RSS AND RSS VIA EMAIL
				SUBSCRIPTION BUTTONS
			<div id="subscribe">
				<div id="feedbubble"><div id="feedbubble_inner1"><div id="feedbubble_inner2">Click here to subscribe to the RSS Feed in your favorite feed reader</div><div id="feedbubble_pointer">&nbsp;</div></div></div>
				<div id="emailbubble"><div id="emailbubble_inner1"><div id="emailbubble_pointer">&nbsp;</div><div id="spacer">&nbsp;</div><div id="emailbubble_inner2">Click here to have new posts sent straight to your email</div></div></div>
				
				<a class="img" href="<?php bloginfo('rss2_url'); ?>" title=""><img src="<?php bloginfo('template_url'); ?>/images/rss_icon.gif" alt="" onmouseover="showRSS();" onmouseout="hideRSS();" /></a>
				<br />
				<a class="img" href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=1516518&loc=en_US" title=""><img src="<?php bloginfo('template_url'); ?>/images/email_icon.gif" alt="" onmouseover="showEmail();" onmouseout="hideEmail();" /></a>
			</div>
			-->
			
			<div id="masthead_wrapper">
				<h1 id="masthead"><a class="standard" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><h2 id="tagline"><?php bloginfo('description'); ?></h2>
			</div>
			
			<div id="headerimg">
				<?php if(is_home()) { ?>
					<img src="<?php bloginfo('template_url'); ?>/images/header_images/header4.jpg" title="<?php bloginfo('name'); ?> Random Header Image" />
				<?php }elseif(is_single()) { ?>
					<img src="<?php bloginfo('template_url'); ?>/rotate.php" title="<?php bloginfo('name'); ?> Random Header Image" />
				<?php }elseif(is_page()) { ?>
					<img src="<?php bloginfo('template_url'); ?>/rotate.php" title="<?php bloginfo('name'); ?> Random Header Image" />
				<?php }else{ ?>
					<img src="<?php bloginfo('template_url'); ?>/rotate.php" title="<?php bloginfo('name'); ?> Random Header Image" />
				<?php } //endif ?>
			</div>
		</div><!--close header id-->
