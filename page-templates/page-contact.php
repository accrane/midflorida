<?php
/**
 * Template Name: Contact
 */

get_header(); 


$content = get_field('contact_info');
$map = get_field('contact_map');
$form_object = get_field('form');

?>
<div class="wrapper">
	<div id="primary" class="contact-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->

				<?php endwhile; // End of the loop.
			?>

				<?php if(have_rows('form_links')) : while(have_rows('form_links')) : the_row(); 

				$linkText = get_sub_field('link_text');
            	$pageLink = get_sub_field('link');
            	$permalink = get_the_permalink( $pageLink->ID );

            	// echo '<pre>';
            	// print_r($pageLink);
            	// echo '</pre>';

				?>
					<article class="white-box "  >
				 		<div class="link">
				 			<?php 
					 			if( $linkText != '' ) {
					 				echo $linkText;
					 			} else {
					 				echo $pageLink->post_title;
					 			}
				 			?>
				 		</div><!-- link -->
				 		<div class="quick-readmore">
				 			<a href="<?php echo $permalink ?>">READ MORE</a>
				 		</div>
				 	</article>
			<?php endwhile; endif; ?>

				<div class="map"><?php echo $map; ?></div>

			</article><!-- #post-## -->
				

			

		</main><!-- #main -->
	</div><!-- #primary -->

<aside id="secondary" class="contact-widget-area" role="complementary">
	<div class="entry-content">
		<?php 
		    echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
		?>
	</div>
</aside><!-- #secondary -->


</div><!-- wrapper -->
<?php get_footer(); ?>

