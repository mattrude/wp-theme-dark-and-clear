<?php
/*
Template Name: Original Archives
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="old_archives">
<h2>Archives by Month:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archives by Subject:</h2>
	<ul>
		 <?php wp_list_categories('title_li='); ?>
	</ul>

</div><!--close old_archives id-->
</div><!--close content id-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
