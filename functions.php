<?php
require_once('control-panel.php');

if(function_exists('register_sidebar'))
	register_sidebar(array (
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<span class="sidetitle">',
		'after_title' => '</span>',
	));
	
// Call comments based on existence of wp_list_comments function
add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {

	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	
	return $file;
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
		'Value'=>'Gallery 2 module Options'
	),
	array
	(
		'Type'=>'CheckBox',
		'ID'=>'Gallery2Enabled',
		'Label'=>'<strong>Enable Gallery 2 module</strong>',
		'Description' => '',
		'Default'=> 'false'
	),
	array
	(
		'Type'=>'Text',
		'ID'=>'GalleryURL',
		'Label'=>'<strong>Random Image Gallery URL</strong>',
		'Description'=>'This is the URL of your Gallery2 install <br /> ie: http://www.example.com/gallery'
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
		'Description' => 'This module requres a <a href="http://analytics.google.com">Google Analytics</a> account. The Google Analytics code will NOT be displayed for logged in users.',
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

$Panel = new ControlPanel('Dark and Clear');
$Panel->SetOptions($Options);
$Panel->Initialize();

?>
