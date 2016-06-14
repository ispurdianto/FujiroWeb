<?php
/* VIRTACART
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
*/
if ( ! defined( 'ABSPATH' ) ) exit;

function virtarich_pilihan() {
		global $post;
		if(get_post_meta($post->ID, "pilihan", true)){ ?>
		<b>Pilihan Tersedia :</b>
		<select id="virtarich_select">
		<option value="">- Pilihan -</option>
		<?php if(get_post_meta($post->ID, "pilihan1", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan1", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan1", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan1", true); ?></option><?php } ?>
		
		<?php if(get_post_meta($post->ID, "pilihan2", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan2", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan2", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan2", true); ?></option><?php } ?>
		
		<?php if(get_post_meta($post->ID, "pilihan3", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan3", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan3", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan3", true); ?></option><?php } ?>
		
		<?php if(get_post_meta($post->ID, "pilihan4", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan4", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan4", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan4", true); ?></option><?php } ?>
		
		<?php if(get_post_meta($post->ID, "pilihan5", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan5", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan5", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan5", true); ?></option><?php } ?>
		
		<?php if(get_post_meta($post->ID, "pilihan6", true)){ ?>
		<option value="<?php echo virtarich_bersih_harga(get_post_meta($post->ID, "harga_pilihan6", true)); ?>">
		<?php echo get_post_meta($post->ID, "pilihan6", true); ?> @ Rp <?php echo get_post_meta($post->ID, "harga_pilihan6", true); ?></option><?php } ?>
		</select>
		<?php } 
}

function virtarich_button(){
			global $post; 
				  if(get_post_meta($post->ID, "habis", $single = true)){ ?>
					  <div class="habis senter">habis</div>
				  <?php } else if (virtarich_mobile()) {  ?>
					  <div class="tombol">
						  <a class="btn btn-kiri" rel="nofollow" href="mailto:<?php  echo of_get_option('nomer_email'); ?>?subject=Order Barang&body=Order / <?php echo get_post_meta($post->ID, "kode", $single = true);?> / <?php the_title(); ?>  / Tulis Nama Anda / Tulis Alamat Anda">Email</a>
						  <a class="btn btn-kanan" rel="nofollow" href="sms:<?php $nomerhp = of_get_option('nomer_hp');
						  $sms = preg_replace('/[^0-9]/', '', $nomerhp);
						  echo $sms; ?>?body=Order / <?php echo get_post_meta($post->ID, "kode", $single = true);?> / <?php the_title(); ?> / Tulis Nama Anda / Tulis Alamat Anda">SMS</a>
					  </div>
				  <?php } else { ?>
						  <div class="tombol">
						  <a class="btn btn-kiri" href="<?php the_permalink() ?>" >Detail</a>
						  <a class="popup-modal btn btn-kanan" href="#vtr-beli-<?php the_ID(); ?>">Beli</a>
						  </div>
				  <?php virtarich_popup_beli(); 
				  } 
} 

function virtarich_button_single() {
		global $post;
		if(get_post_meta($post->ID, "habis",true)){ ?>
				<div class="habis">Habis</div>
		<?php } else if(of_get_option('button_order_act') == '1' || get_post_meta($post->ID, "dropship",true)){ ?>
				<a class="btn"  href="<?php echo of_get_option('order_page'); ?>" title="<?php the_title(); ?>" target="_blank">Beli Sekarang <i class="glyphicon glyphicon-plus"></i></a>
		<?php } else { ?>
			<form method="post" action="<?php the_permalink(); ?>" class="virtacart">
			<input type="hidden" name="virtacartToken" value="<?php echo $_SESSION['virtacartToken'];?>" />
			<input type="hidden" id="kode" value="<?php the_ID(); ?>" />
			<input type="hidden" id="virtarich-item-id" name="virtarich-item-id" value="<?php the_ID(); ?>" />
			<input type="hidden" id="virtarich-item-name" name="virtarich-item-name" value="<?php the_title(); ?>" />
			<input type="hidden" id="virtarich-item-pilihan" name="virtarich-item-pilihan" value="" />
				  <?php if(get_post_meta($post->ID, "pilihan", true)){ ?>
				  <input type="hidden" name="virtarich-item-price" id="virtarich-item-price" value="" />
				  <?php } else {?>
				  <input type="hidden" name="virtarich-item-price" id="virtarich-item-price" value="<?php virtarich_harga_input(); ?>" />
				  <?php } ?>
            
            
            
             <?php if(get_post_meta($post->ID, "volumetrik", $single = true) != ""){ ?>
             <input type="hidden" name="virtarich-item-berat-kg" value="<?php virtarich_berat_volumetrik() ?>" />
					<input type="hidden" name="virtarich-item-berat" value="<?php virtarich_berat_volumetrik() ?>" />
			<?php } else {?>
            
            <input type="hidden" name="virtarich-item-berat-kg" value="<?php echo get_post_meta($post->ID, "berat", true); ?>" />
			<input type="hidden" name="virtarich-item-berat" value="<?php echo get_post_meta($post->ID, "berat", true); ?>" />
            <?php } ?>
			<input type="hidden" name="virtarich-item-url" value="<?php the_permalink() ?>" />
			<input type="hidden" name="virtarich-item-qty" value="1" />
			<?php virtarich_pilihan(); ?>
			<button type="submit"  name="virtarich-button" value="add to cart" class="btn" >Tambah ke Keranjang </button>
			</form>	
		<?php } 
} 


function virtarich_popup_beli() {
			global $post;?>
			<!--start modal popup-->
			<div class="vtr-popup mfp-hide" id="vtr-beli-<?php the_ID(); ?>">
				<a class="vtr-popup-close" href="#"><i class="icon-cancel"></i></a>
				<div class="telp"><span class="telp-number">Order Sekarang &raquo; SMS : <?php  echo of_get_option('nomer_hp'); ?></span><br/>
				ketik : Kode - Nama barang - Nama dan alamat pengiriman </div>
				<table class="vtr-table" >
					<?php if(get_post_meta($post->ID, "kode", $single = true) != ""){ ?>
					<tr><td >Kode</td><td><?php echo get_post_meta($post->ID, "kode", $single = true);?></td></tr>
					<?php } ?> 
					<tr><td >Nama Barang</td><td><?php the_title(); ?></td></tr> 
					<tr><td>Harga </td><td>Rp <?php virtarich_harga(); ?> <span class="coret"><?php virtarich_harga_coret(); ?></span></td></tr>
					<?php if(get_post_meta($post->ID, "harga_diskon", $single = true) != ""){ ?>
					<tr><td >Anda Hemat</td><td>Rp <?php virtarich_diskon(); ?></td></tr>
					<?php } ?> 
				</table>
				<a class="btn pull-right" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Lihat Detail <i class="icon-right-open pull-right"></i></a>
                <div style="clear: both"></div>

			</div>
			<!--end modal popup-->
<?php }