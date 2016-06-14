<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
// Add the Meta Box  
function virtarich_add_filter() {  
	add_meta_box(  
		'harga_meta_box', 
		'Virtarich Filter Harga',
		'virtarich_show_filter', 
		'page',  
		'normal', 
		'high'); 
}  
add_action('add_meta_boxes', 'virtarich_add_filter');
    $prefix = 'custom_';  
    $custom_meta_fields2 = array(  			
		array(  
            'label'=> 'Harga Min',  
            'desc'  => 'Tulis Harga MIN Produk anda tanpa Rp , tanpa titik , tanpa koma , hanya angka , contoh : 50000',  
            'id'    => 'harga_min',  
            'type'  => 'text'  
        ),  
		array(  
            'label'=> 'Harga Max',  
            'desc'  => 'Tulis Harga MAX tanpa Rp , tanpa titik , tanpa koma , hanya angka , contoh : 100000',  
            'id'    => 'harga_max',  
            'type'  => 'text'  
        )			
    );  
	    // The Callback  
function virtarich_show_filter() {  
    global $custom_meta_fields2, $post;  
    // Use nonce for verification  
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
        // Begin the field table and loop  
        echo '<table class="form-table">';  
        foreach ($custom_meta_fields2 as $field) {  
            // get value of this field if it exists for this post  
            $meta = get_post_meta($post->ID, $field['id'], true);  
            // begin a table row with  
            echo '<tr> 
                    <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                    <td>';  
                    switch($field['type']) {  
    // text  
    case 'text':  
        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
            <br /><span class="description">'.$field['desc'].'</span>';  
    break;  
	    // textarea  
    case 'textarea':  
        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
            <br /><span class="description">'.$field['desc'].'</span>';  
    break;  
	    // checkbox  
    case 'checkbox':  
        echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
            <label for="'.$field['id'].'">'.$field['desc'].'</label>';  
    break;  
	
	    // select  
    case 'select':  
        echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
        foreach ($field['options'] as $option) {  
            echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
        }  
        echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
    break;  
                    } //end switch  
            echo '</td></tr>';  
        } // end foreach  
        echo '</table>'; // end table  
}  


// Save the Data  
function virtarich_save_filter($post_id) {  
        global $custom_meta_fields2;  
		if ( !isset($_POST['custom_meta_box_nonce']) ) {

	    return $post_id;

		}

        // verify nonce  
        if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
            return $post_id;  
        // check autosave  
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
            return $post_id;  
        // check permissions  
        if ('page' == $_POST['post_type']) {  
            if (!current_user_can('edit_page', $post_id))  
                return $post_id;  
            } elseif (!current_user_can('edit_post', $post_id)) {  
                return $post_id;  
        }  
 // loop through fields and save the data  
    foreach ($custom_meta_fields2 as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'virtarich_save_filter');


function virtarich_filter_produk() {	
	global $post;
	$args = array(
		'meta_key'   => 'harga',
		'orderby'    => 'meta_value',
		'order'      => 'ASC',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key'     => 'habis',
				'compare' => 'NOT EXISTS',
			),
			array(
				'key'     => 'harga',
				'value' => array(get_post_meta($post->ID, "harga_min", $single = true),get_post_meta($post->ID, "harga_max", $single = true)),
				'type'    => 'numeric',
				'compare' => 'BETWEEN',
			)
		),
		);
	$vtr_query = new WP_Query( $args);
	if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post();
	get_template_part( 'thumb' ); 
	endwhile; 
	wp_reset_postdata(); 
	else : endif;
}
function virtarich_list_produk_sale() {	
		global $post;
		$args = array(
			'meta_key'   => 'label',
			'orderby'    => 'meta_value',
			'order'      => 'ASC',
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => 'habis',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'     => 'label',
					'value'   => 'sale',
					'compare' => 'LIKE',
				)
			),
		);
		$vtr_query = new WP_Query( $args);
		if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post();
		get_template_part( 'thumb' );
		endwhile; 
		wp_reset_postdata(); 
		else : endif;
}


function virtarich_list_produk_bestseller() {	
		global $post;
		$args = array(
			'meta_key'   => 'label',
			'orderby'    => 'meta_value',
			'order'      => 'ASC',
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key'     => 'habis',
					'compare' => 'NOT EXISTS',
				),
				array(
					'key'     => 'label',
					'value'   => 'best',
					'compare' => 'LIKE',
				)
			),
		);
		$vtr_query = new WP_Query( $args);
		if ( $vtr_query->have_posts() ):  while( $vtr_query->have_posts() ) : $vtr_query->the_post();
		get_template_part( 'thumb' );
		endwhile; 
		wp_reset_postdata(); 
		else : endif;
}