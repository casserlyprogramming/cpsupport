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

function ticket_add_sc($atts)
{
    $result = '';
    ob_start();
    
    // Get the lists of taxonomies...
    $types = get_terms('cp_ticket_types', array('hide_empty' => false));
    $products = get_terms('cp_support_product', array('hide_empty' => false));
    $statuses = get_terms('cp_ticket_status', array('hide_empty' => false));
    
    echo
    '<form method="POST" action="'. plugins_url( 'api/insert_ticket.php' , __FILE__ ) . '">
       <table> 
        <tr>
            <td>
            <label for="edTitle">Title</label>
            </td>
            <td>
            <input type="text" name="edTitle"/>
            </td>
        </tr>
        <tr>
            <td>
            <label for="edDetails">Details</label>
            </td>
            <td>
            <textarea rows="4" cols="50" name="edDetails"></textarea>
	</td>
        </tr>
        <tr>
            <td>
            <label for="edProduct">Product</label>
            </td>
            <td>
            <select name="edProduct">';
            
    foreach($products as $prod)
    {
        echo '<option value="' . $prod->slug . '">' . $prod->name . '</option>';
    }

    echo   '</select>
	</td>
        </tr>
        <tr>
            <td>
            <label for="edStatus">Status</label>
             </td>
            <td>
            <select name="edStatus">';
    foreach($statuses as $stat)
    {
        echo '<option value="' . $stat->slug . '">' . $stat->name . '</option>';
    }
    
    echo '</select>
	</td>
        </tr>
        <tr>
            <td>
            <label for="edType">Type</label>
             </td>
            <td>
            <select name="edType">';
    foreach($types as $typ)
    {
        echo '<option value="' . $typ->slug . '">' . $typ->name . '</option>';
    }
    echo '  </select>
	</td>
        </tr></table>
<input type="submit" value="Create Ticket"/>        
</form>';
    return $result;
}
add_shortcode('cp_ticket_add', 'ticket_add_sc');
?>
