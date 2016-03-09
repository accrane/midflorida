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
	<div id="primary" class="content-area">
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

	<div class="single-product-side">

		<?php 

		$wp_query = new WP_Query();
		$wp_query->query(array(
			'post_type'=>'product',
			'posts_per_page' => -1,
			'post__not_in' => array( $postID )
		));
		if ($wp_query->have_posts()) : ?>
	    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>
	    	<div class="single-product-list">
	    		<h2><?php the_title(); ?></h2>
	    		<div class="quick-readmore">
	    			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	    		</div>
	    	</div>
	<?php endwhile; endif; ?>

	</div><!-- single-product-side -->


<div id="gallery" class="single-product-gallery">
	<?php
	$i=0;
	if( $images ):
	foreach( $images as $image ):
	?>	

		<div class="item">
			<a class="gallery" href="<?php echo $image['url']; ?>">
	             <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
	        </a>
		</div><!-- item -->

		<?php endforeach; ?>
	<?php endif; // endif if gallery ?>
</div><!-- single product gallery -->

</div><!-- wrapper -->
<?php
get_footer();
