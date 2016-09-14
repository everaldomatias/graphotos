<?php
// Extra functions of theme


/*
 * Set the post type 'photos' in the Home
 * 
 */
add_filter( 'pre_get_posts', 'photos_home_posts' );

function photos_home_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'photos' ) );

	return $query;
}