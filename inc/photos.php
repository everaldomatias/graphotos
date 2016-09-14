<?php
// Register Custom Post Type Photos
function photos_cpt() {

	$labels = array(
		'name'                  => _x( 'Photos', 'Post Type General Name', 'odin' ),
		'singular_name'         => _x( 'Photo', 'Post Type Singular Name', 'odin' ),
		'menu_name'             => __( 'Photos', 'odin' ),
		'name_admin_bar'        => __( 'Photo', 'odin' ),
		'archives'              => __( 'Item Archives', 'odin' ),
		'parent_item_colon'     => __( 'Parent Item:', 'odin' ),
		'all_items'             => __( 'All Items', 'odin' ),
		'add_new_item'          => __( 'Add New Item', 'odin' ),
		'add_new'               => __( 'Add New', 'odin' ),
		'new_item'              => __( 'New Item', 'odin' ),
		'edit_item'             => __( 'Edit Item', 'odin' ),
		'update_item'           => __( 'Update Item', 'odin' ),
		'view_item'             => __( 'View Item', 'odin' ),
		'search_items'          => __( 'Search Item', 'odin' ),
		'not_found'             => __( 'Not found', 'odin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'odin' ),
		'featured_image'        => __( 'Featured Image', 'odin' ),
		'set_featured_image'    => __( 'Set featured image', 'odin' ),
		'remove_featured_image' => __( 'Remove featured image', 'odin' ),
		'use_featured_image'    => __( 'Use as featured image', 'odin' ),
		'insert_into_item'      => __( 'Insert into item', 'odin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'odin' ),
		'items_list'            => __( 'Items list', 'odin' ),
		'items_list_navigation' => __( 'Items list navigation', 'odin' ),
		'filter_items_list'     => __( 'Filter items list', 'odin' ),
	);
	$args = array(
		'label'                 => __( 'Post Type', 'odin' ),
		'description'           => __( 'Post Type Description', 'odin' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-format-gallery',
	);
	register_post_type( 'photos', $args );

}
add_action( 'init', 'photos_cpt', 0 );

// Register metabox Gallery
function photos_metabox() {

    $photos_metabox = new Odin_Metabox(
        'photos', // Slug/ID of the Metabox (Required)
        'Photos Gallery', // Metabox name (Required)
        'photos', // Slug of Post Type (Optional)
        'normal', // Context (options: normal, advanced, or side) (Optional)
        'high' // Priority (options: high, core, default or low) (Optional)
    );

    $photos_metabox->set_fields(
        array(
            // Image Plupload field.
            array(
                'id'          => 'photos_plupload', // Required
                'label'       => __( 'Images of gallery', 'odin' ), // Required
                'type'        => 'image_plupload', // Required
                'description' => __( 'Add here the pictures of the gallery', 'odin' ), // Optional
            ),
        )
    );
}

add_action( 'init', 'photos_metabox', 1 );

// Functions of the Photos CPT

/*
 * Add image size to Photos
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'photos-thumb', 500, 500, true );
}