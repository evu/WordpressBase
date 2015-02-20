<?php

//Remove unused admin sections, uncomment to remove this for relevant users
function remove_menus(){
	//Remove these pages for everyone

	//remove_menu_page( 'index.php' );							//Dashboard
	//remove_menu_page( 'edit.php' );						    //Posts
	//remove_menu_page( 'upload.php' );							//Media
	//remove_menu_page( 'edit.php?post_type=page' );			//Pages
	//remove_menu_page( 'edit-comments.php' );					//Comments
	//remove_menu_page( 'themes.php' );							//Appearance
	//remove_menu_page( 'plugins.php' );						//Plugins
	//remove_menu_page( 'users.php' );							//Users
	//remove_menu_page( 'tools.php' );							//Tools
	//remove_menu_page( 'options-general.php' );				//Settings
	//remove_menu_page( 'edit.php?post_type=acf' );				//ACF
	//remove_menu_page( 'admin.php?page=cpt_main_menu' );		//CPT UI

	$admins = array(
		'admin'
	);
	$current_user = wp_get_current_user();

	if (!in_array($current_user->user_login, $admins)) {
		remove_action( 'admin_notices', 'update_nag', 3 );

		//remove_menu_page( 'index.php' );							//Dashboard
		//remove_menu_page( 'update-core.php' );					//Dashboard
		//remove_menu_page( 'edit.php' );							//Posts
		//remove_menu_page( 'upload.php' );							//Media
		//remove_menu_page( 'edit.php?post_type=page' );			//Pages
		//remove_menu_page( 'edit-comments.php' );					//Comments
		//remove_menu_page( 'themes.php' );							//Appearance
		//remove_submenu_page( 'themes.php', 'widgets.php' )		//Appearence -> Widgets
		//remove_submenu_page( 'themes.php', 'customize.php' )		//Appearence -> Customise
		//remove_submenu_page( 'themes.php', 'therme-editor.php' )	//Appearence -> ThemeEditor
		//remove_menu_page( 'plugins.php' );						//Plugins
		//remove_menu_page( 'users.php' );							//Users
		//remove_menu_page( 'tools.php' );							//Tools
		//remove_menu_page( 'options-general.php' );				//Settings
		//remove_menu_page( 'edit.php?post_type=acf' );				//ACF
		//remove_menu_page( 'admin.php?page=cpt_main_menu' );		//CPT UI
	}

}
add_action('admin_menu', 'remove_menus');

//Remove Update notifications
function remove_core_updates()
{
	if( !current_user_can('update_core') ){
		return;
	}
	add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
	add_filter('pre_option_update_core','__return_null');
	add_filter('pre_site_transient_update_core','__return_null');
}
add_action('after_setup_theme','remove_core_updates');

//Remove plugin update notifications
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');