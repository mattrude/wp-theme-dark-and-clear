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

add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {
	register_taxonomy( 'people', 'post', array( 'hierarchical' => false, 'label' => 'People', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'places', 'post', array( 'hierarchical' => false, 'label' => 'Places', 'query_var' => true, 'rewrite' => true ) );
	register_taxonomy( 'events', 'post', array( 'hierarchical' => false, 'label' => 'Events', 'query_var' => true, 'rewrite' => true ) );
}

function legacy_comments($file) {

	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	
	return $file;
}

// Gallery 2 Widget 
class Gallery_2_widget extends WP_Widget {
	function Gallery_2_widget() {
		parent::WP_Widget(false, $name = 'Gallery 2 Random Images');	
		}
	function widget($args, $instance) {
		extract( $args );
		?><li><span class="sidetitle">Random Image</span><center><?php
		global $Panel;
		$G2URL = esc_attr($instance['g2imageblock']); 
		$G2SIZE = esc_attr($instance['g2imagesize']);
		@readfile("$G2URL/main.php?g2_view=imageblock.External&g2_blocks=randomImage&g2_exactSize=$G2SIZE&g2_show=title|date");
		?></center></li><?php
	}
	function update($new_instance, $old_instance) {				
		return $new_instance;
	}
	function form($instance) {				
		$G2URL = esc_attr($instance['g2imageblock']); 
		$G2SIZE = esc_attr($instance['g2imagesize']);
		_e('Gallery 2 URL:'); ?>
		<p><input class="widefat" id="<?php echo $this->get_field_id('g2imageblock'); ?>" name="<?php echo $this->get_field_name('g2imageblock'); ?>" type="text" value="<?php echo $G2URL; ?>" />
		<small>ie: http://www.example.com/gallery</small></p>

		<p><small>Image size in pixels</small><br />
		<input class="input" maxlength="4" size="4" id="<?php echo $this->get_field_id('g2imagesize'); ?>" name="<?php echo $this->get_field_name('g2imagesize'); ?>" type="text" value="<?php echo $G2SIZE; ?>" /></p>

        <?php 
    }

}
register_widget('Gallery_2_widget');


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
