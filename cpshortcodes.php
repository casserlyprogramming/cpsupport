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
 * This file creates shortcodes for the support plugin
 * These include:
 *      Showing Various Tickets (by the different types or products, ordered by status (descending)
 *      Form for creating a new ticket (have optional link in the above shortcode for this)
 *      
 */
function tickets_grid_sc($atts)
{
    ob_start();
    $result = '';
    // Get attributes from the parameters...
    $atts_arr = array(
        'cp_type' => '',
        'cp_product' => '',
        'ul_css_class' => '',
        'li_css_class' => '',
        'new_ticket_class' => '',
        'new_ticket_page' => '',
    );    
    extract(shortcode_atts($atts_arr, $atts));
    
    // Build the array...
    $query_arr = array(
        'post_type' => 'cp_ticket', 
        'cp_support_product' => $cp_product,
        'cp_ticket_types' => $cp_type
    );
    $query = new WP_Query($query_arr);
    
    if($new_ticket_page !== '' )
    {
        echo '<a href="' . $new_ticket_page . '" class="'. $new_ticket_class . '">Create a new ticket</a>';
    }
    echo '<ul class="' . $ul_css_class . '">';
    if($query-> have_posts())
    {
        while($query-> have_posts())
        {
            $query->the_post();
            echo '<li class="' . $li_css_class . '">';
            $title_before = '<p><a href="' . get_permalink() . '">';
            $title_after = '</a></p>';
            echo the_title($title_before, $title_after);
            echo '</li>';
        }
    }
    else
    {
        echo '<li class="' . $li_css_class . '">';
        echo '<p>There are no tickets to show</p>';
        echo '</li>';
    }
    return $result;
}
add_shortcode('cp_tickets_grid', 'tickets_grid_sc');

?>
