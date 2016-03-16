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

			get_template_part( 'template-parts/content', get_post_format() );

			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="single-product-side">
<?php $args = array(
	'type'            => 'monthly',
	'limit'           => '',
	'format'          => 'html', 
	'before'          => '<div class="archive-list">',
	'after'           => '</div>',
	'show_post_count' => false,
	'echo'            => 1,
	'order'           => 'DESC',
        'post_type'     => 'post'
);
wp_get_archives( $args ); ?>
</div>

</div><!-- wrapper -->
<?php 
get_footer();
