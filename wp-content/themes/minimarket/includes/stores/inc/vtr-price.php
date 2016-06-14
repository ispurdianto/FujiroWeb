<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit;
function virtarich_bersih_harga($harga) { 
		$harga = preg_replace('/\D/', '', $harga);
		return $harga;
}

function virtarich_get_harga( $post ){
		$harga = '-';
		if ( get_post_meta( $post->ID, "harga_diskon", true ) ){
			$harga = get_post_meta( $post->ID, "harga_diskon", true ); 
			}
		else if (get_post_meta($post->ID, "harga", true)){ 
			$harga = get_post_meta($post->ID, "harga", true); 
			}
		return $harga; 
}
// untuk ambil harga 
function virtarich_harga(){
	global $post;
	// jika ada harga diskon >> di tampilkan harga diskon 
	if ( get_post_meta( $post->ID, "harga_diskon", true ) ){ 
			$harga = get_post_meta( $post->ID, "harga_diskon", true );
			$harga = preg_replace('/[^0-9]/', '', $harga);
			echo number_format( $harga ,0 , ',','.' );
	// jika ada harga >> di bersihkan 
	  } elseif (get_post_meta($post->ID, "harga", true)){
			$harga = get_post_meta( $post->ID, "harga", true );
			$harga = preg_replace('/[^0-9]/', '', $harga);
			echo number_format( $harga ,0 , ',','.' );
	// jika tidak ada harga >> di tampilkan hubungi cs
	  } else {
			echo '(Hubungi CS)';	
	  }
}
// jika ada harga diskon >> maka harga awal akan di coret
function virtarich_harga_coret(){
		global $post; 
		if(get_post_meta($post->ID, "harga_diskon", true)){
			$harga = get_post_meta($post->ID, "harga", true);
			$harga = preg_replace('/[^0-9]/', '', $harga);
			echo number_format( $harga ,0 , ',','.' );
		}
}
// harga yang di input ke cart
function virtarich_harga_input(){
		global $post; 
		$harga = virtarich_get_harga( $post ); 
		$harga = preg_replace('/[^0-9]/', '', $harga);
		echo $harga;
}
// menampilkan jumlah diskon
function virtarich_diskon() { 
		global $post; 
		if(get_post_meta($post->ID, "harga_diskon", $single = true) != ""){
			$harga = get_post_meta($post->ID, "harga",$single = true);
			$harga = preg_replace('/[^0-9]/', '', $harga);
			$hargadiskon = get_post_meta($post->ID, "harga_diskon",$single = true);
			$hargadiskon = preg_replace('/[^0-9]/', '', $hargadiskon);
			$hemat = $harga - $hargadiskon;
			$jadihemat = number_format( $hemat ,0 , ',','.' );
			$save =  $hemat / $harga ;
			$persen = $save * 100 ;
			$jadipersen = number_format( $persen ,2 );
			echo $jadihemat.' ('.$jadipersen.'%)';
		}
}
// menampilkan jumlah diskon pada lable thumb
function virtarich_diskon_label() { 
	global $post; 
		if(get_post_meta($post->ID, "harga_diskon", $single = true) != ""){
			$harga = get_post_meta($post->ID, "harga",$single = true);
			$harga = preg_replace('/[^0-9]/', '', $harga);
			$hargadiskon = get_post_meta($post->ID, "harga_diskon",$single = true);
			$hargadiskon = preg_replace('/[^0-9]/', '', $hargadiskon);
			$hemat = $harga - $hargadiskon;
			$jadihemat = number_format( $hemat ,0 , ',','.' );
			$save =  $hemat / $harga ;
			$persen = $save * 100 ;
			$jadipersen = number_format( $persen ,0 );
			echo $jadipersen.'%';
		}
}