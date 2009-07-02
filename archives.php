<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">
	<!--##########################BEGIN GET POSTS BY MONTH#########################-->
	<div id="top_tabs"><ul>
	<li id="bymonth" class="top_tab"><a href="javascript: void(0);" onclick="toggleSwap('archives_month', 'archives_category', 'archives_tag');">By Month</a></li>
	<li id="bycategory" class="top_tab"><a href="javascript: void(0);" onclick="toggleSwap('archives_category', 'archives_month', 'archives_tag');">By Category</a></li>
	<li id="bytag" class="top_tab"><a href="javascript: void(0);" onclick="toggleSwap('archives_tag', 'archives_category', 'archives_month');">By Tag</a></li></ul>
	<div class="clearfloat">&nbsp;</div>
	</div>
	<div class="clearfloat">&nbsp;</div>
	<div id="archives_month">
		<h2 class="attr">By Month:
			<script language="javascript">
			<!--
			var html1 = ''; var html2 = '';
			html1 += '<a class="showhide_link" id="hideall_link" href="javascript: void(0);" onclick="hideAll(\'excerpt\', \'hideall_link\', \'showall_link\');" title="">[hide excerpts]</a>';
			html2 += '<a class="showhide_link" id="showall_link" href="javascript: void(0);" onclick="showAll(\'excerpt\', \'showall_link\', \'hideall_link\');" title="">[show excerpts]</a>';
			document.write(html1);
			document.write(html2);
			-->
			</script>
		</h2>
		<div class="indent">
				<?php if(have_posts()) :
					query_posts("orderby=date&posts_per_page=-1");
					$exnumber = 0;
					while (have_posts()) : the_post();
						$monthnum = get_the_time('n');
						$monthname = get_the_time('F'); 
						if($monthnum != $lastmonth) {
							$thisyear = get_the_time('Y');
							echo "<h3 class=\"archive_head\">$monthname $thisyear</h3>";
							$lastmonth = $monthnum;
						} ?>
						<h3 class="archives"><a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark" title="View <?php the_title(); ?>"><?php the_title(); ?></a>
						</h3>
						<div id="excerpt<?php echo $exnumber; ?>"><?php the_excerpt(); ?></div><!--close excerpt id-->
						
						<script language="javascript">
						<!--
						//Hide arrowsin image and excerpt on page load
						hideElement('excerpt<?php echo $exnumber; ?>', 'hideall_link');
						-->
						</script>
						
						<?php $exnumber++; //increment counter ?>
					<?php endwhile; ?>
	<?php endif; ?>
	</div>
	</div><!--close archives_monthly id-->
	<!--#################END GET POSTS BY MONTH#################-->
	
	<!--#####################GET POSTS BY CATEGORY#######################-->
	<div id="archives_category">
		<h2 class="attr">By Category:
			<script language="javascript">
			<!--
			var html1 = ''; var html2 = '';
			html1 += '<a class="showhide_link" id="cathideall_link" href="javascript: void(0);" onclick="hideAll(\'catexcerpt\', \'cathideall_link\', \'catshowall_link\');" title="">[hide excerpts]</a>';
			html2 += '<a class="showhide_link" id="catshowall_link" href="javascript: void(0);" onclick="showAll(\'catexcerpt\', \'catshowall_link\', \'cathideall_link\');" title="">[show excerpts]</a>';
			document.write(html1);
			document.write(html2);
			-->
			</script>
		</h2>
		<div class="indent">
				<?php 
				$catids_ar = get_all_category_ids();
				$catids = $catids_ar;
				$exnumber = 0;
				foreach($catids as $catid) {
					query_posts("cat=$catid&order=ASC&posts_per_page=-1");
					if(have_posts()): 
					$catname = get_cat_name($catid);
					echo "<h3 class=\"archive_head\">$catname</h3>";
					while(have_posts()): the_post(); ?>
						
						<h3 class="archives"><a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h3>
						<div id="catexcerpt<?php echo $exnumber; ?>"><?php the_excerpt(); ?></div><!--close excerpt id-->
						
						<script language="javascript">
						<!--
						//Hide arrowsin image and excerpt on page load
						hideElement('catexcerpt<?php echo $exnumber; ?>', 'archives_category', 'cathideall_link');
						-->
						</script>
						
						<?php $exnumber++; //increment counter ?>
					<?php endwhile; endif; }//close foreach ?>
		</div>
	</div><!--close archives_category id-->
	<!--###################END GET POSTS BY CATEGORY################################-->
	
	<!--###################BEGIN GET POSTS BY TAG################################-->
	
	<div id="archives_tag">
		<h2 class="attr">By Tags:</h2>
		
		<!--Show tag cloud-->
		<?php wp_tag_cloud(''); ?>
		
	</div><!--close archives_tag id-->
	
	<script language="javascript">
	<!--
	// Hide archives_tag id on page load
	hideElement('archives_tag');
	-->
	</script>
	
	<!--#################END GET POSTS BY TAG###############################-->
	
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>