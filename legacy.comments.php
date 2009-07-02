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

<?php if ($comments) : ?>
			
	<h3 id="comments"><?php echo $comment_count . " Comments so far &darr;"; ?></h3>

	<ol class="commentlist">
	
	<?php foreach ($comments as $comment) : ?>
	
	<!--Separate comments from trackbacks and pingbacks-->
	<?php $comment_type = get_comment_type(); ?>
	<?php if($comment_type == 'comment') : ?>
	
	<?php 
	//Test for author comment
	if($comment->user_id == $post->post_author) {
		$authorcomment = 'author';
		$commentclass = $oddcomment . ' ' . $authorcomment;
	}else{
		$authorcomment = '';
		$commentclass = $oddcomment;
	}//endif
	?>
	<li <?php echo 'class = "' . $commentclass . '"'; ?>id="comment-<?php comment_ID() ?>">

		<div class="commentsidebar"><div class="commentmo">
		<?php echo comment_date('M'); ?>
		<br />
		<?php echo comment_date('j'); ?>
		</div><div class="commenttime">
		<?php echo comment_time('g:i'); ?>
		<br />
		<?php echo comment_time('A'); ?>
		</div></div>
		
		<div class="commentwrap">
		
		<?php if(function_exists('get_avatar')){
			$default = get_bloginfo('template_url');
			$default .= "/images/no_gravatar.gif";
			$avatar = get_avatar($comment, '80', $default);
			echo $avatar;
		} ?> 
		<cite><?php comment_author_link() ?></cite>
		<?php if ($comment->comment_approved == '0') : ?>
		<em>Your comment is awaiting moderation.</em>
		<?php endif; ?>
		<small class="commentmetadata"><?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

		<?php comment_text() ?>
		
		</div>
	</li>
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'alt' : '';
	?>
	<?php endif; //end comment/trackback/pingback separator ?>
	<?php endforeach; /* end for each comment */ ?>

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

<div id="allowedtags">
<span class="bottomdotted">Spruce up your comments with
<script>
<!--
	document.write('<a href="javascript: hideTags();" title="Click to expand">these tags.</a></span>');
-->
</script>
<noscript>
	these tags.</span>
</noscript>

<div id="allowedtagstxt">
<?php 
//echo allowed tags with line breaks
$allowed = allowed_tags();
$allowed = '<span class="tags">' . $allowed . '</span>';
$regex = '#(&gt; &lt;)#';
$replacestr = '&gt;</span><span class="tags">&lt;';
$new_allowed = preg_replace($regex, $replacestr, $allowed); 
echo $new_allowed; 
?>
</div>

<?php  //Check if all comments are being moderated. If not, check if only new commentators' comments are being moderated.
if (get_option('comment_moderation') == 1) : ?>
<span class="bottomdotted">All comments are moderated before being shown</span>
<?php elseif(get_option('comment_whitelist') == 1) : ?>
<span class="bottomdotted">New comments are moderated before being shown</span>
<?php endif; ?>
<span class="bottomdotted marginbottom"><span class="required">*</span> = required field</span></div>

<h3 id="respond">Leave a Comment</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

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

</form>

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
