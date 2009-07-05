<div class="clearfloatthick"></div>
<div id="footer">
	<p>
		<?php global $Panel; echo $Panel->Settings('FooterText'); ?>
	</p>
</div>
</div>

<!--footer plugin hook-->
<?php wp_footer();

if ( is_user_logged_in() ) { 
	?><!--User is logged in, so this request will Not be tracked by Google Analytics-->
<?php
} else {
	global $Panel;
	$GAEnabled = $Panel->Settings('GoogleAnalyticsEnabled');
	$GAID = $Panel->Settings('GoogleAnalyticsID');
	if ($GAEnabled == 'true') {
		if ($GAID != NULL) { ?>
			<!--Google Analytics tracking script-->
			<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
			var pageTracker = _gat._getTracker("<?php echo $GAID; ?>");
			pageTracker._trackPageview();
			} catch(err) {}</script>
<?php 		}
	}

} ?>
<!--Closeing tags-->
</body>
</html>
