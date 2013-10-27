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
 * This file deals with creating the Custom Types for the plugin,
 * These include: 
 * Tickets
*/
function create_ticket_type()
{
    $labels_array = array(
        'name' => __('Tickets'),
        'singular_name' => __('Ticket'),
        'menu_name' => __('Tickets'),
        'search_items' => __('Tickets'),
        'not_found' => __('Ticket'),
        'add_new_item' => __('Add New Ticket'),        
    );
    
    $supports_array = array(
        'title',
        'editor',
        'author',
        'custom-fields',
        'comments'
    );
    $taxonomies = array(
        'cp_support_product',
        'cp_ticket_types',
        'cp_ticket_status'
    );
    $post_formats = array(
        'aside',
        'status',
        'chat'
    );
    $args = array(
        'label' => 'CP Tickets',
        'labels' => $labels_array,
        'description' => 'Tickets of any type that you need to keep track of',
        'public' => true,
        'menu_icon' => plugins_url( 'images/ticketicon16.png' , __FILE__ ),
        'supports' => $supports_array,
        'taxonomies' => $taxonomies,
        'rewrite' => false,
        'post-formats' => $post_formats,
    );
    register_post_type('cp_ticket', $args);
}
add_action('init', 'create_ticket_type');

// Adds the header image to the Tickets...
function plugin_header() {
        global $post_type;
    ?>
    <style>
    <?php if (($_GET['post_type'] == 'cp_ticket') || ($post_type == 'cp_ticket')) : ?>
    #icon-edit { background:transparent url('<?php echo plugins_url( 'images/ticketicon32.png' , __FILE__ );?>') no-repeat; }     
    <?php endif; ?>
        </style>
        <?php
}
add_action('admin_head', 'plugin_header');

?>
