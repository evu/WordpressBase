<?php

//Remove unused admin sections, uncomment to remove this for relevant users
function remove_menus(){

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
	//remove_menu_page( 'edit.php?post_type=acf' );		//ACF
	//remove_menu_page( 'cptui_main_menu' );			//CPT UI

	$admins = array(
		'admin'
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
		//remove_menu_page( 'edit-comments.php' );									//Comments
		//remove_menu_page( 'themes.php' );											//Appearance
		//remove_submenu_page( 'themes.php', 'widgets.php' );						//Appearance -> Widgets
		//remove_submenu_page( 'themes.php', 'customize.php' );						//Appearance -> Customise
		//remove_submenu_page( 'themes.php', 'theme-editor.php' );					//Appearance -> ThemeEditor
		//remove_menu_page( 'plugins.php' );										//Plugins
		//remove_menu_page( 'users.php' );											//Users
		//remove_menu_page( 'tools.php' );											//Tools
		//remove_submenu_page( 'tools.php', 'import.php' );							//Tools -> Import
		//remove_submenu_page( 'tools.php', 'export.php' );							//Tools -> Export
		//remove_menu_page( 'options-general.php' );								//Settings
		//remove_submenu_page( 'options-general.php', 'options-writing.php' );		//Settings -> Writing
		//remove_submenu_page( 'options-general.php', 'options-reading.php' );		//Settings -> Reading
		//remove_submenu_page( 'options-general.php', 'options-discussion.php' );	//Settings -> Discussion
		//remove_submenu_page( 'options-general.php', 'options-media.php' );		//Settings -> Media
		//remove_submenu_page( 'options-general.php', 'options-permalink.php' );	//Settings -> Permalink
		//remove_menu_page( 'edit.php?post_type=acf' );								//ACF
		//remove_menu_page( 'cptui_main_menu' );									//CPT UI
	}

}
add_action('admin_menu', 'remove_menus', 999);