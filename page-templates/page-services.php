<?php
/**
 * Template Name: Products
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- wrapper -->


	<section class="blue home-blue">
		<div class="wrapper">
			<div class="products-page">
				<?php
				$i=0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'service',
					'posts_per_page' => -1
				));
				if ($wp_query->have_posts()) : ?>
			    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
			    	$i++;

			    	if( $i == 3 ) {
			    		$class = 'product-last';
			    		$i=0;
			    	} else {
			    		$class = 'product-first';
			    	}

			    	// Get field Name
					$image = get_field('featured_image'); 
					$url = $image['url'];
					$title = $image['title'];
					$alt = $image['alt'];
					$caption = $image['caption'];
				 	$size = 'large';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];


			    ?>	


			    <div class="product <?php echo $class; ?>">
			    	<div class="heading">
			    		<h2><?php the_title(); ?></h2>
			    		<div class="quick-readmore">
			    			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			    		</div>
			    	</div>
			    	<section class="product-image">
			    		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
			    	</section>
			    </div><!-- product -->

			<?php endwhile; ?>
		<?php endif; ?>
			</div><!-- products page -->
		</div>
	</section>



<?php get_footer(); ?>

