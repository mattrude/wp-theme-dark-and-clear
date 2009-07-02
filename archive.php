<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="pagetitle"><?php single_cat_title(); ?></h1><h3 class="pagetitle"> ...now browsing by category</h3>
		<?php if(trim(category_description()) != "<br />") { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<? }?>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="pagetitle"><?php single_tag_title(); ?></h1><h3 class="pagetitle"> ...now browsing by tag</h3>
		<div class="clearfloatthick">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pagetitle"><?php the_time('F jS, Y'); ?></h1><h3 class="pagetitle"> ...now browsing by day</h3>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pagetitle"><?php the_time('F, Y'); ?></h1><h3 class="pagetitle"> ...now browsing by month</h3>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pagetitle"><?php the_time('Y'); ?></h1><h3 class="pagetitle"> ...now browsing by year</h3>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="pagetitle">Archives</h1><h3 class="pagetitle"> ...now browsing by author</h3>
		<div class="clearfloatthick">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle">Archives</h1><h3 class="pagetitle"> ...now browsing the general archives</h3>
 	 	<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>
	
				<div class="entry">
					<?php the_content('Click to continue &raquo;'); ?>
				</div>
	
				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Responses &#187;', '1 Response &#187;', '% Responses &#187;'); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></p>
				</div><!--close post class-->
	
		<?php endwhile; ?>
	
		<div class="navigation">
			<div class="txtalignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="txtalignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
