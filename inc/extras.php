<?php
// Extra functions of theme


/*
 * Add the post type 'portfolio_project'  in the Home
 * 
 */
add_filter( 'pre_get_posts', 'graph_home_posts' );

function graph_home_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'portfolio_project' ) );

	return $query;
}