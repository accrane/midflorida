<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	   // Register the Homepage Slides
  
     $labels = array(
  'name' => _x('Slides', 'post type general name'),
    'singular_name' => _x('Slide', 'post type singular name'),
    'add_new' => _x('Add New', 'Slide'),
    'add_new_item' => __('Add New Slide'),
    'edit_item' => __('Edit Slide'),
    'new_item' => __('New Slide'),
    'view_item' => __('View Slide'),
    'search_items' => __('Search Slide'),
    'not_found' =>  __('No Slide found'),
    'not_found_in_trash' => __('No Slide found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Slides'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('slide',$args); // name used in query


	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Products', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add New', 'Product'),
    'add_new_item' => __('Add New Product'),
    'edit_item' => __('Edit Products'),
    'new_item' => __('New Product'),
    'view_item' => __('View Products'),
    'search_items' => __('Search Products'),
    'not_found' =>  __('No Products found'),
    'not_found_in_trash' => __('No Products found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Products'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('product',$args); // name used in query


    // Register the Homepage Slides
  
     $labels = array(
  'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New', 'Service'),
    'add_new_item' => __('Add New Service'),
    'edit_item' => __('Edit Services'),
    'new_item' => __('New Service'),
    'view_item' => __('View Service'),
    'search_items' => __('Search Service'),
    'not_found' =>  __('No Service found'),
    'not_found_in_trash' => __('No Service found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Service'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('service',$args); // name used in query


    // Register the Homepage Slides
  
     $labels = array(
  'name' => _x('Locations', 'post type general name'),
    'singular_name' => _x('Location', 'post type singular name'),
    'add_new' => _x('Add New', 'Location'),
    'add_new_item' => __('Add New Location'),
    'edit_item' => __('Edit Location'),
    'new_item' => __('New Location'),
    'view_item' => __('View Location'),
    'search_items' => __('Search Location'),
    'not_found' =>  __('No Location found'),
    'not_found_in_trash' => __('No Location found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Location'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('location',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type



/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'location_category', 'location',
   array( 
  'hierarchical' => true, // true = acts like categories false = acts like tags
  'label' => 'Category', 
  'query_var' => true, 
  'rewrite' => true ,
  'show_admin_column' => true,
  'public' => true,
  'rewrite' => array( 'slug' => 'location-category' ),
  '_builtin' => true
  ) );
  
} // End build taxonomies