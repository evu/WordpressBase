<?php

//Remove unused admin sections, uncomment to remove this for relevant users
function remove_menus(){

	// ======== Removes Items for all accounts

	//remove_menu_page( 'index.php' );					//Dashboard
	//remove_menu_page( 'edit.php' );					//Posts
	//remove_menu_page( 'upload.php' );					//Media
	//remove_menu_page( 'edit.php?post_type=page' );	//Pages
	//remove_menu_page( 'edit-comments.php' );			//Comments
	//remove_menu_page( 'themes.php' );					//Appearance
	//remove_menu_page( 'plugins.php' );				//Plugins
	//remove_menu_page( 'users.php' );					//Users
	//remove_menu_page( 'tools.php' );					//Tools
	//remove_menu_page( 'options-general.php' );		//Settings


	// ======== Removes Items for all accounts except those listed below
	$admins = array(
		'admin',
		'ahoycreative'
	);

	$current_user = wp_get_current_user();

	if (!in_array($current_user->user_login, $admins)) {
		//Hide update notices
		remove_action( 'admin_notices', 'update_nag', 3 );

		//remove_menu_page( 'index.php' );											//Dashboard
		//remove_menu_page( 'update-core.php' );									//Update
		//remove_submenu_page( 'index.php', 'update-core.php' );					//Update //TODO see which one is which
		//remove_menu_page( 'edit.php' );											//Posts
		//remove_menu_page( 'upload.php' );											//Media
		//remove_menu_page( 'edit.php?post_type=page' );							//Pages
		remove_menu_page( 'edit-comments.php' );									//Comments
		remove_menu_page( 'themes.php' );											//Appearance
		//remove_submenu_page( 'themes.php', 'widgets.php' );						//Appearance -> Widgets
		//remove_submenu_page( 'themes.php', 'customize.php' );						//Appearance -> Customise
		//remove_submenu_page( 'themes.php', 'theme-editor.php' );					//Appearance -> ThemeEditor
		//remove_menu_page( 'plugins.php' );										//Plugins
		//remove_menu_page( 'users.php' );											//Users
		//remove_menu_page( 'tools.php' );											//Tools
		//remove_submenu_page( 'tools.php', 'import.php' );							//Tools -> Import
		//remove_submenu_page( 'tools.php', 'export.php' );							//Tools -> Export
		remove_menu_page( 'options-general.php' );								//Settings
		//remove_submenu_page( 'options-general.php', 'options-writing.php' );		//Settings -> Writing
		//remove_submenu_page( 'options-general.php', 'options-reading.php' );		//Settings -> Reading
		//remove_submenu_page( 'options-general.php', 'options-discussion.php' );	//Settings -> Discussion
		//remove_submenu_page( 'options-general.php', 'options-media.php' );		//Settings -> Media
		//remove_submenu_page( 'options-general.php', 'options-permalink.php' );	//Settings -> Permalink
		remove_menu_page( 'edit.php?post_type=acf' );								//ACF
	}

}
add_action('admin_menu', 'remove_menus', 999);




// Change dropdown menus on admin bar.
function modify_wp_nodes() {
    global $wp_admin_bar;   
    //$wp_admin_bar->remove_node( 'new-content' );
    //$wp_admin_bar->remove_node( 'edit' );
    $wp_admin_bar->remove_node( 'comments' );
    //$wp_admin_bar->remove_node( 'new-post' );
    //$wp_admin_bar->remove_node( 'new-page' );
    $wp_admin_bar->remove_node( 'new-media' );
    $wp_admin_bar->remove_node( 'new-user' );
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'search' );
    $wp_admin_bar->remove_node( 'customize' );

    // $new_content_node = $wp_admin_bar->get_node('new-content');

    // $new_content_node->href = admin_url( 'post-new.php?post_type=page');

    // $wp_admin_bar->add_node($new_content_node);
}
add_action( 'admin_bar_menu', 'modify_wp_nodes', 999 );




// remove screen-options/tabs from admin screens
function theme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter('screen_options_show_screen', '__return_false');
add_filter( 'contextual_help', 'theme_remove_help_tabs', 999, 3 );




// Add admin theme CSS to admin UI
function theme_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/css/admin-editor-style.css' );
}
add_action( 'admin_init', 'theme_editor_styles' );