<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>
		<h1 class="attr">Search Results</h1>
		<ol>
		<?php $counter = 0; ?>
		<?php query_posts($query_string . "&posts_per_page=20"); ?>
		<?php while (have_posts()) : the_post();
			if($counter == 0) {
				$numposts = $wp_query->found_posts; // count # of search results ?>
				Search term: <span class="searchmeta"><?php the_search_query(); ?></span><br />
				Number of results: <span class="searchmeta"><?php echo $numposts; ?></span><br />
				If you can't find what you want here, <a href="<?php bloginfo('url'); ?>/archives/" title="Browse the archives">try browsing the archives</a>
			<?php } //endif ?>
			
			<div class="entrysearch">
				<div id="searchdate"><?php the_time('n/j/y'); ?></div>
				<li><h2 class="searchtitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
  				<div id="searchcomments">&nbsp;<?php comments_popup_link('0', '1', '%'); ?></div></li>
				<div class="clearfloat">&nbsp;</div>
				<div class="search_hr">&nbsp;</div>
			</div>
		<?php $counter++; ?>
		<?php endwhile; ?>
		</ol>
		<div class="navigation">
			<div class="txtalignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="txtalignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Sorry, we couldn't find anything that matched your search.</h2>
		<div class="entry">
		<p>You can try another search...</p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<p><a href="<?php bloginfo('url'); ?>/archives/" title="Browse the archives">&laquo; Or browse the archives</a></p>
		</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>