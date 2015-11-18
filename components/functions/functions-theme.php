<?php


// ======================= !ENQUE-SCRIPTS

//Include required scripts and styles
function setup_scripts() {

	$assets = array(
		'libs' => get_template_directory_uri() . '/assets/js/libs/',
		'js' => get_template_directory_uri() . '/assets/js/',
		'css' => get_template_directory_uri() . '/assets/css/'
	);

	// Libs
	wp_enqueue_script( 'modernizr', $assets['libs'] . 'modernizr.js');
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'velocity', $assets['libs'] . 'velocity.min.js', 'jquery', false, true);
	wp_enqueue_script( 'validate', $assets['libs'] . 'jquery.validate.js', 'jquery', false, true);
	
	// Theme
	wp_enqueue_style('site-styles', $assets['css'] . 'css/main.css');
	wp_enqueue_script('site-utils', $assets['js'] . 'utils.js', array( 'jquery' ));
	wp_enqueue_script('site-scripts', $assets['js'] . 'main.js', array( 'jquery' ), false, true);


	// Localize site directory data and nonces to javascript
	$WP = array(
		'template_dir' 	=> get_template_directory_uri(),
		'base_dir' 		=> get_site_url(),

		'email_nonce'	=> wp_create_nonce( "contact-email-ajax-nonce" ),
		'social_nonce'	=> wp_create_nonce( "load-social-ajax-nonce" )
	);
	wp_localize_script( 'site-scripts', 'WP', $WP );


}
add_action('wp_enqueue_scripts', 'setup_scripts');





//Function run on theme activation
function setup_theme() {


	//Register navigation menus
	register_nav_menus(
		array(
			'main-nav' 	=> 'Main Navigation Menu',
		)
	);
	

	//Add image sizes (name, width, height, crop)
	add_image_size('archive-thumb', 500, 250, true);
}
add_action('init', 'setup_theme');



if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
	acf_add_options_sub_page('Site Settings');
}




// =============== !POST-TYPES

    if ( ! function_exists('pt_custom_posts') ) {
        
        function pt_custom_posts() {
            $labels = array(
                'name'                => 'Custom Posts',                        
                'singular_name'       => 'Custom Post',                         
                'menu_name'           => 'Custom Posts',                        
                'parent_item_colon'   => 'Custom Posts',                        
                'all_items'           => 'All Custom Posts',                    
                'view_item'           => 'View Custom Post',                    
                'add_new_item'        => 'Add New Custom Post',                 
                'add_new'             => 'Add New',
                'edit_item'           => 'Edit Custom Post',                    
                'update_item'         => 'Update Custom Post',                  
                'search_items'        => 'Search Custom Posts',                 
                'not_found'           => 'Not found',
                'not_found_in_trash'  => 'Not found in Trash',
            );
            $args = array(
                'label'               => 'custom-posts',                         
                'description'         => 'For New and Previous Custom Posts',    
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
                'hierarchical'        => false,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                //'rewrite' => array( 'slug' => '/custom-post'),                  
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 7,
                'menu_icon'           => 'dashicons-store',         			
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => true,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
            );
            register_post_type( 'custom-posts', $args );                         
        }
        add_action( 'init', 'pt_custom_posts', 0 );
    }

// ====================




// =============== !TAXONOMIES


    function tax_custom_taxonomy() {
	    $labels = array(
	        'name'                       => 'Custom Taxonomy',
	        'singular_name'              => 'Custom Taxonomy',
	        'menu_name'                  => 'Custom Taxonomy',
	        'all_items'                  => 'All Items',
	        'parent_item'                => 'Parent Item',
	        'parent_item_colon'          => 'Parent Item:',
	        'new_item_name'              => 'New Custom Taxonomy',
	        'add_new_item'               => 'Add New Item',
	        'edit_item'                  => 'Edit Item',
	        'update_item'                => 'Update Item',
	        'separate_items_with_commas' => 'Separate items with commas',
	        'search_items'               => 'Search Items',
	        'add_or_remove_items'        => 'Add or remove items',
	        'choose_from_most_used'      => 'Choose from the most used items',
	        'not_found'                  => 'Not Found',
	    );
	    $args = array(
	        'labels'                     => $labels,
	        'hierarchical'               => false,
	        'public'                     => true,
	        'show_ui'                    => true,
	        'show_admin_column'          => true,
	        'show_in_nav_menus'          => true,
	        'show_tagcloud'              => true,
	    );
	    register_taxonomy( 'custom-taxonomy', array( 'custom-posts' ), $args );
	}
	add_action( 'init', 'tax_custom_taxonomy', 0 );

// ====================