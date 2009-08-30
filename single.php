<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="navigation">
		<div class="floatleft"><?php previous_post_link('&laquo; %link') ?></div>
		<div class="floatright"><?php next_post_link('%link &raquo;') ?></div>
		<div class="clearfloatthick">&nbsp;</div>
	</div>
	
	<div class="single"><!--Slightly different styling for single posts and single pages-->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<small class="attr">Written by <?php the_author() ?> on <?php the_time('F jS, Y') ?>, filed under <?php the_category(', ') ?> | <?php edit_post_link('Edit', ''); ?> <?php the_tags('<br />Tags: ', ', ', '<br />'); ?></small>
			<div class="entry">
				<?php if($post->post_excerpt != '') : ?>
					<div class="centerer">
						<div class="summary">
							<span class="summarywords">Summary:</span>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<? endif; ?>
				
				<?php the_content('<p>Click to continue &raquo;</p>'); ?>
	
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
			</div><!--close entry class-->
			<!--Add Related Entries if Yet Another Related Posts Plugin is installed-->
			<?php if (function_exists('related_entries')) { echo related_entries(); }?>
			<p class="postmetadata1 alt">
					<small>
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<!--You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.-->
	
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
	
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
	
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.
	
						<?php } ?>
					</small>
				</p><!--close p.postmetadata alt-->
		</div><!--close post class & post# id-->
	</div><!--close single class-->
	
<?php comments_template(); ?>

<?php endwhile; else: ?>

	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div><!--close content id-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
