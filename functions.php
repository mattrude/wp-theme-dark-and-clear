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
		'Type'=>'TextArea',
		'ID'=>'FooterText',
		'Label'=>'Footer Text',
		'Description' => 'Add a footer to the bottom of ever page.'
	),
//	array
//	(
//		'Type'=>'CheckBox',
//		'ID'=>'ShowWPLink',
//		'Label'=>'Show WordPress Link',
//		'Description' => 'Check this box if you wish to show the wordpress credit in the footer.',
//		'Default'=> 'true'
//	),
	array
	(
		Type=>'End'
	),
	array
	(
		'Type'=>'Title',
		'Value'=>'Gallery 2 module'
	),
	array
	(
		'Type'=>'Text',
		'ID'=>'GalleryURL',
		'Label'=>'Random Image Gallery URL',
		'Description'=>'This is the URL of your Gallery2 install <br /> ie: http://www.example.com/gallery'
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
