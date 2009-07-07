<?php get_header(); ?>

<div id="content" class="homepage">
	<?php if (have_posts()) : ?>

		<!--This is "The Loop"-->
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( in_category( 'General' )) { ?>
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small class="attr">Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?></small>
				<div class="entry">
					<?php
					// If post excerpt exists, show that, otherwise, show content
					if($post->post_excerpt != '')
						the_excerpt();
					else
						the_content('Click to continue &raquo;');
					?>
				</div><!--close entry class-->
			
				<!--	
				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Responses &#187;', '1 Response &#187;', '% Responses &#187;'); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></p>
				-->
			
			</div><!--close post class and post# id-->
			<?php } ?>
		<?php endwhile; ?>
		
		<!--
		<div class="navigation">
			<div class="txtalignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="txtalignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		-->
	<?php else : ?>

		<h2 class="center">Oops! Couldn't find what you were looking for. Maybe you'll want to search for it:</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
