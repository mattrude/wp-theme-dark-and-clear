<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
	<br />
	<div id=taxonomy_head>

	</div>
		<!--This is "The Loop"-->
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id="taxonomy_template">
			<div id=taxonomy_post>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
			<div id=taxonomy_date>

			</div>	
			</div><!--close post class and post# id-->
		<?php endwhile; ?>
		<br />	
		<div class="navigation">
			<div class="txtalignright"><?php next_posts_link('Older Entries &raquo;') ?></div>
			<div class="txtalignleft"><?php previous_posts_link('&laquo; Newer Entries') ?></div>
		</div>
	<?php else : ?>

		<h2 class="center">Oops! Couldn't find what you were looking for. Maybe you'll want to search for it:</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
