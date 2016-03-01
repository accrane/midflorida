<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">

			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </div>
	        <?php } ?>

	        <div class="header-right-info">

		        <div class="phone">
		        	<?php the_field('phone', 'option'); ?>
		        </div>

		        <nav id="quicknav">
		        	<?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?>
		        </nav>

				<div class="hours-of-operation">
		        	<div class="left">Hours of Operation</div>
		        	<div class="right">
		        		<?php if(have_rows('hours', 'option')) : while(have_rows('hours', 'option')) : the_row(); 

		        		$day = get_sub_field('Day', 'option');
		        		$hour = get_sub_field('hour', 'option');

		        		?>
		        		<div class="day-row">
		        			<div class="day"><?php echo $day; ?></div>
		        			<div class="hour"><?php echo $hour; ?></div>
		        		</div>

		        	<?php endwhile; endif; ?>
		        	</div><!-- right -->
		        </div><!-- hours-of-operation -->

		    </div><!-- header right -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
	</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
