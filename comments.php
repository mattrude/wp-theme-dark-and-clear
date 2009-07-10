<?php // Do not delete these lines
	
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) {
		echo 'This post is password protected. Enter the password to view comments.';
		return;
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<?php 
//count comments, trackbacks, and pingbacks
if($comments) {
	$trackping_count = 0; $comment_count = 0;
	foreach($comments as $comment) {
		$comment_type = get_comment_type();

		if($comment_type == 'comment') {
			$comment_count++;
		}else{
			$trackping_count++;
		} //endif
	} //end foreach
} //endif
?>

<?php if (have_comments()) : ?>
			
	<h3 id="comments"><?php echo $comment_count . " Comments"; ?></h3>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<div id="respond">
<h3><?php comment_form_title( 'Leave a Comment', 'Reply to %s' ); ?></h3>

<div id="cancel-comment-reply">
	<small><?php cancel_comment_reply_link() ?></small>
</div>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p><label for="author">Name <?php if ($req) echo '<span class="required">*</span>'; ?></label><br />
<input class="text" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>

<p><label for="email">Email (will not be published) <?php if ($req) echo '<span class="required">*</span>'; ?></label><br />
<input class="text" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>

<p><label for="url">Website</label><br />
<input class="text" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

<p><label for="comment">Comment</label><br />
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>
<?php comment_id_fields(); ?>
</form>
</div><!-- close respond id -->

<!-- Display trackbacks/pingbacks at bottom of post
	If you do not want trackbacks/pingbacks visible, delete this section -->
<?php if($comments && ($trackping_count != 0)) : ?>
<h3 class="trackbacks"><?php echo $trackping_count; ?> Trackbacks / Pingbacks</h3>
	<ol class="tpbacks">
	<?php foreach ($comments as $comment) : ?>
	<?php $comment_type = get_comment_type(); ?>
	<?php if($comment_type != 'comment') { ?>
	<li><?php comment_author_link() ?></li>
	<?php } ?>
	<?php endforeach; ?>
</ol>
<?php endif; ?>
<!--End of trackbacks / pingbacks section -->

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
