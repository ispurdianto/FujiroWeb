<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function virtarich_format_berat(){ 
			global $post;
			if ( of_get_option('berat_format_act') == '1' && get_post_meta($post->ID, "volumetrik",true)== "") { 
			  wp_register_script( 'format_berat', VTR_TEMPLATE_DIR_STORE_URI . '/js/berat.js','jquery','', true );
 				wp_enqueue_script('format_berat');
			} 
}
add_action('wp_enqueue_scripts', 'virtarich_format_berat');

function virtarich_berat_volumetrik(){ 
			global $post;
			$panjang = get_post_meta( $post->ID, "panjang", true );
			$lebar = get_post_meta( $post->ID, "lebar", true );
			$tinggi = get_post_meta( $post->ID, "tinggi", true ); 
			$volume = $panjang * $lebar * $tinggi ;
			$berat = $volume / 6000;
			echo number_format( $berat ,2 , '.','' );
}
add_action('wp_enqueue_scripts', 'virtarich_format_berat');