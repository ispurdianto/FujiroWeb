<?php
/* VIRTACART
Add quick edit
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;

function virtarich_posts_columns( $columns, $post_type ) {
   switch ( $post_type ) {
      case 'post':
			$columns['foto'] = 'Foto';
			$columns['kode'] = 'Kode';
            $columns['harga'] = 'Harga (Rp)';
			$columns['harga_diskon'] = 'Harga Diskon (Rp)';
			$columns['stok'] = 'Stok';
			$columns['berat'] = 'Berat (Kg)';
			$columns['habis'] = 'Ket';
			return $columns;
   }
   return $columns;
}
add_filter( 'manage_posts_columns', 'virtarich_posts_columns', 10, 2 );


function virtarich_get_featured_image($post_id) {
    $post_thumbnail_id = get_post_thumbnail_id($post_id);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
		$img_url = $post_thumbnail_img[0];  
		$image = aq_resize( $img_url, 70, 70, false );
        return $image[0];
    }
}


function virtarich_manage_posts_column( $column_name, $post_id ) {
	global $post;
	$post_featured_image = virtarich_get_featured_image($post_id);
   switch( $column_name ) {
		case 'kode':
			echo '<div id="kode-' . $post_id . '">' . get_post_meta( $post_id, 'kode', true ) . '</div>';
			break;
		case 'harga':
			echo '<div id="harga-' . $post_id . '">' . get_post_meta( $post_id, 'harga', true ) . '</div>';
			break;
		case 'harga_diskon':
			echo '<div id="harga_diskon-' . $post_id . '">' . get_post_meta( $post_id, 'harga_diskon', true ) . '</div>';
			break;
		case 'stok':
			echo '<div id="stok-' . $post_id . '">' . get_post_meta( $post_id, 'stok', true ) . '</div>';
			break;
		case 'berat':
			echo '<div id="berat-' . $post_id . '">' . get_post_meta( $post_id, 'berat', true ) . '</div>';
			break;
		case 'habis':
			$apa_habis = get_post_meta( $post_id, 'habis', true );
			if ($apa_habis) {
			echo '<div id="habis-' . $post_id . '"><b style="color:red;">Habis</b></div>';
			} else {
			echo '<div id="habis-' . $post_id . '">Tersedia</div>';
			}
			break;
		case 'foto':
			if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
			}
			break;
   }
}
add_action( 'manage_posts_custom_column', 'virtarich_manage_posts_column', 10, 2 );

function virtarich_bulk_quick_edit( $column_name, $post_type ) {
   switch ( $post_type ) {
      case 'post':

         switch( $column_name ) {
			case 'kode': ?>
            <fieldset class="inline-edit-col-right">
					<b style="color:blue;">virtarich QUICK EDIT</b>
					<label>
					<span class="title">Kode</span>
					<input type="text" name="kode" value="" />
					</label>
			<?php
			break;
			case 'harga':
			?>
					<label>
					<span class="title">Harga Rp</span>
					<input type="text" name="harga" value="" />
					</label>
			<?php
			break;
			case 'harga_diskon':
			?>
					<label>
					<span class="title">Harga Diskon Rp</span>
					<input type="text" name="harga_diskon" value="" />
					</label>
                  
			<?php
			break;
			case 'stok':
			?>
					<label>
					<span class="title">Stok tersedia</span>
					<input type="text" name="stok" value="" />
					</label>
			<?php
			break;
			case 'berat':
			?>
					<label>
					<span class="title">Berat (Kg)</span>
					<input type="text" name="berat" value="" />
					</label>
					</fieldset>
			<?php
			break; 			   
         }
         break;
   }
}
add_action( 'bulk_edit_custom_box', 'virtarich_bulk_quick_edit', 10, 2 );
add_action( 'quick_edit_custom_box', 'virtarich_bulk_quick_edit', 10, 2 );

function virtarich_save_post( $post_id, $post ) {
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return $post_id;
   if ( isset( $post->post_type ) && $post->post_type == 'revision' )
      return $post_id;
   switch( $post->post_type ) {
     case 'post':
	if ( array_key_exists( 'harga', $_POST ) )
	    update_post_meta( $post_id, 'harga', $_POST[ 'harga' ] );
	if ( array_key_exists( 'harga_diskon', $_POST ) )
	    update_post_meta( $post_id, 'harga_diskon', $_POST[ 'harga_diskon' ] );
	if ( array_key_exists( 'stok', $_POST ) )
	    update_post_meta( $post_id, 'stok', $_POST[ 'stok' ] );
	if ( array_key_exists( 'berat', $_POST ) )
	    update_post_meta( $post_id, 'berat', $_POST[ 'berat' ] );
	if ( array_key_exists( 'kode', $_POST ) )
	    update_post_meta( $post_id, 'kode', $_POST[ 'kode' ] );
	break;
   }
}
// save quick edit
add_action( 'save_post','virtarich_save_post', 10, 2 );
//register js quick edit
add_action( 'admin_print_scripts-edit.php', 'virtarich_quick_edit_js' );
function virtarich_quick_edit_js() {
   wp_enqueue_script( 'virtarich-admin-edit', VTR_TEMPLATE_DIR_STORE_URI . '/js/quick-edit.js', array( 'jquery', 'inline-edit-post' ), '', true );
}