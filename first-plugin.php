<?php
/*
Plugin Name: Webindia News
Description: This is a Webindia News plugin for WordPress.
Version: 1.0
Author: Janaki
*/
function wpmu_create_post_type() {
	$labels = array( 
		'name' => __( 'Webindia News', 'wpmu' ),
		'singular_name' => __( 'Project', 'wpmu' ),
		'add_new' => __( 'Add News', 'wpmu' ),
		'add_new_item' => __( 'Add Webindia News', 'wpmu' ),
		'edit_item' => __( 'Edit Project', 'wpmu' ),
		'new_item' => __( 'New Project', 'wpmu' ),
		'view_item' => __( 'View Project', 'wpmu' ),
		'search_items' => __( 'Search Projects', 'wpmu' ),
		'not_found' =>  __( 'No Projects Found', 'wpmu' ),
		'not_found_in_trash' => __( 'No Projects found in Trash', 'wpmu' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'projects' ),
		'supports' => array(
			'title', 
			'editor', 
			'excerpt', 
			'custom-fields', 
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array( 'post_tag', 'category'), 
	);
	register_post_type( 'project', $args );
} 
add_action( 'init', 'wpmu_create_post_type' );
function wpmu_flush_rewrite_rules() {
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'wpmu_flush_rewrite_rules' );