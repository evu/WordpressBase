<?php

//Include required scripts and styles
function ahoy_enquire() {

	// Libs
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/libs/modernizr.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'velocity', get_template_directory_uri() . '/assets/js/libs/velocity.min.js', false, false, true);
	
	// Theme
	wp_enqueue_style('site-styles', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_script('site-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), false, true);
}
add_action('wp_enqueue_scripts', 'ahoy_enquire');


//Function run on theme activation
function ahoy_init() {
	//Register navigation menus
	/*register_nav_menus(
		array(
			'header-menu-left' 	=> 'Main Menu Left',
			'header-menu-right' => 'Main Menu Right',
			'footer-bottom' 	=> 'Footer Bottom'
		)
	);*/

	// Remove unwanted things
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');

	// Remove word press version number from theme
	remove_action('wp_head', 'wp_generator');
	
	// Remove Emoji Detection
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	//Register theme supports
	add_theme_support('post-thumbnails');
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	//Customise post type support
	/*
	add_post_type_support('post', 'excerpt');
	remove_post_type_support('post', 'custom-fields');
	remove_post_type_support('post', 'page-attributes');
	*/

	//Add image sizes
	/*add_image_size('archive-thumb', 500, 250, true);*/
}
add_action('init', 'ahoy_init');

//Add class to menu parent items
function add_menu_parent_class($items) {
	$parents = array();
	foreach ($items as $item) {
		if ($item->menu_item_parent && $item->menu_item_parent > 0) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ($items as $item) {
		if (in_array($item->ID, $parents)) {
			$item->classes[] = 'menu-parent-item';
		}
	}
	return $items;
}
add_filter('wp_nav_menu_objects', 'add_menu_parent_class');

//Add class menu to current menu item
function add_current_nav_class($classes, $item) {
	// Getting the current post details
	global $post;

	if( !isset($post) )
		return $classes;

	// Getting the post type of the current post
	$current_post_type = get_post_type_object(get_post_type($post->ID));
	//If not in a post type get the hell out of here
	if( !is_array( $current_post_type_slug = $current_post_type->rewrite ) ){
		return $classes;
	}
	$current_post_type_slug = $current_post_type->rewrite['slug'];

	// Getting the URL of the menu item
	$menu_slug = strtolower(trim($item->url));

	// If the menu item URL contains the current post types slug add the current-menu-item class
	if (strpos($menu_slug,$current_post_type_slug) !== false) {
		$classes[] = 'current-menu-item';
	}

	// Return the corrected set of classes to be added to the menu item
	return $classes;
}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
