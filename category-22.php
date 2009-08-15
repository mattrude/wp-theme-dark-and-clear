<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
	<img src="<?php bloginfo('template_url'); ?>/images/twitter.jpg" width="300" height="111" />
	<br />
	<div id=tweet_head>
		Welcome to my Twitter feed. Here you will find ALL my tweet history.  You may click on the date to go to the origin tweet if Twitter still has it. You may follow me as <a href="http://twitter.com/mdrude">@mdrude</a>.
	</div>
		<!--This is "The Loop"-->
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?> id=tweet_post>
				<img src="<?php bloginfo('template_url'); ?>/images/twitter-logo.jpg" width="50" height="50" align='left' style='margin-right: 5px;' />
				<?php the_excerpt(); ?>
				<div id=tweet_date>
				<?php global $wp_query; ?>
                        	<?php $tweet_id = get_post_meta( $wp_query->post->ID, 'aktt_twitter_id', true ); ?>
				Posted to <a href="http://twitter.com">Twitter</a> by <?php the_author() ?> on <a href="http://twitter.com/mdrude/status/<?php echo $tweet_id ?>"><?php the_time('F jS, h:ma T Y ') ?></a>
				</div>	
				<!--	
				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Responses &#187;', '1 Response &#187;', '% Responses &#187;'); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></p>
				-->
			
			</div><!--close post class and post# id-->
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
