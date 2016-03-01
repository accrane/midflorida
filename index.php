<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="">
		<main id="main" class="site-main" role="main">
<div class="wrapper">
	<div class="homeslider">
		<?php 
		// Query the Post type Slides
		$querySlides = array(
			'post_type' => 'page',
			'page_id' => '61'
		);
		// The Query
		$the_query = new WP_Query( $querySlides );
		?>
		<?php 
		// The Loop
		 if ( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); 

		 if(have_rows('slides')) : ?>
		 
		<div id="slider" class="flexslider">
		        <ul class="slides">
		        <?php while(have_rows('slides')) : the_row(); ?>
					<?php 
				// Get field Name
				$image = get_sub_field('image'); 
				$slideTitle = get_sub_field('title'); 
				$subText = get_sub_field('subtext'); 
				$link = get_sub_field('link'); 
				$url = $image['url'];
				$title = $image['title'];
				$alt = $image['alt'];
				$caption = $image['caption'];
			 	$size = 'large';
			 	$thumbnail = 'thumbnail';
				$thumb = $image['sizes'][ $thumbnail ];
				$largeImage = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
		?>

					<li data-thumb="<?php echo $thumb; ?>">
						<?php if( $link != '' ) {echo '<a href="'.$link.'">';} ?>
							<div class="slidetext">
								<h2><?php echo $slideTitle; ?></h2>
								<p><?php echo $subText; ?></p>
							</div>
				      	<img src="<?php echo $largeImage; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
				    	<?php if( $link != '' ) {echo '</a>';} ?>
				    </li>
		           
		            
		           <?php endwhile; ?>
		      	 </ul><!-- slides -->
		</div><!-- .flexslider -->
		<?php 
		endif; // end repeater
		endwhile; endif; // end page query 
		wp_reset_query();
		?>

		

	</div><!-- homeslider -->
</div><!-- wrapper -->

<section class="blue home-blue">
	<div class="wrapper">

		<div class="home-news  wow zoomIn" data-wow-duration=".5s">
			<h3>News</h3>
			<?php 
			// Query News
			$querySlides = array(
				'post_type' => 'post',
				'posts_per_page' => '2'
			);
			// The Query
			$the_query = new WP_Query( $querySlides );
			?>
			<?php 
			// The Loop
			 if ( $the_query->have_posts()) : while ( $the_query->have_posts()) : $the_query->the_post(); ?>

			 	<article class="white-box"  >
			 		<h3><?php the_title(); ?></h3>
			 		<p><?php echo home_excerpt(20); ?></p>
			 		<div class="readmore">
			 			<a href="<?php the_permalink(); ?>">READ MORE</a>
			 		</div>
			 	</article>

			<?php endwhile; endif; ?>
		</div><!-- homenews -->
<?php 
// Query Homepage
$querySlides = array(
	'post_type' => 'page',
	'page_id' => '61'
);
// The Query
$the_query = new WP_Query( $querySlides );
?>
<?php  
// The Loop
if ( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


		<div class="home-help wow zoomIn" data-wow-duration=".5s">
			
			




<?php if( have_rows('how_can_we_help') ): ?>
 
        <h3>How Can We Help</h3>
 
            <?php while ( have_rows('how_can_we_help') ) : the_row(); 

            	$linkText = get_sub_field('link_text');
            	$pageLink = get_sub_field('page_link');

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
			 			<a href="<?php echo $pageLink->permalink; ?>">READ MORE</a>
			 		</div>
			 	</article>

 		<?php endwhile; ?>
 	<?php endif; ?>

				
		 	
		</div><!-- home help -->


		

	</div><!-- wrapper -->
</section>

<div class="home-logos">
	<?php if( have_rows('logos') ): ?>



    <?php while ( have_rows('logos') ) : the_row(); 

    	$image = get_sub_field('logo_image');
    	$logoLink = get_sub_field('logo_link');
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 	$size = 'large';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
    ?>   

        <div class="home-logo wow zoomIn " data-wow-duration=".5s">
	 		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
	 	</div>

	<?php endwhile; ?>
<?php endif; ?>
</div><!-- home logos -->

<?php endwhile; endif; // end page query ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
