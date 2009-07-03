<div id="sidebar">
	<ul>
	<li><span class="sidetitle">Random Image</span></li>
	<center>
         <?php @readfile("http://192.168.1.2/gallery/main.php?g2_view=imageblock.External&g2_blocks=randomImage&g2_exactSize=200&g2_show=title|date"); ?>
        </center>
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<li><?php include (TEMPLATEPATH . '/searchform.php'); ?></li>
);
		<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.-->
		<li class="calendar">
		<?php get_calendar(); ?>
		</li>
		
		<li><span class="sidetitle">Author</span>
		<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
		</li>
		
		<?php wp_list_pages('title_li=<span class="sidetitle">Pages</span>' ); ?>
	
		<li><span class="sidetitle">Archives</span>
			<ul>
			<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>
	
		<?php wp_list_categories('show_count=0&title_li=<span class="sidetitle">Categories</span>'); ?>
		
	<?php endif; ?>
	</ul>
</div>
