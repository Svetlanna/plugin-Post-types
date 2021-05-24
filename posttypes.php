<?php
/**
 * @package CRRC
 */

/**
 * Plugin Name:Custom post Tyes selector
 * Plugin URI:#
 * Description: T
 * Version: 0.1
 * Author: Svetlana Sultqanyan
 * Author URI:#
 */

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}
include(plugin_dir_path( __FILE__ ) . 'includes/posttypes_post_types_parent.php');
include(plugin_dir_path( __FILE__ ) . 'includes/posttypes-Clubs.php');
add_role(
    'club', //  System name of the role.
    __( 'User Club'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => false,
        'delete_published_posts' => false,
        'edit_posts'   => false,
        'publish_posts' => false,
        'upload_files'  => false,
        'edit_pages'  => false,
        'edit_published_pages'  =>  false,
        'publish_pages'  => false,
        'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
    )
);
add_role(
    'trainer', //  System name of the role.
    __( 'trainer'  ), // Display name of the role.
    array(
        'read'  => true,
        'delete_posts'  => false,
        'delete_published_posts' => false,
        'edit_posts'   => false,
        'publish_posts' => false,
        'upload_files'  => false,
        'edit_pages'  => false,
        'edit_published_pages'  =>  false,
        'publish_pages'  => false,
        'delete_published_pages' => false, // This user will NOT be able to  delete published pages.
    )
);

/*include(plugin_dir_path( __FILE__ ) . 'includes/posttypes-fellowship.php');
include(plugin_dir_path( __FILE__ ) . 'includes/posttypes-Clubs.php');
include(plugin_dir_path( __FILE__ ) . 'includes/crrc_wsrc_Sponsors.php');
include(plugin_dir_path( __FILE__ ) . 'includes/crrc_wsrc_faq.php');

include(plugin_dir_path( __FILE__ ) . 'includes/crrc_wsrc_research.php');*/


/*include(plugin_dir_path(__FILE__).'includes/crrc_wsrc_caucasus-barometer.php');
include(plugin_dir_path( __FILE__ ) . 'includes/crrc_wsrc_people.php');
include(plugin_dir_path( __FILE__ ) . 'includes/crrc_wsrc_careers.php');*/




add_action('admin_enqueue_scripts', 'scripts_styles'); 
function scripts_styles() {
  wp_enqueue_style(  'mystyle', plugin_dir_url( __FILE__ ).'css/custom.css' );
  wp_enqueue_style(  'select2-style', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css');
  wp_enqueue_script(  'select2_script','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js' );
  wp_enqueue_script(  'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js' );
  wp_enqueue_script(  'crrc_scripts', plugin_dir_url( __FILE__ ) .'/js/scripts.js' );
  wp_enqueue_script(  'myscript', plugin_dir_url( __FILE__ ) .'/js/image-upload.js' );

}
