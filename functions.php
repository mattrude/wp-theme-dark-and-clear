<?php
require_once('control-panel.php');
#require_once('category-excluder.php');

if(function_exists('register_sidebar'))
	register_sidebar(array (
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<span class="sidetitle">',
		'after_title' => '</span>',
	));
	
add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
	register_taxonomy( 'people', 'post', array( 'hierarchical' => false, 'label' => 'People', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'places', 'post', array( 'hierarchical' => false, 'label' => 'Places', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'events', 'post', array( 'hierarchical' => false, 'label' => 'Events', 'query_var' => true, 'rewrite' => true ) );
}


// Adds robots.txt support
$defaultrobotstxt = "# This is the default robots.txt file
User-agent: *
Disallow:";

add_option("robots_txt", $defaultrobotstxt, "Contents of robots.txt", 'no');		// default value

function robots_txt(){
	$request = str_replace( get_bloginfo('url'), '', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] );

	if ( (get_bloginfo('url').'/robots.txt' != 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) && ('/robots.txt' != $_SERVER['REQUEST_URI']) && ('robots.txt' != $_SERVER['REQUEST_URI']) )
		return;		// checking whether they're requesting robots.txt
	
	$robotstxt_out = get_option('robots_txt');
	
	if ( !$robotstxt_out)
		return;

	header('Content-type: text/plain');
	print $robotstxt_out;
	die;
}

$Options =
array
(
	array
	(
		'Type'=>'Title',
		'Value'=>'General Settings'
	),
	array
	(
		'Type'=>'CheckBox',
		'ID'=>'LightboxEnabled',
		'Label'=>'<strong>Enable Lightbox images module</strong>',
		'Description' => 'This may interfere with some plugins.',
		'Default'=> 'false'
	),
	array
	(
		'Type'=>'TextArea',
		'ID'=>'FooterText',
		'Label'=>'<strong>Footer Text</strong>',
		'Description' => 'Add a footer to the bottom of ever page.'
	),
	array
	(
		Type=>'End'
	),
	array
	(
		'Type'=>'Title',
		'Value'=>'Google Analytics Options'
	),
	array
	(
		'Type'=>'CheckBox',
		'ID'=>'GoogleAnalyticsEnabled',
		'Label'=>'<strong>Enable Google Analytics</strong>',
		'Description' => 'This module requres a <a href="http://analytics.google.com">Google Analytics</a> account.<br />The Google Analytics code will NOT be displayed for logged in users.',
		'Default'=> 'false'
	),
	array
	(
		'Type'=>'Text',
		'ID'=>'GoogleAnalyticsID',
		'Label'=>'<strong>Google Analytics ID</strong>',
		'Description'=>'Enter your <a href="http://analytics.google.com">Google Analytics</a> account ID.'
	),
	array
	(
		Type=>'End'
	),
	array
	(
		Type=>'Close'
	)
);

add_action('init', 'robots_txt');
$Panel = new ControlPanel('Dark and Clear');
$Panel->SetOptions($Options);
$Panel->Initialize();

?>
