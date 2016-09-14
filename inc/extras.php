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

/*
 * Verify and set the site by private
 * 
 */
function photos_redirect_private_site() {
    $isLoginPage = strpos( $_SERVER['REQUEST_URI'], "wp-login.php" ) !== false;
    if( ! is_user_logged_in() && ! is_admin() && ! $isLoginPage && true == get_theme_mod( 'private_site' ) ) {
    	$location = 'Location: '. wp_login_url();
        header( $location );
        die();
    }
}
add_action( 'init', 'photos_redirect_private_site' );
