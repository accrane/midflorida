<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">
			<div class="site-info">
				<?php 
				$phone = get_field('phone', 'option');
				$address = get_field('address', 'option');
				$city_state_zip = get_field('city_state_zip', 'option');
				$sitemap = get_field('sitemap_link', 'option');
				$bella = 'http://bellaworksweb.com/?r=midflorida';

				echo '<div class="footer-logo"><a href="'. get_bloginfo('url') . '">'. get_bloginfo('name') . '</a></div>';
				echo '<div class="footer-address">';
				echo $address . ' | ' . $city_state_zip . ' | ' . $phone;
				echo '</div>';

				echo '<div class="footer-cred">';
				echo '<a href="'.$sitemap.'"  >Sitemap</a> | Site by <a target="_blank" href="'.$bella.'">Bellaworks</a>';
				echo '</div>';
				 ?>
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- liquid web -->
<?php the_field('google_analytics', 'option') ?>
<script>
window.addEventListener('load',function(){
if(jQuery('#gform_confirmation_message_3').length > 0 && window.location.href.indexOf('/request-roll-offdumpster-service') != -1){
jQuery('body').append('<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/859239499/?label=sPpnCPuTu3MQy-jbmQM&guid=ON&script=0"/>');
}
});
</script>

</body>
</html>
