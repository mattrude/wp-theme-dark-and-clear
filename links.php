<?php
/*
Template Name: Links
 */
?>
<?php get_header(); ?>

	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="single"><!--Slightly different styling for single posts and single pages-->
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<div class="entry">
						<h2>Links:</h2>
						<ul>
							<?php wp_list_bookmarks(); ?>
						</ul>
					</div><!--close entry class-->
					
				</div><!--close post class & post# id-->
			</div><!--close single class-->
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>