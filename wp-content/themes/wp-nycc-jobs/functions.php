<?php

// Remove parent theme's admin pages, nav menus, and page tempaltes
require_once(get_template_directory().'/assets/functions/remove-in-child-theme.php');


// Jobs-specific functions
require_once(get_stylesheet_directory().'/functions/posts.php');          // Repurpose posts for Job Opportunities
require_once(get_stylesheet_directory().'/functions/widgets.php');        // Widgets
require_once(get_stylesheet_directory().'/functions/options.php');        // Options (front page content)


// Hide admin stuff
function remove_jobs_menus(){
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'plugins.php' );
  $page = remove_submenu_page( 'themes.php', 'widgets.php' );
  $page = remove_submenu_page( 'themes.php', 'nav-menus.php' );
  remove_menu_page( 'tools.php' );
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
}
add_action( 'admin_menu', 'remove_jobs_menus' );

// Remove admin bar links
function remove_jobs_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-user');
    $wp_admin_bar->remove_menu('new-post');
}
add_action( 'wp_before_admin_bar_render', 'remove_jobs_admin_bar_links' );

// Unregister widgets
function nycc_unregister_jobs_widgets() {
  unregister_widget('WP_Widget_Categories');
}
add_action('widgets_init', 'nycc_unregister_jobs_widgets', 11);