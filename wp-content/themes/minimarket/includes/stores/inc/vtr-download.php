<?php
/* VIRTACART
Add Meta Box at single post
Version       : 1.0.0
Author        : Virtarich
Author URI    : http://theme-id.com
 */
if ( ! defined( 'ABSPATH' ) ) exit; 
wp_register_sidebar_widget(
    'virtarich_widget_download', 
    'Virtarich Download', 
    'virtarich_widget_download',
    array( 'description' => 'Tampilkan print katalog di sidebar' )
);
function virtarich_pricelist_function() {
	  global $post;
	  $vtr_query = new WP_Query('showposts=1000');
	   while ($vtr_query->have_posts()) : $vtr_query->the_post(); ?>
	  <tr>
              <td><?php if(get_post_meta($post->ID, "kode", $single = true) != ""){
                         echo get_post_meta($post->ID, "kode", $single = true);
                     } ?>
               </td>
              <td><?php the_title(); ?></td>
              <td><?php virtarich_small_thumb() ?></td>
              
              <td>
                  <?php if(get_post_meta($post->ID, "habis", $single = true)){ ?>
                      habis
                  <?php } else if(get_post_meta($post->ID, "stok", $single = true) != ""){
                      echo get_post_meta($post->ID, "stok", $single = true);
                  } ?>
              </td>
              
              <td><?php echo get_post_meta($post->ID, "berat", true); ?> Kg</td>
              <td>Rp<?php virtarich_harga(); ?></td>
	  </tr> 
	  <?php endwhile;
}
add_action('virtarich_pricelist', 'virtarich_pricelist_function');

function virtarich_katalog_function() {
			global $post;
			$vtr_query = new WP_Query('showposts=10000');
			while ($vtr_query->have_posts()) : $vtr_query->the_post(); ?>
			<div class="katalog">
                <div class="katalog-gambar-center">
                <div class="katalog-gambar"><?php virtarich_thumb_normal() ?></div>
                </div>
                <div class="katalog-title"><?php the_title(); ?></div>
                <div class="katalog-harga">Rp <?php virtarich_harga(); ?><span class="coret"><?php virtarich_harga_coret(); ?></span></div>
                <?php if(get_post_meta($post->ID, "kode", $single = true) != ""){ ?> 
                	Kode : <?php echo get_post_meta($post->ID, "kode", $single = true);
					 } ?>
                     <br/>
                
                <?php if(get_post_meta($post->ID, "habis", $single = true)){ ?>
                    <div class="habis senter">habis</div>
                <?php } else if(get_post_meta($post->ID, "stok", $single = true) != ""){  ?>
                    Stok : <?php echo get_post_meta($post->ID, "stok", $single = true);?>
                <?php } ?>
                
                <div style="clear: both"></div>
			</div>
			<?php endwhile;
}
add_action('virtarich_katalog', 'virtarich_katalog_function');

function virtarich_widget_download() { ?>
        <div class="box">
            <h4>Print & Download Katalog</h4>
                        <a href="<?php echo home_url() ; ?>/katalog" class="button-widget" title="download" target="_blank" rel="nofollow">
                            <span class="button-widget-icon"><i class="icon-download"></i></span>
                            <span class="button-widget-text">Download</span>
                            <span class="button-widget-link">Katalog</span> 
                        </a>
                        <a href="<?php echo home_url() ; ?>/pricelist" class="button-widget" title="download" target="_blank" rel="nofollow">
                            <span class="button-widget-icon"><i class="icon-download"></i></span>
                            <span class="button-widget-text">Download</span>
                            <span class="button-widget-link">Pricelist</span>
                        </a>
        
        </div>
<?php
}