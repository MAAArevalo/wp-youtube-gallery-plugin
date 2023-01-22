<?php
/**
 * @package YoutubeGalleryPlugin
 */
/*
Plugin Name:  Youtube Gallery Playlist
Plugin URI:   https://aarevalo.com
Description:  A Gallery of Youtube Playlist 
Version:      1.0
Author:       MAAArevalo
Author URI:   https://aarevalo.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  youtube-gallery-playlist
Domain Path:  /languages
*/

if(!defined('ABSPATH')){
    die;
}

class YoutubeGalleryPlugin{
    function __construct(){
        add_action('init', array($this, 'custom_post_type'));
    }

    function activate(){
        //
     
        flush_rewrite_rules();
    }

    function deactivate(){
        //
    }

    function uninstall(){
        //
    }

    function custom_post_type(){
        $labels = array(
            'name'                  => _x( 'Youtube Videos', 'Post type general name', 'Youtube Video' ),
            'singular_name'         => _x( 'Youtube Video', 'Post type singular name', 'Youtube Video' ),
            'menu_name'             => _x( 'Youtube Videos', 'Admin Menu text', 'Youtube Video' ),
            'name_admin_bar'        => _x( 'Youtube Video', 'Add New on Toolbar', 'Youtube Video' ),
            'add_new'               => __( 'Add New', 'Youtube Video' ),
            'add_new_item'          => __( 'Add New Youtube Video', 'Youtube Video' ),
            'new_item'              => __( 'New Youtube Video', 'Youtube Video' ),
            'edit_item'             => __( 'Edit Youtube Video', 'Youtube Video' ),
            'view_item'             => __( 'View Youtube Video', 'Youtube Video' ),
            'all_items'             => __( 'All Youtube Videos', 'Youtube Video' ),
            'search_items'          => __( 'Search Youtube Videos', 'Youtube Video' ),
            'parent_item_colon'     => __( 'Parent Youtube Videos:', 'Youtube Video' ),
            'not_found'             => __( 'No Youtube Videos found.', 'Youtube Video' ),
            'not_found_in_trash'    => __( 'No Youtube Videos found in Trash.', 'Youtube Video' ),
            'featured_image'        => _x( 'Youtube Video Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'Youtube Video' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'Youtube Video' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'Youtube Video' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'Youtube Video' ),
            'archives'              => _x( 'Youtube Video archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'Youtube Video' ),
            'insert_into_item'      => _x( 'Insert into Youtube Video', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'Youtube Video' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Youtube Video', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'Youtube Video' ),
            'filter_items_list'     => _x( 'Filter Youtube Videos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'Youtube Video' ),
            'items_list_navigation' => _x( 'Youtube Videos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'Youtube Video' ),
            'items_list'            => _x( 'Youtube Videos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'Youtube Video' ),
        );     
        $args = array(
            'labels'             => $labels,
            'description'        => 'Youtube Video custom post type.',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'youtube-videos' ),
            'capability_type'    => 'post',
            'capabilities' => array(
                'create_posts' => 'do_not_allow', // Removes support for the "Add New" function, including Super Admin's
              ),
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
            'taxonomies'         => array( 'category', 'post_tag' ),
            'show_in_rest'       => true
        );
         
        register_post_type( 'Youtube Video', $args );
    }
}

if(class_exists('YoutubeGalleryPlugin')){
    $youtubeGalleryPlugin = new YoutubeGalleryPlugin();
}

//activation
register_activation_hook(__FILE__, array($youtubeGalleryPlugin, 'activate'));

//deactivate
register_deactivation_hook(__FILE__, array($youtubeGalleryPlugin, 'deactivate'));
