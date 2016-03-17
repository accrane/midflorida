<?php
/**
 * Template Name: Locations
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


<div class="location-col l-col-first  js-blocks">
	<h2>Borrow Pits</h2>
<?php

	// 
	// 		Borrow Pits
	//


	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'location',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'location_category', // your custom taxonomy
			'field' => 'term_id',
			'terms' => array( 5 ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); 

	$address = get_field('address');
	$desc = get_field('description');
?>	

	<div class="location-item wow zoomIn"  data-wow-duration=".5s">
		<h3><?php the_title(); ?></h3>
		<?php if($address != '') {
			echo '<div class="address">' . $address . '</div>';
		} ?>
		<?php if($address != '') {
			echo '<div class="entry-content">' . $desc . '</div>';
		} ?>
	</div><!-- locaiton item -->

<?php endwhile; endif; ?>
</div><!-- location-col -->



<div class="location-col l-col-first  js-blocks">
	<h2>Landfills</h2>
<?php

	// 
	// 		Landfills
	//


	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'location',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'location_category', // your custom taxonomy
			'field' => 'term_id',
			'terms' => array( 6 ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); 

	$address = get_field('address');
	$desc = get_field('description');
?>	

	<div class="location-item wow zoomIn"  data-wow-duration=".5s">
		<h3><?php the_title(); ?></h3>
		<?php if($address != '') {
			echo '<div class="address">' . $address . '</div>';
		} ?>
		<?php if($address != '') {
			echo '<div class="entry-content">' . $desc . '</div>';
		} ?>
	</div><!-- locaiton item -->

<?php endwhile; endif; ?>
</div><!-- location-col -->

<div class="location-col l-col-last js-blocks">
	<h2>Transfer Stations</h2>
<?php

	// 
	// 		Transfer Stations
	//


	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'location',
	'posts_per_page' => -1,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'location_category', // your custom taxonomy
			'field' => 'term_id',
			'terms' => array( 7 ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); 

	$address = get_field('address');
	$desc = get_field('description');
?>	

	<div class="location-item wow zoomIn"  data-wow-duration=".5s">
		<h3><?php the_title(); ?></h3>
		<?php if($address != '') {
			echo '<div class="address">' . $address . '</div>';
		} ?>
		<?php if($address != '') {
			echo '<div class="entry-content">' . $desc . '</div>';
		} ?>
	</div><!-- locaiton item -->

<?php endwhile; endif; ?>
</div><!-- location-col -->





		</main><!-- #main -->
	</div><!-- #primary -->




</div><!-- wrapper -->
<?php get_footer(); ?>

