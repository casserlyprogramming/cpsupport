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
 * This file adds custom fields (ie meta fields) for all different types
 * These include:
 *    Taxonomies: 
 *       Status-Priority
 *       Status-IsClosed
 *       Software-Current Version
 */

// Add Status Page
function add_status_custom_fields() {
	// This will add the Priority to the "add new" form...
	?>
	<div class="form-field">
		<label for="term_meta[status_priority]">Priority</label>
                <select name="term_meta[status_priority]">
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
		<p class="description">What priority should this Status Take?</p>
	</div>
        <div class="form-field">
            <label for="term_meta[status_isclosed]">Is Closed?</label>
                <select name="term_meta[status_isclosed]">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
		<p class="description">Does this signify that the Status is Closed?</p>           		    
	</div>
<?php
}
add_action( 'cp_ticket_status_add_form_fields', 'add_status_custom_fields');

// Edit term page
function edit_status_custom_fields($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "status_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[status_priority]">Priority</label></th>
		<td>
                <select name="term_meta[status_priority]">
                    <option value="High" <?php echo esc_attr( $term_meta['status_priority']) == 'High' ? 'selected' : '' ?>>High</option>
                    <option value="Medium" <?php echo esc_attr( $term_meta['status_priority']) == 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="Low" <?php echo esc_attr( $term_meta['status_priority']) == 'Low' ? 'selected' : '' ?>>Low</option>
                </select>
		<p class="description">What priority should this Status Take?</p>
		</td>
	</tr>
        <tr class="form-field">            
            <th scope="row" valign="top">                
              <label for="term_meta[status_isclosed]">Is Closed?</label>
            </th>
            <td>
                <select name="term_meta[status_isclosed]">
                    <option value="Yes" <?php echo esc_attr( $term_meta['status_isclosed']) == 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="No" <?php echo esc_attr( $term_meta['status_isclosed']) == 'No' ? 'selected' : '' ?>>No</option>
                </select>
                <p class="description">Does this signify that the Status is Closed?</p>
            </td>
        </tr>
<?php
}
add_action( 'cp_ticket_status_edit_form_fields', 'edit_status_custom_fields');

// Save the Status fields....
function save_status_fields( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "status_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "status_$t_id", $term_meta );
	}
}  
add_action( 'edited_cp_ticket_status', 'save_status_fields');  
add_action( 'create_cp_ticket_status', 'save_status_fields');
?>
