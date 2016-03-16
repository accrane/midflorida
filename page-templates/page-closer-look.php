<?php
/**
 * Template Name: Closer Look
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

			$page_content = get_field('page_content');

			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php echo $page_content; ?>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<div class="widget-area">
	<?php if(have_rows('videos')) : while(have_rows('videos')) : the_row(); 

	?>
	<div class="video">
		<?php 
		$vidTitle = get_sub_field('video_title');
		// get iframe HTML
		$iframe = get_sub_field('video');

		// use preg_match to find iframe src
		preg_match('/src="(.+?)"/', $iframe, $matches);
		$src = $matches[1];

		// add extra params to iframe src
		$params = array(
		    'controls'    => 0,
		    'hd'        => 1,
		    'autohide'    => 1
		);

		$new_src = add_query_arg($params, $src);

		$iframe = str_replace($src, $new_src, $iframe);

		// add extra attributes to iframe html
		$attributes = 'frameborder="0"';

		$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


		// echo $iframe
		echo $iframe;

		if($vidTitle != '') {
			echo '<h3>'.$vidTitle.'</h3>';
		}

		 ?>
	</div>
	<?php endwhile; endif; ?>
</div><!-- widget area -->


</div><!-- wrapper -->
<?php get_footer(); ?>

