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
 * This file creates the needed taxonomies in the database. 
 * These include:
 * Ticket Statuses
 * Ticket Types (eg Bug/Feature or Support Ticket)
 */

// Status Taxonomy
function create_status_taxonomy()
{
    $labels = array(
        'name' => 'Ticket Statuses',
        'singular_name' => 'Ticket Status',
        'menu_name' => 'Statuses',
        'add_new_item' => 'Add New Status'        
    );
    $capabilities = array(
        'manage_terms',
        'edit_terms',
        'delete_terms',
        'assign_terms'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'capabilities' => $capabilities,
        
    );
    register_taxonomy('cp_ticket_status', 'cp_ticket', $args);    
}
add_action('init', 'create_status_taxonomy');

// Ticket Types
function create_type_taxonomy()
{
    $labels = array(
        'name' => 'Ticket Types',
        'singular_name' => 'Ticket Type',
        'menu_name' => 'Ticket Types',
        'add_new_item' => 'Add New Ticket Type'        
    );
    $capabilities = array(
        'manage_terms',
        'edit_terms',
        'delete_terms',
        'assign_terms'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'capabilities' => $capabilities,
        
    );
    register_taxonomy('cp_ticket_types', 'cp_ticket', $args); 
    
}
add_action('init', 'create_type_taxonomy');

// Product
function create_product_taxonomy()
{
    $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'menu_name' => 'Product',
        'add_new_item' => 'Add New Product'        
    );
    $capabilities = array(
        'manage_terms',
        'edit_terms',
        'delete_terms',
        'assign_terms'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_admin_column' => true,
        'capabilities' => $capabilities,
        
    );
    register_taxonomy('cp_product', 'cp_ticket', $args); 
    
}
add_action('init', 'create_product_taxonomy');

?>
