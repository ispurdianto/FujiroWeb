<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function virtarich_resi_register() {
    register_post_type('resi', array(
        'labels' => array(
            'name' => 'Resi Pengiriman',
            'singular_name' => 'resi',
            'add_new' => 'Add New resi',
            'edit_item' => 'Edit resi',
            'new_item' => 'New  Project to my resi',
            'view_item' => 'View resi',
            'search_items' => 'Search in My resi',
            'not_found' => 'No Resi Found',
            'not_found_in_trash' => 'No resi found in resi Trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => 'title'
   ));
}
add_action('init', 'virtarich_resi_register');
function virtarich_resi_js() {
	wp_enqueue_script('resi-js', VTR_TEMPLATE_DIR_STORE_URI.'/js/resi.js');
}
add_action('admin_enqueue_scripts', 'virtarich_resi_js');
function virtarich_resi_option() {
	  $options = array (
	  'JNE' => 'JNE',
	  'TIKI' => 'TIKI',
	  'Pos Indonesia' => 'Pos Indonesia',
	  'Herona' => 'Herona',
	  'Pandu Logistik' => 'Pandu Logistik',
	  'Mex Barlian' => 'Mex Barlian',
	  'Wahana' => 'Wahana',
	  'EMS' => 'EMS',
	  'Citoxpress' => 'Citoxpress',
	  'REX Indonesia' => 'REX Indonesia',
	  'Rosalia Express' => 'Rosalia Express',
	  'First Logistics' => 'First Logistics',
	  'RPX Holding' => 'RPX Holding',
	  'TIKINDO' => 'TIKINDO',
	  'PAHALA' => 'PAHALA',
	  '-' => '-',
	  );
	  return $options;
}


function virtarich_resi_add_meta_boxes() {
	add_meta_box( 'repeatable-fields', 'Virtarich No Resi Pengiriman', 'virtarich_resi_meta_box_admin', 'resi', 'normal', 'default');
}
add_action('admin_init', 'virtarich_resi_add_meta_boxes', 1);

function virtarich_resi_meta_box_admin() {
	global $post;
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	$options = virtarich_resi_option();
	wp_nonce_field( 'virtarich_repeatable_meta_box_nonce', 'virtarich_repeatable_meta_box_nonce' );
	?>
	<table id="repeatable-fieldset-one" width="100%">
            <thead>
                <tr>
                <th width="40%">Nama</th>
                <th width="40%">No Resi</th>
                <th width="12%">Ekspedisi</th>
                <th width="8%"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ( $repeatable_fields ) :
            foreach ( $repeatable_fields as $field ) {
            ?>
            <tr>
                <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
                <td><input type="text" class="widefat" name="resi[]" value="<?php if ($field['resi'] != '') echo esc_attr( $field['resi'] ); else echo 'http://'; ?>" /></td>
                <td>
                <select name="select[]">
                <?php foreach ( $options as $label => $value ) : ?>
                <option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
                <?php endforeach; ?>
                </select>
                </td>
                <td><a class="button remove-row" href="#">Hapus</a></td>
            </tr>
            <?php
            }
            else :
            // show a blank one
            ?>
            	<tr>
                        <td><input type="text" class="widefat" name="name[]" /></td>
                        <td><input type="text" class="widefat" name="resi[]" value="" /></td>
                        <td>
                        <select name="select[]">
                        <?php foreach ( $options as $label => $value ) : ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                        </select>
                        </td>
                        <td><a class="button remove-row" href="#">Hapus</a></td>
            	</tr>
            <?php endif; ?>
            <!-- empty hidden one for jQuery -->
					<tr class="empty-row screen-reader-text">
                        <td><input type="text" class="widefat" name="name[]" /></td>
                        <td><input type="text" class="widefat" name="resi[]" value="" /></td>
                        <td>
                        <select name="select[]">
                        <?php foreach ( $options as $label => $value ) : ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php endforeach; ?>
                        </select>
                        </td>
                        <td><a class="button remove-row" href="#">Hapus</a></td>
					</tr>
            </tbody>
	</table>
<p><a id="add-row" class="button" href="#">Tambah data</a></p>
<?php
}
// save metabox resi
add_action('save_post', 'virtarich_resi_save');
function virtarich_resi_save($post_id) {
		if ( ! isset( $_POST['virtarich_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['virtarich_repeatable_meta_box_nonce'], 'virtarich_repeatable_meta_box_nonce' ) )
		return;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
		if (!current_user_can('edit_post', $post_id))
		return;
		$old = get_post_meta($post_id, 'repeatable_fields', true);
		$new = array();
		$options = virtarich_resi_option();
		$names = $_POST['name'];
		$selects = $_POST['select'];
		$resis = $_POST['resi'];
		$count = count( $names );
		for ( $i = 0; $i < $count; $i++ ) {
			  if ( $names[$i] != '' ) :
			  $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
			  if ( in_array( $selects[$i], $options ) )
			  $new[$i]['select'] = $selects[$i];
			  else
			  $new[$i]['select'] = '';
			  if ( $resis[$i] == '' )
			  $new[$i]['resi'] = '';
			  else
			  $new[$i]['resi'] = stripslashes( $resis[$i] );
			  endif;
		}
		if ( !empty( $new ) && $new != $old )
		update_post_meta( $post_id, 'repeatable_fields', $new );
		elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}
// tampilkan metabox resi 
function virtarich_resi_list() {
		global $post;
		$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
		$options = virtarich_resi_option();
		wp_nonce_field( 'virtarich_repeatable_meta_box_nonce', 'virtarich_repeatable_meta_box_nonce' );
		if ( $repeatable_fields ) :
		foreach ( $repeatable_fields as $field ) { ?>
            <tr>
            <td><?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?></td>
            <td><?php if ($field['resi'] != '') echo esc_attr( $field['resi'] );?> <a class="right" href="http://www.cekresi.com/?noresi=<?php if ($field['resi'] != '') echo esc_attr( $field['resi'] );?>" rel="nofollow" target="_blank">cek <i class="icon-search"></i>
</a></td>
            <td><?php if ( $field['select']!= ''); ?><?php echo esc_attr( $field['select'] ); ?></td>
            </tr>
		<?php } 
		 endif; 
 }