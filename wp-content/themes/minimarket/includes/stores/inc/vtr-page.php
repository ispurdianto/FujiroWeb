<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
if ( ! defined( 'ABSPATH' ) ) exit;
function virtarich_create_keranjang() {
	$post_id = -1;
	$slug = 'keranjang';
	$title = 'keranjang';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=> 'keranjang.php'
			)
		);
	} else {
    		$post_id = -2;
	}
}
add_filter( 'after_setup_theme', 'virtarich_create_keranjang' );
function virtarich_create_testimoni() {
	$post_id = -1;
	$slug = 'testimoni';
	$title = 'testimoni';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'open',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=>  'page-testimoni.php'
			)
		);
	} else {
    		$post_id = -2;

	}

}
add_filter( 'after_setup_theme', 'virtarich_create_testimoni' );
function virtarich_create_pricelist() {
	$post_id = -1;
	$slug = 'pricelist';
	$title = 'pricelist';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=>  'page-pricelist.php'
			)
		);
	} else {
    		$post_id = -2;

	}
}
add_filter( 'after_setup_theme', 'virtarich_create_pricelist' );
function virtarich_create_katalog() {
	$post_id = -1;
	$slug = 'katalog';
	$title = 'katalog';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=>  'page-katalog.php'
			)
		);
	} else {
    		$post_id = -2;

	}
}
add_filter( 'after_setup_theme', 'virtarich_create_katalog' );
function virtarich_create_cekongkir() {
	$post_id = -1;
	$slug = 'cek-ongkir';
	$title = 'cek ongkir';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=>  'page-cek-ongkir.php'
			)
		);

	} else {
    		$post_id = -2;

	}

}
add_filter( 'after_setup_theme', 'virtarich_create_cekongkir' );
function virtarich_create_cekresi() {
	$post_id = -1;
	$slug = 'cek-resi';
	$title = 'cek resi';
	if( null == get_page_by_title( $title ) ) {
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	'1',
				'post_name'			=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'			=>	'page',
				'page_template'		=>  'page-cek-resi.php'
			)
		);

	} else {
    		$post_id = -2;

	}

}
add_filter( 'after_setup_theme', 'virtarich_create_cekresi' );