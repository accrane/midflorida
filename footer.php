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

<!-- Google Code for Remarketing Tag --> 
<!--Remarketing tags may not be associ
ated with personally identifiable information or placed on pages related to sensitive 
categories. See more information and instructions on how to setup the tag on: 
http://google.com/ads/remarketingsetup --> 
<script type="text/javascript"> 
/* <![CDATA[ */ var google_conversion_id = 859239499;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true; /* ]]> */ 
</script> 
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script> <noscript> 
<div style="display:inline;"> 
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/859239499/?guid=ON&amp;script=0"/> 
</div> 
</noscript>

</body>
</html>
