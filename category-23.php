<?php get_header(); ?>

<div id=”content”>

<div id=”contentleft”>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id=”gallerypost”><a href=”<?php the_permalink() ?>” rel=”bookmark”><img src=”<?php echo get_post_meta($post->ID, “gallery thumbnail”, true); ?>” alt=”<?php echo get_post_meta($post->ID, “gallery thumbnail”, true); ?> Gallery” height=’100′ border=’0′ align=’left’ style=’margin-left: 5px; margin-right: 5px;’ /></a>
<h1 style=”margin:0px 0px 2px 10px;”><?php the_title(); ?></h1><?php the_excerpt(); ?>
</div>
<?php endwhile; else: ?>

<p><?php _e(’Sorry, no posts matched your criteria.’); ?></p>

<?php endif; ?>

</div>

<?php include(TEMPLATEPATH.”/sidebar.php”);?>

<!– The main column ends  –>

<?php get_footer(); ?>
