<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

<section class="blue home-blue">
	<div class="wrapper">
		
			<h3>News</h3>
			<?php 
			wp_reset_query();
			wp_reset_postdata();
			// Query News
			$i=0;
			$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 10,
				'paged' => $paged,
			));
			?>
			<?php 
			// The Loop
			 if ( $wp_query->have_posts()) : while ( $wp_query->have_posts()) : 
			 	$wp_query->the_post(); 
			 $i++;

			 if( $i == 2 ) {
			 	$class = 'news-right';
			 	$i=0;
			 } else {
			 	$class = 'news-left';
			 }
			 ?>

			 	<article class="white-news <?php echo $class; ?> js-blocks wow zoomIn" data-wow-duration=".5s" >
			 		<h3><?php the_title(); ?></h3>
			 		<p><?php echo home_excerpt(20); ?></p>
			 		<div class="readmore">
			 			<a href="<?php the_permalink(); ?>">READ MORE</a>
			 		</div>
			 	</article>

			<?php endwhile; ?>

			<?php pagi_posts_nav(); ?>

		<?php endif; ?>
		
	</div>
</section>


<?php get_footer(); ?>

