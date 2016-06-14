<?php
function virtarich_contoh_posting() {
$title = 'Contoh Posting Virtacart ';
if (!get_page_by_title($title, 'OBJECT', 'post') ){
 $my_post = array(
				  'post_title' => $title,
				  'comment_status'	=>	'closed',
				  'ping_status'		=>	'closed',	
				  'post_category' => array(),
				  'post_content' => 'disini untuk menulis artikel tentang produk',
				  'post_category' => '1',
				  'post_status' => 'draft',
				  'post_category' => array(1,2)
				  );

  $result = wp_insert_post( $my_post );
  if ($result) {
	  add_post_meta($result, 'harga', '120000');
	  add_post_meta($result, 'harga_diskon', '100000');
	  add_post_meta($result, 'stok', '10');
	  add_post_meta($result, 'kode', 'vtr-123');
	  add_post_meta($result, 'label', 'sale');
	  add_post_meta($result, 'berat', '1.31');
	  add_post_meta($result, 'pilihan', '1');
	  add_post_meta($result, 'pilihan1', 's');
	  add_post_meta($result, 'harga_pilihan1', '90000');
	  add_post_meta($result, 'pilihan2', 'M');
	  add_post_meta($result, 'harga_pilihan2', '100000');
	  add_post_meta($result, 'pilihan3', 'L');
	  add_post_meta($result, 'harga_pilihan3', '110000');
	  add_post_meta($result, 'pilihan4', 'XL');
	  add_post_meta($result, 'harga_pilihan4', '115000');
	  add_post_meta($result, 'pilihan5', 'XXl');
	  add_post_meta($result, 'harga_pilihan5', '120000');
	  add_post_meta($result, 'label_1', 'No. ISBN ');
	  add_post_meta($result, 'data_1', '12345');
	  add_post_meta($result, 'label_2', 'Penulis');
	  add_post_meta($result, 'data_2', 'virtarich');
	  add_post_meta($result, 'label_3', 'Penerbit');
	  add_post_meta($result, 'data_3', 'theme-id.com');
	  add_post_meta($result, 'label_4', 'jumlah halaman');
	  add_post_meta($result, 'data_4', '120');
	}
	}
}
add_filter( 'after_setup_theme', 'virtarich_contoh_posting' );