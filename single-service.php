<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	
	<div id="primary" class="single-service-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

		// get the current ID to exclude from the next query
		$postID = get_the_ID(); 
		$content = get_field('page_content');
		$images = get_field('gallery');
		?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $content; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="single-service-side">
		<div id="gallery" class="single-product-gallery">
			<?php
			$i=0;
			if( $images ):
			foreach( $images as $image ):
			?>	

				<div class="item item-service">
					<a class="gallery" href="<?php echo $image['url']; ?>">
			             <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
			        </a>
				</div><!-- item -->

				<?php endforeach; ?>
			<?php endif; // endif if gallery ?>
		</div><!-- single product gallery -->
	</div><!-- single-product-side -->
</div><!-- wrapper -->


<section class="blue home-blue">
		<div class="wrapper">
			<div class="single-service-list-area">

				<h2>Check out our other Landfill & Recycling Services</h2>

<?php 
		$i=0;
		$wp_query = new WP_Query();
		$wp_query->query(array(
			'post_type'=>'service',
			'posts_per_page' => -1,
			'post__not_in' => array( $postID )
		));
		if ($wp_query->have_posts()) : ?>
	    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
	    $i++;
	    if( $i == 2 ) {
	    	$class = 'service-last';
	    	$i=0;
	    } else {
	    	$class = 'service-first';
	    }

	    // Get field Name
		$image = get_field('featured_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 	$size = 'thumbnail';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

		$shortDesc = get_field('short_description'); 

	    ?>
	    	<div class="single-service-list <?php echo $class; ?>">
	    		<div class="single-service-thumb">
	    			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	    		</div><!-- thumb -->
	    		<div class="single-service-right">
	    			<h2><?php the_title(); ?></h2>
	    			<?php echo $shortDesc; ?>
	    		</div><!-- single service right -->
	    		<div class="quick-readmore">
	    			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    		</div>
	    	</div>
	<?php endwhile; endif; ?>


		</div><!--  products-page -->
	</div><!-- wrapper -->
</section><!-- blue -->



<?php
get_footer();
