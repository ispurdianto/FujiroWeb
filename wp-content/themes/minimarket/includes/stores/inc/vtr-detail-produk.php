<?php
/* VIRTACART
Add Meta Box at single post
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit; 
function virtarich_add_detail_produk() {  
        add_meta_box(  
            'custom_meta_box', 
            'Virtarich Detail Produk', 
            'virtarich_tampil_detail_produk',  
            'post',  
            'normal',
            'high');
    }  
add_action('add_meta_boxes', 'virtarich_add_detail_produk');   

$prefix = 'custom_';  
$custom_meta_fields = array(  
	// tabs 1
	'tabs1' => array(
				  
					 array(  
						  'vtr-label'=> 'Produk Habis ?',  
						  'desc'  => 'centang , jika produk ini habis', 
						  'info'  => 'fungsi ini akan mendisable tombol beli untuk produk ini',  
						  'id'    => 'habis',
						  'type'  => 'checkbox'  
					  ), 
					  array(  
						  'vtr-label'=> 'Produk Dropship ?',  
						  'desc'  => 'centang , jika produk dropship',
						  'info'  => 'jika di centang produk ini hanya bisa di order via sms saja',  
						  'id'    => 'dropship',
						  'type'  => 'checkbox'  
					  ), 
					  array(  
						  'vtr-label'=> 'Stok Barang',  
						  'desc'  => 'contoh : Ready , Kosong, Habis, 10 pcs',  
						  'id'    => 'stok',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Kode Produk',  
						  'desc'  => '',  
						  'id'    => 'kode',  
						  'type'  => 'text'  
					  ),  
					  array(  
						  'vtr-label'=> 'Label',  
						  'desc'  => 'pilih , jika anda ingin memberikan label tertentu pada produk',  
						  'id'    => 'label',  
						  'type'  => 'select' ,
						   'options' => array (  
						  'one' => array (  
							  'label' => '-',  
							  'value' => ''  
						  ),  
						  'two' => array (  
							  'label' => 'Sale',  
							  'value' => 'sale'  
						  ),  
						  'three' => array (  
							  'label' => 'Best Seller',  
							  'value' => 'best'  
						  ),
						  'four' => array (  
							  'label' => 'NEW',  
							  'value' => 'new'  
						  ),
						  'five' => array (  
							  'label' => 'Limited',  
							  'value' => 'limited'  
						  )
					  )   
					  ),  
						  
					  array(  
						  'vtr-label'=> 'Harga Produk',  
						  'desc'  => '',  
						  'id'    => 'harga',  
						  'type'  => 'text'  
					  ),  
					  array(  
						  'vtr-label'=> 'Harga Diskon',  
						  'desc'  => '',  
						  'id'    => 'harga_diskon',  
						  'type'  => 'text'  
					  ),  		
					  array(  
						  'vtr-label'=> 'Berat barang',  
						  'desc'  => 'satuan KG , tulis berat barang , contoh : 0.5',  
						  'id'    => 'berat',  
						  'type'  => 'text'  
					  ), 	
			 ),
											 
	// tabs 2										 
	'tabs2' => array(
					array(  
						  'vtr-label'=> 'Tampilkan Pilihan Produk',  
						  'desc'  => 'centang , jika anda ingin menampilkan pilihan', 
						  'info'  => 'contoh size S ,M ,L , XL',  
						  'id'    => 'pilihan',  
						  'type'  => 'checkbox'  
					  ),
					  array(  
						  'vtr-label'=> 'Pilihan 1',  
						  'desc'  => '',  
						  'id'    => 'pilihan1',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Harga Pilihan 1',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan1',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Pilihan 2',  
						  'desc'  => '',  
						  'id'    => 'pilihan2',  
						  'type'  => 'text'  
					  ), 
					  
					  array(  
						  'vtr-label'=> 'Harga Pilihan 2',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan2',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Pilihan 3',  
						  'desc'  => '',  
						  'id'    => 'pilihan3',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Harga Pilihan 3',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan3',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'Pilihan 4',  
						  'desc'  => '',  
						  'id'    => 'pilihan4',  
						  'type'  => 'text'  
					  ), 		
					  array(  
						  'vtr-label'=> 'Harga Pilihan 4',  
						  'desc'  => '',  
						  'id'    => 'harga_pilihan4',  
						  'type'  => 'text'  
					  ), 	
			  
					  array(  
						  'vtr-label'=> 'Pilihan 5',  
						  'desc'  => '',  
						  'id'    => 'pilihan5',  
						  'type'  => 'text'  
					  ), 		
					  array(  
						  'vtr-label'=> 'Harga Pilihan 5',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan5',  
						  'type'  => 'text'  
					  ),
					  array(  
						  'vtr-label'=> 'Pilihan 6',  
						  'desc'  => '',  
						  'id'    => 'pilihan6',  
						  'type'  => 'text'  
					  ), 		
					  array(  
						  'vtr-label'=> 'Harga Pilihan 6',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan6',  
						  'type'  => 'text'  
					  ),
					  array(  
						  'vtr-label'=> 'Pilihan 7',  
						  'desc'  => '',  
						  'id'    => 'pilihan7',  
						  'type'  => 'text'  
					  ), 		
					  array(  
						  'vtr-label'=> 'Harga Pilihan 7',  
						  'desc'  => '',   
						  'id'    => 'harga_pilihan7',  
						  'type'  => 'text'  
					  )			 
					  
			),
			
	// tabs 3
	'tabs3'=> array(
					  array(  
						  'vtr-label'=> 'label 1',  
						  'desc'  => '',  
						  'id'    => 'label_1',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 1',  
						  'desc'  => '',  
						  'id'    => 'data_1',  
						  'type'  => 'text'  
					  ), 
					  					  array(  
						  'vtr-label'=> 'label 2',  
						  'desc'  => '',  
						  'id'    => 'label_2',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 2',  
						  'desc'  => '',  
						  'id'    => 'data_2',  
						  'type'  => 'text'  
					  ), 
					  					  array(  
						  'vtr-label'=> 'label 3',  
						  'desc'  => '',  
						  'id'    => 'label_3',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 3',  
						  'desc'  => '',  
						  'id'    => 'data_3',  
						  'type'  => 'text'  
					  ), 
					    					  array(  
						  'vtr-label'=> 'label 4',  
						  'desc'  => '',  
						  'id'    => 'label_4',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 4',  
						  'desc'  => '',  
						  'id'    => 'data_4',  
						  'type'  => 'text'  
					  ), 
					    					  array(  
						  'vtr-label'=> 'label 5',  
						  'desc'  => '',  
						  'id'    => 'label_5',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 5',  
						  'desc'  => '',  
						  'id'    => 'data_5',  
						  'type'  => 'text'  
					  ), 
					  array(  
						  'vtr-label'=> 'label 6',  
						  'desc'  => '',  
						  'id'    => 'label_6',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 6',  
						  'desc'  => '',  
						  'id'    => 'data_6',  
						  'type'  => 'text'  
					  ), 
					  array(  
						  'vtr-label'=> 'label 7',  
						  'desc'  => '',  
						  'id'    => 'label_7',  
						  'type'  => 'text'  
					  ), 	
					  
					  array(  
						  'vtr-label'=> 'data 7',  
						  'desc'  => '',  
						  'id'    => 'data_7',  
						  'type'  => 'text'  
					  ), 
					  
				),
	// tabs 4
	'tabs4'=> array(
					  array(  
						  'vtr-label'=> 'info tambahan',  
						  'desc'  => 'tulis info tambahan',  
						  'id'    => 'info_tambahan',  
						  'type'  => 'textarea'  
					  )
					  
				),
		// tabs 4
	'tabs5'=> array(
					array(  
						  'vtr-label'=> 'Tampilkan Pilihan Produk',  
						  'desc'  => 'centang , jika produk ini menggunakan berat volumetrik', 
						  'info'  => 'info lengkap , baca disini http://theme-id.com/virtacart/berat',  
						  'id'    => 'volumetrik',  
						  'type'  => 'checkbox'  
					  ),
					  array(  
						  'vtr-label'=> 'Panjang',  
						  'desc'  => 'satuan CM , tulis hanya angka saja , contoh : 50 ',  
						  'id'    => 'panjang',  
						  'type'  => 'text'  
					  ), 
					  array(  
						  'vtr-label'=> 'Lebar',  
						  'desc'  => 'satuan CM , tulis hanya angka saja , contoh : 50 ',   
						  'id'    => 'lebar',  
						  'type'  => 'text'  
					  ),
					  array(  
						  'vtr-label'=> 'Tinggi',  
						  'desc'  => 'satuan CM , tulis hanya angka saja , contoh : 50 ',    
						  'id'    => 'tinggi',  
						  'type'  => 'text'  
					  ),	
					  
				)
    );  
// The Callback  
function virtarich_tampil_detail_produk() {  
    global $custom_meta_fields, $post;  
    // Use nonce for verification  
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
        // Begin the field table and loop  ?>
            <div id="vtr-tabs">
            <div class="info"><a href="http://theme-id.com/panduan-virtacart" target="_blank" >Lihat panduan disini </a><span class="dashicons dashicons-info"></span></div>
                <ul class="TabMenu">
                    <li><a href="#tabs1"><span class="dashicons dashicons-cart"></span> General</a></li>
                    <li><a href="#tabs2"><span class="dashicons dashicons-list-view"></span> Pilihan</a></li>
                    <li><a href="#tabs3"><span class="dashicons dashicons-plus"></span> Data tambahan</a></li>
                    <li><a href="#tabs4"><span class="dashicons dashicons-plus"></span> Info tambahan</a></li>
                    <li><a href="#tabs5"><span class="dashicons dashicons-plus"></span> Berat Volumetrik</a></li>
                </ul>
                <div style="clear: both"></div> 
        <?php
     foreach ($custom_meta_fields as $key => $fields) {
		 echo '<div id="'.$key.'">';
		 echo '<table class="vtr-table">'; 
         foreach ($fields as $field){
			 $meta = get_post_meta($post->ID, $field['id'], true);  
			 echo '<tr> 
                    <th> <label for="'.$field['id'].'">'.$field['vtr-label'].'</label></th> 
                    <td>'; 
			 switch($field['type']) {  
								  // text  
								  case 'text':  
									  echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" /> 
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
										  echo '<br /><span class="description">'.$field['info'].'</span>';    
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
         } // end foreach ($fields as $field){
			 echo '</table>'; // end table
		 echo '</div>';
     } // end  foreach ($custom_meta_fields as $key => $fields) {
	echo '</div>';
}  


function virtarich_save_detail_produk($post_id) {  
        global $custom_meta_fields;  
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
	foreach ($custom_meta_fields as $key => $fields) {
		  foreach ($fields as $field) {  
			  $old = get_post_meta($post_id, $field['id'], true);  
			  $new = $_POST[$field['id']]; 
			  if ($new && $new != $old) {  
				  update_post_meta($post_id, $field['id'], $new);  
			  } elseif ('' == $new && $old) {  
				  delete_post_meta($post_id, $field['id'], $old);  
			  }  
		  } // end foreach 
	}// end foreach 
}  
add_action('save_post', 'virtarich_save_detail_produk');


function virtarich_admin_script() {
     wp_enqueue_script( 'detail-produk', get_bloginfo( 'stylesheet_directory' ). '/includes/stores/js/detail-produk.js', array( 'jquery-ui-tabs' ) );
}
add_action( 'admin_enqueue_scripts', 'virtarich_admin_script' );

function virtarich_admin_styles() {
    wp_enqueue_style( 'vtr_detail_produk', get_bloginfo( 'stylesheet_directory' ). '/includes/stores/css/detail-produk.css'  );
}
add_action( 'admin_enqueue_scripts', 'virtarich_admin_styles' );