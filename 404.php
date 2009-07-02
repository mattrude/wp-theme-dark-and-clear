<?php include(TEMPLATEPATH . '/header_plain.php'); ?>

	<div id="content">

		<div <?php post_class(); ?>>
		<h1 class="attr">404 - Page Not Found, so there.</h1>
			<div class="fourohfour">
				<p>The page you requested could not be found. No worries, try one of these options to find what you're looking for;</p>
				<ol>
				<li><a href="<?php bloginfo('url'); ?>" title="Go to the Homepage">Start at the Home Page</a></li>
				<li><a href="<?php bloginfo('url'); ?>/archives/" title="Browse the Archives">Browse the Archive</a></li>
				<li><a href="<?php bloginfo('url'); ?>/gallery/" title="Browse the Gallery">Browse the Gallery</a></li>
				<li>Search the site:<?php include(TEMPLATEPATH . '/searchform.php'); ?></li>
				</ol>
			</div>
		</div>

	</div>

<?php get_footer(); ?>