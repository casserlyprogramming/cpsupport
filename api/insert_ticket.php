<?php

/*    ######   ########
 * #########   #########
 * ####        ####   ####
 * ####        #########   
 * ####        #######
 * ####        ####            
 * #########   ####
 *    ######   ####
 * 
 * 
 * This file creates a ticket on the system. Can only be used by a logged in 
 * user...
 *      
 */
/**
 * Checks if the current visitor is a logged in user.
 *
 * @since 2.0.0
 *
 * @return bool True if user is logged in, false if not logged in.
 */

if ( !function_exists('get_currentuserinfo') ) :
function get_currentuserinfo() {
	global $current_user;

	if ( ! empty( $current_user ) ) {
		if ( $current_user instanceof WP_User )
			return;

		// Upgrade stdClass to WP_User
		if ( is_object( $current_user ) && isset( $current_user->ID ) ) {
			$cur_id = $current_user->ID;
			$current_user = null;
			wp_set_current_user( $cur_id );
			return;
		}

		// $current_user has a junk value. Force to WP_User with ID 0.
		$current_user = null;
		wp_set_current_user( 0 );
		return false;
	}

	if ( defined('XMLRPC_REQUEST') && XMLRPC_REQUEST ) {
		wp_set_current_user( 0 );
		return false;
	}

	if ( ! $user = wp_validate_auth_cookie() ) {
		 if ( is_blog_admin() || is_network_admin() || empty( $_COOKIE[LOGGED_IN_COOKIE] ) || !$user = wp_validate_auth_cookie( $_COOKIE[LOGGED_IN_COOKIE], 'logged_in' ) ) {
		 	wp_set_current_user( 0 );
		 	return false;
		 }
	}

	wp_set_current_user( $user );
}
endif;



get_currentuserinfo();
if ( ! $user->exists() )
    die();

$this_user_id = $current_user->ID;
$tax_arr = array(
    'cp_ticket_status' => array( $_POST['edStatus'] ),
    'cp_ticket_types' => array( $_POST['edType'] ),
    'cp_support_product' => array( $_POST['edProduct'] )
);

// If we get here then the user is logged in and we have their id...
$new_post_arr = array(
    'comment_status' => 'open',
    'ping_status' => 'closed',
    'post_author' => $this_user_id,
    'post_content' => $_POST['edDetails'],
    'post_date' => get_the_date(),
    'post_name' => sanitize_title($_POST['edTitle']),
    'post_status' => 'publish',
    'post_title' => $_POST['edTitle'],
    'post_type' => 'cp_ticket',
    'tax_input' => $tax_arr
 );

 wp_insert_post($new_post_arr);
 
?>
